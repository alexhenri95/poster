<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $body;
    public $identificador;

    protected $rules = [
        'body' => 'required|max:100',
        'image' => 'required|image|max:2048'
    ];

    public function savePost()
    {
        $this->validate();
        
        $ruta_imagen = $this->image->store('posts','public');
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(640,480);
        $img->save();


        $data = [
            'body' => $this->body,
            'user_id' => auth()->user()->id,
            'image' => $ruta_imagen
        ]; 

        Post::create($data);

        
        $this->reset([
            'body',
            'image'
        ]);

        $this->emit('render');
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Listo!']);
        // $this->emit('saved');

    }

    public function render()
    {
        return view('livewire.post-create');
    }
}
