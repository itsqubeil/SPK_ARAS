<?php

namespace App\Livewire\Posts;

use App\Models\Alternatif;
use Livewire\Component;


class Edit extends Component
{
 




    public function mount($id)
    {
        //get post
        $post = Alternatif::find($id);

        //assign
        $this->id   = $post->id;
        $this->kode    = $post->kode;
        $this->name  = $post->name;
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
    

        //get post
        $post = Alternatif::find($id);

            //update post
            $post->update([
                'kode' => $this->kode,
                'name' => $this->name,
            ]);
        
        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('posts.index');
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.posts.edit');
    }
}