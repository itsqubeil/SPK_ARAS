<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function index()
    {
        $alternatifs = $this->proses();
        return view('proses.index', compact('alternatifs'));
    }

    public function print()
    {
        $pdf = \PDF::loadView('laporan.cetak', ['data' => $this->proses()])->output();
        return response()->streamDownload(fn () => print($pdf), 'Laporan.pdf');
    }

    // Proses metode ARAS
    public function proses()
    {
        // Inisialisasi variabel array alternatif
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $SubKriteria = SubKriteria::all();

        $alt_array = [];
        foreach ($alternatifs as $alt) {
            $alt_array[$alt->id] = $alt->name;
        }

        // Inisialisasi variabel array kriteria dan bobot (W)
        $kriteria_array = [];
        $w = [];
        foreach ($kriterias as $kriteria) {
            $kriteria_array[$kriteria->id] = [$kriteria->name, $kriteria->attribute];
            $w[$kriteria->id] = $kriteria->weight;
        }

        // Inisialisasi variabel array matriks keputusan X
        $X = [];
        $x_0 = [];

        // Ambil nilai dari tabel SubKriteria
        foreach ($SubKriteria as $eval) {
            $i = $eval->id_alternative;
            $j = $eval->id_criteria;
            $aij = $eval->nilai;

            if (!isset($x_0[$j])) {
                $x_0[$j] = ($kriteria_array[$j][1] == 'cost') ? PHP_INT_MAX : 0;
            }

            $x_0[$j] = ($kriteria_array[$j][1] == 'cost') 
                        ? min($x_0[$j], $aij) 
                        : max($x_0[$j], $aij);

            $X[$i][$j] = $aij;
        }

        // Menambahkan data alternatif optimum pada index=0
        $X[0] = $x_0;

        // Inisialisasi jumlah nilai per kriteria (sum_j)
        $sum_j = [];
        foreach ($X as $i => $xi) {
            foreach ($xi as $j => $xij) {
                if (!isset($sum_j[$j])) {
                    $sum_j[$j] = 0;
                }
                $sum_j[$j] += ($kriteria_array[$j][1] == 'cost') ? 1 / $xij : $xij;
            }
        }

        // Inisialisasi variabel array matriks Normalisasi (R)
        $R = [];
        foreach ($X as $i => $xi) {
            foreach ($xi as $j => $xij) {
                $R[$i][$j] = ($kriteria_array[$j][1] == 'cost') ? (1 / $xij) / $sum_j[$j] : $xij / $sum_j[$j];
            }
        }

        // Inisialisasi variabel array matriks ternormalisasi terbobot (D)
        $D = [];
        foreach ($R as $i => $ri) {
            foreach ($ri as $j => $rij) {
                $D[$i][$j] = $rij * $w[$j];
            }
        }

        // Inisialisasi variabel array nilai fungsi optimum (S)
        $S = [];
        foreach ($D as $i => $di) {
            $S[$i] = array_sum($di);
        }

        // Inisialisasi variabel array nilai utilitas (K)
        $K = [];
        foreach ($S as $i => $si) {
            if ($i != 0) {
                $K[$i] = $si / $S[0];
            }
        }

        arsort($K);
        $pilih = key($K);
        $nilai = array_shift($K);

        // Update nilai alternatif
        foreach ($alternatifs as $alternatif) {
            if (isset($K[$alternatif->id])) {
                $alternatif->nilai = round($K[$alternatif->id], 4);
            } else {
                $alternatif->nilai = 0; // atau nilai default lainnya
            }
        }

        return $alternatifs;
    }
}
