<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithFileUploads;

class MaterialCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $type;
    public $notes;
    public $photo;

    protected $listeners = [
        'materialDeleted' => 'showDeletedAlert'
    ];

    public function render()
    {
        return view('livewire.material-create');
    }

    public function store()
    {
        // Validate Input
        $this->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'photo' => 'required|max:5120|mimes:png,jpg,jpeg'
        ]); 

        // Configure file photo name to unique and folder to put the file
        $name = time() . '_' . $this->photo->getClientOriginalName();
        $filename = $this->photo->storeAs('photos', $name, 'public');

        Material::create([
            'name' => $this->name,
            'type' => $this->type,
            'notes' => $this->notes,
            'photo' => $filename,
        ]);

        session()->flash('message', 'Data successfully added!');

        $this->resetInput();
        $this->emit('materialStored');
    }

    public function showDeletedAlert() {
        session()->flash('message', 'Data successfully deleted!');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->type = null;
        $this->notes = null;
    }
}
