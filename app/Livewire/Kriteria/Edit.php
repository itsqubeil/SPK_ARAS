<?php

namespace App\Livewire\Kriteria;

use App\Models\Kriteria;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Edit extends Component
{
	public $id;
	public $kode;
    public $nama;
    public $bobot; 
	public $type;

	protected $rules = [
		'kriteria.kode'	=> 'required',
		'kriteria.name'	=> 'required',
		'kriteria.bobot' => 'required',
		'kriteria.type'	=> 'nullable',
	];

	public function mount($id)
    {
        $this->id = $id;

        $kriteria = Kriteria::find($id);
        if ($kriteria) {
            $this->kode = $kriteria->kode;
            $this->nama = $kriteria->name;
			$this->bobot = $kriteria->bobot;
            $this->type = $kriteria->type;
        }
    }

	public function render()
	{
		return view('livewire.kriteria.edit');
	}

	public function update()
    {
        $kriteria = Kriteria::find($this->id);
        if ($kriteria) {
            $kriteria->update([
                'kode' => $this->kode,
                'name' => $this->nama,
				'bobot' => $this->bobot,
                'type' => $this->type
            ]);
        }
        $this->reset();
        $this->dispatch('saved');
	
    	return to_route('kriteria.index');
	}
}