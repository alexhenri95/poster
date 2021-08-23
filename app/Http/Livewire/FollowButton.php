<?php

namespace App\Http\Livewire;

use App\Models\Friend;
use Livewire\Component;

class FollowButton extends Component
{
    public $user;

    public function render()
    {
        // $friend = Friend::where('user_id', auth()->user()->id)->get();
        $friend = Friend::where('receptor_id', $this->user->id)->get();
        return view('livewire.follow-button', compact('friend'));
    }

    public function saveFriend()
    {
        Friend::create([
            'user_id' => auth()->user()->id,
            'receptor_id' => $this->user->id,
        ]);
    }

    public function deleteFriend($value_user, $value_profile)
    {
        $deleteFriend = Friend::where('user_id', $value_user)
                            ->where('receptor_id', $value_profile)
                            ->delete();                          
    }
}
