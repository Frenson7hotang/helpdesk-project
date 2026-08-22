<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.dashboard');
    }

    public function add()
    {
        return view('admin.role.add');
    }   
}
