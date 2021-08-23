<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Heart;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Activity extends Component
{
    use WithPagination;
    
    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        $hearts = Heart::where('user_id','!=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $comments = Comment::where('user_id','!=', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.activity', compact('hearts','comments','posts'));
    }
}
