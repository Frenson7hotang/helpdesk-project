<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.dashboard');
    }

    public function add()
    {
    // Ambil data terakhir, pastikan urutannya akurat
    $lastRole = RoleModel::orderBy('id', 'desc')->first();

    if ($lastRole) {
        // Ambil angka dari string (misal: "RL001" -> ambil "001", di-cast ke integer jadi 1)
        $lastNumber = (int) substr($lastRole->id, 2); 
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    // Generate format ID baru (RL002)
    $generatedId = 'RL' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    return view('admin.role.add', compact('generatedId'));
    }
    
    public function simpan(Request $request)
    {
        $validated = $request->validate([
        'id'   => 'required',
        'name' => 'required',
        ]);

        RoleModel::create([
            'id'=>$request->id,
            'name'=>$request->name
        ]);
        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }
}
