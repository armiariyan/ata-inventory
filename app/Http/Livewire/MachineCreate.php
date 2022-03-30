<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use Livewire\Component;

class MachineCreate extends Component
{
    // public $photo;
    public $name;
    public $type;
    public $notes;

    public function render()
    {
        return view('livewire.machine-create');
    }

    public function store()
    {
        Machine::create([
            'name' => $this->name,
            'type' => $this->type,
            'notes' => $this->notes
        ]);

        $this->resetInput();

        $this->emit('machineStored');
    }

    private function resetInput()
    {
        // $this->photo = null;
        $this->name = null;
        $this->type = null;
        $this->notes = null;
    }
}
