<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeptModel;

class DeptController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $search = $request->input('search');

        $dept = DeptModel::when($search, function ($query, $search) {
                    return $query->where('name', 'like', "%{$search}%")
                                 ->orWhere('id', 'like', "%{$search}%"); // Bisa cari berdasarkan nama atau kode role
                })
                ->paginate($perPage)
                ->appends(['perPage' => $perPage, 'search' => $search]);

        return view('admin.dept.dashboard', compact('dept'));
    }

    public function boot(): void
    {
    Paginator::useBootstrapFive();
    }

    public function add()
    {
    // Ambil data terakhir, pastikan urutannya akurat
    $lastDept = DeptModel::orderBy('id', 'desc')->first();

    if ($lastDept) {
        // Ambil angka dari string (misal: "RL001" -> ambil "001", di-cast ke integer jadi 1)
        $lastNumber = (int) substr($lastDept->id, 3); 
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    // Generate format ID baru (RL002)
    $generatedId = 'DPT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    return view('admin.dept.add', compact('generatedId'));
    }

    public function simpan(Request $request)
    {
        try{
            $validated = $request->validate([
                'id'   => 'required',
                'dept' => 'required',
            ]);

            DeptModel::create([
                'id'=>$request->id,
                'dept'=>$request->dept
            ]);

            return redirect()->route('dept.dashboard')->with('success', 'Departement Berhasil Disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Menyimpan Departement: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $dept = DeptModel::findOrFail($id);
        return view('admin.dept.edit', compact('dept'));
    }

    public function update($id)
    {
        $validated = request()->validate([
            'id'   => 'required',
            'dept' => 'required'
        ]);

        try {
            $dept = DeptModel::findOrFail($id);
            $dept->update([
                'id'   => request('id'),
                'dept' => request('dept')
            ]);
            return redirect()->route('dept.dashboard')->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    public function hapus($id)
    {
        try {
            $dept = DeptModel::findOrFail($id);
            $dept->delete();
            
            return redirect()->route('dept.dashboard')->with('success', 'Departement Berhasil Dihapus.');
         } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Menghapus Departement: ' . $e->getMessage());
        }
    }
}

