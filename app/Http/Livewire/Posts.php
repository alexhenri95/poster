<?php

namespace App\Http\Livewire;

use App\Models\Friend;
use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    protected $listeners = ['render'];
    
    public $deleteId = '';

    public function deleteId($id)
    {
        $this->deleteId = $id;
        Post::find($this->deleteId)->delete();

        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Listo!']);
    }

    public function render()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $friends = Friend::where('user_id', auth()->user()->id)->get();
        return view('livewire.posts', compact('posts', 'friends'));
    }
}
