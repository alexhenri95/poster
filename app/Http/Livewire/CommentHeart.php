<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Heart;
use Livewire\Component;

class CommentHeart extends Component
{
    protected $listeners = ['render'];

    public $post;
    public $body;
    public $deleteId = '';

    public function saveComentario()
    {
        $this->validate([
            'body' => 'required'
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

    public function saveHeart()
    {
        Heart::create([
            'post_id' => $this->post->id,
            'user_id' => auth()->user()->id
        ]);
    }

    public function deleteHeart($value_user, $value_post)
    {
        $deleteHeart = Heart::where('user_id', $value_user)
                            ->where('post_id', $value_post)
                            ->delete();                          
    }

    public function render()
    {
        $comment = Comment::where('post_id', $this->post->id)->get();
        $heart = Heart::where('post_id', $this->post->id)->get();
        return view('livewire.comment-heart', compact('heart','comment'));
    }
}
