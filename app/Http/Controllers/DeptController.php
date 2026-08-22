<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function index()
    {
        return view('admin.dept.dashboard');
    }

    public function add()
    {
        return view('admin.dept.add');
    }
}
