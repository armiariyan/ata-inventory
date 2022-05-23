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
        // Ngambil data dari tabel machine yang ID nya sesuai dengan yg lu masukin/pilih.
        $machine = Machine::where('id', $id)->first();
        // Nampilin view/halaman, sambil ngirim data yang diambil sebelumnya
        return view('machines.show', [ 
            'machine' => $machine
        ]);
    }

    public function edit($id)
    {
        // Ambil data mesin yang ID nya sesuai dengan yang dikirim
        $machine = Machine::where('id', $id)->first();
        return view('machines.edit', [ 
            'machine' => $machine
        ]);
    }


}
