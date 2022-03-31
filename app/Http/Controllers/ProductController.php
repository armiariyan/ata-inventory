<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show', [ 
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', [ 
            'product' => $product
        ]);
    }


}