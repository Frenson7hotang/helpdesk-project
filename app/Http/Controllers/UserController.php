<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\DeptModel;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.dashboard');
    }

    public function add()
    {
        $role = RoleModel::all();
        $dept = DeptModel::all();

        $lastUser = UserModel::orderBy('id', 'desc')->first();

    if ($lastUser) {
        // Ambil angka dari string (misal: "RL001" -> ambil "001", di-cast ke integer jadi 1)
        $lastNumber = (int) substr($lastUser->id, 5); 
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    // Generate format ID baru (RL002)
    $generatedId = 'USR' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        return view('admin.user.add', ['role' => $role, 'dept' => $dept, 'generatedId' => $generatedId]);
    }

    public function simpan(Request $request)
    {
        try{
            $validated = $request->validate([
                'id' => 'required',
                'nama' => 'required',
                'nik' => 'required',
                'tanggal' => 'required|date',
                'role' => 'required',
                'dept' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
                'password' => 'required',
                'gambar' => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf|max:10240',
            ]);

            $mediaPath = null;

            if ($request->hasFile('gambar')){
                $file = $request->file('gambar');
                $mediaPath = $file->store('gambar', 'public');
            }

            UserModel::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tanggal' => $request->tanggal,
                'role' => $request->role,
                'dept' => $request->dept,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => md5($request->password),
                'gambar' => $mediaPath
            ]);
             return redirect()->route('user.dashboard')->with('success', 'Data Berhasil Disimpan');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            }
    }
}
