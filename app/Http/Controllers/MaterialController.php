<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return view('materials.index');
    }

    public function show($id)
    {
        $material = Material::where('id', $id)->first();
        return view('materials.show', [ 
            'material' => $material
        ]);
    }

    public function edit($id)
    {
        $material = Material::where('id', $id)->first();
        return view('materials.edit', [ 
            'material' => $material
        ]);
    }
}
