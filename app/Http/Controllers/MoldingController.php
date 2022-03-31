<?php

namespace App\Http\Controllers;

use App\Models\Molding;
use Illuminate\Http\Request;

class MoldingController extends Controller
{
    public function index()
    {
        return view('moldings.index');
    }

    public function show($id)
    {
        $molding = Molding::where('id', $id)->first();
        return view('moldings.show', [ 
            'molding' => $molding
        ]);
    }

    public function edit($id)
    {
        $molding = Molding::where('id', $id)->first();
        return view('moldings.edit', [ 
            'molding' => $molding
        ]);
    }
}