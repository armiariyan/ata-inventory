<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Machine;

class MachineIndex extends Component
{
    public function render()
    {
        return view('livewire.machine-index', [
            'machines' => Machine::all()
        ]);
            

    }

}
