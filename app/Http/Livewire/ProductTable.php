<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductTable extends Component
{
    protected $listeners = [
        'productStored' => 'render'
    ];
    
    public function render()
    {
        return view('livewire.product-table', [
            'products' => Product::latest()->get()
        ]);
    }

    public function delete($id)
    {
        
        // Get and delete old photo from directory
        $oldPhoto = Product::where('id', $id)->first(['photo'])->photo;
        unlink(public_path('storage/' . $oldPhoto));
        
        Product::find($id)->delete();

        $this->emit('productDeleted');
    }
}
