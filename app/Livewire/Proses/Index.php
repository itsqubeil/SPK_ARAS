<?php

namespace App\Livewire\Proses;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Index extends Component
{
	public function render()
	{
		$alternatifs = $this->proses();
		return view('livewire.proses.index', compact('alternatifs'));
	}

	public function print()
	{
		// abaikan garis error di bawah 'Pdf' jika ada.
		$pdf = Pdf::loadView('laporan.cetak', ['data' => $this->proses()])->output();
		return response()->streamDownload(fn () => print($pdf), 'Laporan.pdf');
	}

	// proses metode ARAS
	public function proses()
	{
		$alternatifs = Alternatif::orderBy('kode')->get();
		$kriterias = Kriteria::orderBy('kode')->get()->toArray();

		// pembentukan matriks awal
		$matriks = [];
		$X = [];
		foreach ($alternatifs as $ka => $alt) {
			foreach ($alt->kriteria as $kb => $krit) {
				$matriks[$kb][$ka] = $krit->pivot->nilai;
				$X[$ka][$kb] = $krit->pivot->nilai;
			}
		}

		// Tampilkan matriks awal
		// dump('Matriks:', $matriks);
		// dump('X:', $X);

		// penentuan nilai A0
		$A0 = [];
		foreach ($matriks as $k => $matrik) {
			// jika benefit
			if ($kriterias[$k]['type'] == true) {
				$A0[] = max($matrik);
			}
			// jika cost 
			else {
				$A0[] = min($matrik);
			}
		}

		// Tampilkan nilai A0
		// dump('A0:', $A0);

		// pembentukan matriks keputusan
		array_unshift($X, $A0);
		$matriks_x = [];
		foreach ($X as $key => $item) {
			foreach ($item as $subkey => $subitem) {
				$matriks_x[$subkey][$key] = $subitem;
			}
		}

		// Tampilkan matriks keputusan
		// dump('Matriks X:', $matriks_x);

		// normalisasi matriks keputusan
		$R = [];
		foreach ($matriks_x as $key => $value) {
			$divisor = array_sum($value);
			$benefit = $kriterias[$key]['type'];
			foreach ($value as $subkey => $subvalue) {
				if ($benefit) {
					// Untuk kriteria benefit
					$R[$key][$subkey] = $subvalue / $divisor;
				} else {
					// Untuk kriteria cost
					// Menghitung inversi nilai
					$inverted_value = 1 / $subvalue;
					// Menyimpan nilai inversi
					$inverted_values[$key][$subkey] = $inverted_value;
				}
			}
			
			if (!$benefit) {
				// Normalisasi nilai inversi setelah perhitungan untuk kriteria cost
				$divisor = array_sum($inverted_values[$key]);
				foreach ($inverted_values[$key] as $subkey => $inverted_value) {
					$R[$key][$subkey] = $inverted_value / $divisor;
				}
			}
		}
		

		// Tampilkan matriks normalisasi
		// dump('Matriks R:', $R);

		// menentukan bobot matriks
		$D = [];
		foreach ($R as $key => $value) {
			$bobot = $kriterias[$key]['bobot'];
			foreach ($value as $subkey => $subvalue) {
				$D[$key][$subkey] = $subvalue * $bobot;
			}
		}

		// Tampilkan matriks bobot
		// dump('Matriks D:', $D);

		// menentukan nilai fungsi optimalisasi
		$matriks_opt = [];
		foreach ($D as $key => $value) {
			foreach ($value as $subkey => $subvalue) {
				$matriks_opt[$subkey][$key] = $subvalue;
			}
		}
		
		// menentukan nilai sum_s dan S0
$sum_s = [];
foreach ($matriks_opt as $key => $value) {
    $sum_s[] = array_sum($value);
}

// Pastikan sum_s memiliki setidaknya satu elemen
if (count($sum_s) > 0) {
    // Mengatur S0 sebagai elemen pertama dari sum_s
    $S0 = $sum_s[0];
} else {
    // Menangani kasus di mana sum_s kosong (jika ada kemungkinan ini)
    $S0 = 0;
}


		// Tampilkan nilai fungsi optimalisasi
		// dump('Matriks Opt:', $matriks_opt);
		// dump('Sum S:', $sum_s);
		// dump('S0:', $S0);

		// menentukan peringkat/ranking
		$K = [];
		foreach ($sum_s as $key => $value) {
			$K[] = $value / $S0;
		}

		// Tampilkan peringkat
		// dump('K:', $K);

		// masukkan hasil perhitungan ke dalam data alternatif
		foreach ($alternatifs as $key => $alternatif) {
			$alternatif->nilai = round($K[$key + 1], 4);
		}

		return $alternatifs;
	}
}
