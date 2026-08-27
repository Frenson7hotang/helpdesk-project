<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $search = $request->input('search');

        $role = RoleModel::when($search, function ($query, $search) {
                    return $query->where('name', 'like', "%{$search}%")
                                 ->orWhere('id', 'like', "%{$search}%"); // Bisa cari berdasarkan nama atau kode role
                })
                ->paginate($perPage)
                ->appends(['perPage' => $perPage, 'search' => $search]);

        return view('admin.role.dashboard', compact('role'));
    }

    public function boot(): void
    {
    Paginator::useBootstrapFive();
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

        try{
            
        RoleModel::create([
            'id'=>$request->id,
            'name'=>$request->name
        ]);
        return redirect()->route('role.dashboard')->with('success', 'Data Berhasil Disimpan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    }
    }

    public function edit($id)
    {
        $role = RoleModel::findOrFail($id);
        return view('admin.role.edit', compact('role'));
    }
    
    public function update($id)
    {
        $validated = request()->validate([
            'id'   => 'required',
            'name' => 'required'
        ]);

        try {
            $role = RoleModel::findOrFail($id);
            $role->update([
                'id'   => request('id'),
                'name' => request('name')
            ]);
            return redirect()->route('role.dashboard')->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }
    
    public function hapus($id)
    {
        try {
            $role = RoleModel::findOrFail($id);
            $role->delete();
            return redirect()->route('role.dashboard')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}