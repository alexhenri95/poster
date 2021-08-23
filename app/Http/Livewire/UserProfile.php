<?php

namespace App\Http\Livewire;

use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    protected $listeners = ['render'];

    public $user;

    public $open_seguidores = false;
    public $open_seguidos = false;

    public function render()
    {
        $friends = Friend::all();
        $users = User::all();
        $posts = Post::where('user_id', $this->user->id)->orderBy('id', 'desc')->get();
        return view('livewire.user-profile', compact('friends','posts','users'));
    }
}
