<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Machine;

class MachineIndex extends Component
{
    protected $listeners = [
        'machineStored' => 'handleStored'
    ];

    public function render()
    {
        return view('livewire.machine-index', [
            'machines' => Machine::latest()->get()
        ]);
    }

    public function handleStored()
    {
        session()->flash('message', 'Data successfully added!');
    }


}
