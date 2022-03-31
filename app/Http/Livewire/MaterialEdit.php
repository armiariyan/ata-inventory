<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithFileUploads;

class MaterialEdit extends Component
{
    use WithFileUploads;

    public $materialId;
    public $name;
    public $type;
    public $notes;
    public $photo;

    public function mount($material)
    {
        $this->materialId = $material->id;
        $this->name = $material->name;
        $this->notes = $material->notes;
        $this->type = $material->type;
        // $this->photo = $material->photo;

    }

    public function render()
    {
        return view('livewire.material-edit');
    }

    public function update()
    {

        // If there is new photo
        if ($this->photo){

            // Get and delete old photo 
            $oldPhoto = Material::where('id', $this->materialId)->first(['photo'])->photo;
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
            Material::where('id', $this->materialId)->update([
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
            Material::where('id', $this->materialId)->update([
                'name' => $this->name,
                'type' => $this->type,
                'notes' => $this->notes,
            ]);
        }
        
        $this->resetInput();
        redirect()->route('material.home')->with('message', 'Data successfully updated!');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->type = null;
        $this->notes = null;
    }
}