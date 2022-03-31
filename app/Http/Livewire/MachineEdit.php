<?php

namespace App\Http\Livewire;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MachineEdit extends Component
{
    use WithFileUploads;

    public $machineId;
    public $name;
    public $type;
    public $notes;
    public $photo;

    public function mount($machine)
    {
        $this->machineId = $machine->id;
        $this->name = $machine->name;
        $this->notes = $machine->notes;
        $this->type = $machine->type;
        // $this->photo = $machine->photo;

    }

    public function render()
    {
        return view('livewire.machine-edit');
    }

    public function update()
    {

        // If there is new photo
        if ($this->photo){

            // Get and delete old photo 
            $oldPhoto = Machine::where('id', $this->machineId)->first(['photo'])->photo;
            unlink(public_path('storage/' . $oldPhoto));

            // Validate Input
            $this->validate([
                'name' => 'required|min:3',
                'type' => 'required',
                'photo' => 'max:5120|mimes:png,jpg,jpeg'
            ]); 
            
             // Configure file photo name to unique and folder to put the file
            $name = time() . '_' . $this->photo->getClientOriginalName();
            $filename = $this->photo->storeAs('photos', $name, 'public');

            // Update
            Machine::where('id', $this->machineId)->update([
                'name' => $this->name,
                'type' => $this->type,
                'notes' => $this->notes,
                'photo' => $filename,
            ]);
        } else {
             // Validate Input
             $this->validate([
                'name' => 'required|min:3',
                'type' => 'required',
            ]); 
            Machine::where('id', $this->machineId)->update([
                'name' => $this->name,
                'type' => $this->type,
                'notes' => $this->notes,
            ]);
        }
        
        $this->resetInput();
        redirect()->route('machine.home')->with('message', 'Data successfully updated!');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->type = null;
        $this->notes = null;
    }
}
