<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Material;

class MaterialTable extends Component
{
    protected $listeners = [
        'materialStored' => 'render'
    ];
    
    public function render()
    {
        return view('livewire.material-table', [
            'materials' => Material::latest()->get()
        ]);
    }

    public function delete($id)
    {
        
        // Get and delete old photo from directory
        $oldPhoto = Material::where('id', $id)->first(['photo'])->photo;
        unlink(public_path('storage/' . $oldPhoto));
        
        Material::find($id)->delete();

        $this->emit('materialDeleted');
    }

}