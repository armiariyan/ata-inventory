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

    public function delete($id)
    {
        
        // Get and delete old photo from directory
        $oldPhoto = Machine::where('id', $id)->first(['photo'])->photo;
        unlink(public_path('storage/' . $oldPhoto));
        
        // Perintah ngedelete data di database
        Machine::find($id)->delete();

        // Render ulang table
        $this->emit('machineDeleted');
    }
}