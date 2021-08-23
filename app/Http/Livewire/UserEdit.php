<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEdit extends Component
{
    use WithFileUploads;

    public $profile, $image, $identificador;
    public $open_edit = false;
    public $profileId;


    protected $rules = [
        'profile.biography' => 'required|max:100',
        // 'image' => 'required|image|max:2048'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.user-edit');
    }

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->profileId = $profile->id;

        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->profile->image]);
            $this->profile->image = $this->image->store('profiles');
        }

        $this->profile->save();
        $this->reset([
            'open_edit',
        ]);

        $this->identificador = rand();

        $this->emitTo('user-profile','render');
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => 'Listo!']);
    }
}
