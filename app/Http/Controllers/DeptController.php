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
        $lastNumber = (int) substr($lastDept->id, 2); 
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    // Generate format ID baru (RL002)
    $generatedId = 'DEPT' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

    return view('admin.dept.add', compact('generatedId'));
    }
}
