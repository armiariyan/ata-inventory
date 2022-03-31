<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use App\Models\Machine;
use Livewire\Component;


class MachineCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $type;
    public $notes;
    public $photo;

    public function render()
    {
        return view('livewire.machine-create');
    }

    public function store()
    {
        // Validate Input
        $this->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'photo' => 'required|max:5120|mimes:png,jpg,jpeg'
        ]); 

        // Configure photo folder
        $name = $this->photo->getClientOriginalName();
        $filename = $this->photo->storeAs('photos', $name, 'public');

        Machine::create([
            'name' => $this->name,
            'type' => $this->type,
            'notes' => $this->notes,
            'photo' => $filename,
        ]);

        session()->flash('message', 'Data successfully added!');

        $this->resetInput();
        $this->emit('machineStored');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->type = null;
        $this->notes = null;
    }
}


