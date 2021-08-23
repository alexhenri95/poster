<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class UserPost extends Component
{
    protected $listeners = ['render'];
    public $user;

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
        $posts = Post::where('user_id', $this->user->id)->orderBy('id', 'desc')->get();
        return view('livewire.user-post', compact('posts'));
    }
}
