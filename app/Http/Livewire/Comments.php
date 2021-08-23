<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Heart;
use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    protected $listeners = ['render'];

    public $post;
    public $body;
    public $deleteId = '';

    public $open_comment = false;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function saveComentario()
    {
        $this->validate([
            'body' => 'required',
        ]);
        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->user()->id, 
            'body' => $this->body
        ]);

        $this->reset([
            'body'
        ]);

        $this->emit('render');
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Listo!']);

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
        Comment::find($this->deleteId)->delete();

        $this->emit('render');

        $this->reset(['deleteId']);
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Listo!']);

    }

    public function saveHeart()
    {
        Heart::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->user()->id
        ]);

        $this->emit('render');
    }

    public function deleteHeart($value_user, $value_post)
    {
        $deleteHeart = Heart::where('user_id', $value_user)
                            ->where('post_id', $value_post)
                            ->delete(); 

        $this->emit('render');                         
    }

    public function render()
    {
        $heart = Heart::where('post_id', $this->post->id)->get();
        return view('livewire.comments', compact('heart'));
    }
}
