<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $users = User::where('name', 'like' ,'%'.$this->search.'%')
                        ->where('id', '!=', auth()->user()->id)
                        ->paginate(20);
        
        return view('livewire.search', compact('users'));
    }
}
