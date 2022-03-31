<?php

namespace App\Http\Livewire;

use App\Models\Molding;
use Livewire\Component;
use Livewire\WithFileUploads;

class MoldingEdit extends Component
{
    use WithFileUploads;

    public $moldingId;
    public $name;
    public $type;
    public $notes;
    public $photo;

    public function mount($molding)
    {
        $this->moldingId = $molding->id;
        $this->name = $molding->name;
        $this->notes = $molding->notes;
        // $this->photo = $molding->photo;

    }

    public function render()
    {
        return view('livewire.molding-edit');
    }

    public function update()
    {

        // If there is new photo
        if ($this->photo){

            // Get and delete old photo 
            $oldPhoto = Molding::where('id', $this->moldingId)->first(['photo'])->photo;
            unlink(public_path('storage/' . $oldPhoto));

            // Validate Input
            $this->validate([
                'name' => 'required|min:3',
                'photo' => 'max:5120|mimes:png,jpg,jpeg'
            ]); 
            
             // Configure file photo name to unique and folder to put the file
            $name = time() . '_' . $this->photo->getClientOriginalName();
            $filename = $this->photo->storeAs('photos', $name, 'public');

            // Update
            Molding::where('id', $this->moldingId)->update([
                'name' => $this->name,
                'notes' => $this->notes,
                'photo' => $filename,
            ]);
        } else {
             // Validate Input
             $this->validate([
                'name' => 'required|min:3',
            ]); 
            Molding::where('id', $this->moldingId)->update([
                'name' => $this->name,
                'notes' => $this->notes,
            ]);
        }
        
        $this->resetInput();
        redirect()->route('molding.home')->with('message', 'Data successfully updated!');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->notes = null;
    }
}
