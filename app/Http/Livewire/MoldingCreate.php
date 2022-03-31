<?php

namespace App\Http\Livewire;

use App\Models\Molding;
use Livewire\Component;
use Livewire\WithFileUploads;

class MoldingCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $notes;
    public $photo;

    protected $listeners = [
        'moldingDeleted' => 'showDeletedAlert'
    ];

    public function render()
    {
        return view('livewire.molding-create');
    }

    public function store()
    {
        // Validate Input
        $this->validate([
            'name' => 'required|min:3',
            'notes' => 'required',
            'photo' => 'required|max:5120|mimes:png,jpg,jpeg'
        ]); 

        // Configure file photo name to unique and folder to put the file
        $name = time() . '_' . $this->photo->getClientOriginalName();
        $filename = $this->photo->storeAs('photos', $name, 'public');

        Molding::create([
            'name' => $this->name,
            'notes' => $this->notes,
            'photo' => $filename,
        ]);

        session()->flash('message', 'Data successfully added!');

        $this->resetInput();
        $this->emit('moldingStored');
    }

    public function showDeletedAlert() {
        session()->flash('message', 'Data successfully deleted!');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->notes = null;
    }
}
