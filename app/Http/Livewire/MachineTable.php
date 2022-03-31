<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use Livewire\Component;

class MachineTable extends Component
{
    protected $listeners = [
        'machineStored' => 'render'
    ];
    
    public function render()
    {
        return view('livewire.machine-table', [
            'machines' => Machine::latest()->get()
        ]);
    }



}