<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    use WithFileUploads;

    public $productId;
    public $name;
    public $type;
    public $notes;
    public $photo;

    public function mount($product)
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->notes = $product->notes;
        $this->type = $product->type;
        // $this->photo = $product->photo;

    }

    public function render()
    {
        return view('livewire.product-edit');
    }

    public function update()
    {

        // If there is new photo
        if ($this->photo){

            // Get and delete old photo 
            $oldPhoto = Product::where('id', $this->productId)->first(['photo'])->photo;
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
            Product::where('id', $this->productId)->update([
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
            Product::where('id', $this->productId)->update([
                'name' => $this->name,
                'type' => $this->type,
                'notes' => $this->notes,
            ]);
        }
        
        $this->resetInput();
        redirect()->route('product.home')->with('message', 'Data successfully updated!');
    }

    private function resetInput()
    {
        $this->photo = null;
        $this->name = null;
        $this->type = null;
        $this->notes = null;
    }
}
