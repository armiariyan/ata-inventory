<?php

namespace App\Http\Livewire\Machine;

use App\Models\Machine;
use Livewire\Component;

class MachineTable extends Component
{
    protected $listeners = [
        'machineStored' => 'render'
    ];
    
    public function render()
    {
        return view('livewire.machine.machine-table', [
            'machines' => Machine::latest()->get()
        ]);
    }



}