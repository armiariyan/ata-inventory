<?php

namespace App\Http\Livewire;


// use Livewire\WithFileUploads;
use App\Models\Machine;
use Livewire\Component;

class MachineUpdate extends Component
{
    protected $listeners = ['showMachine' => 'showMachine'];

    public $name;
    public $type;
    public $notes;
    public $machineId;


    public function render()
    {
        return view('livewire.machine-update');
    }

    public function showMachine($machine)
    {
        dd("armia");
        $this->machineId = $machine['id'];
        $this->name = $machine['name'];
        $this->type = $machine['type'];
        $this->notes = $machine['notes'];
    }

}
