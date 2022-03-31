<?php

namespace App\Http\Livewire;

use App\Models\Molding;
use Livewire\Component;

class MoldingTable extends Component
{
    protected $listeners = [
        'moldingStored' => 'render'
    ];
    
    public function render()
    {
        return view('livewire.molding-table', [
            'moldings' => Molding::latest()->get()
        ]);
    }

    public function delete($id)
    {
        
        // Get and delete old photo from directory
        $oldPhoto = Molding::where('id', $id)->first(['photo'])->photo;
        unlink(public_path('storage/' . $oldPhoto));
        
        Molding::find($id)->delete();

        $this->emit('moldingDeleted');
    }

}
