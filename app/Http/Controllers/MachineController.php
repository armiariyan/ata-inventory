<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        return view('machines.index');
    }

    public function show($id)
    {
        $machine = Machine::where('id', $id)->first();
        return view('machines.show', [ 
            'machine' => $machine
        ]);
    }


}
