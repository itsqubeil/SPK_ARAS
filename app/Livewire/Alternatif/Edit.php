<?php
namespace App\Livewire\Alternatif;

use App\Models\Alternatif;
use Livewire\Component;

class Edit extends Component
{
    public $kode;
    public $nama;
    public $id; // ID dari model yang sedang diedit

    public function mount($id)
    {
        $this->id = $id;

        $alternatif = Alternatif::find($id);
        if ($alternatif) {
            $this->kode = $alternatif->kode;
            $this->nama = $alternatif->name;
        }
    }

    public function render()
    {
        return view('livewire.alternatif.edit');
    }

    public function update()
    {
        $alternatif = Alternatif::find($this->id);
        if ($alternatif) {
            $alternatif->update([
                'kode' => $this->kode,
                'name' => $this->nama
            ]);
        }
        $this->reset();
        $this->dispatch('saved');
		return redirect()->route('alternatif.index');
    }
}

