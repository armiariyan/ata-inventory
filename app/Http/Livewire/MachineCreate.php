<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use App\Models\Machine;
use Livewire\Component;


class MachineCreate extends Component
{
    use WithFileUploads;

    // Untuk menangkap inputan dari form sesuai identitasnya
    public $name;
    public $type;
    public $notes;
    public $photo;

    protected $listeners = [
        'machineDeleted' => 'showDeletedAlert'
    ];

    public function render()
    {
        return view('livewire.machine-create');
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
        // Untuk ngatur penyimpanan foto. Parameter ke 1 itu nama folder, ke 2 itu nama file, ke 3 itu aksesibilitas
        $filename = $this->photo->storeAs('photos', $name, 'public');

        // Simpen ke database
        Machine::create([
            'name' => $this->name,
            'type' => $this->type,
            'notes' => $this->notes,
            'photo' => $filename,
        ]);

        // Buat bikin alert
        session()->flash('message', 'Data successfully added!');

        // Ngosongin input form
        $this->resetInput();

        // Jalanin fungsi machineStored, untuk merender ulang komponen yang berubah
        $this->emit('machineStored');
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


