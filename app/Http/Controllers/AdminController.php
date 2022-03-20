<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        # Return redirect
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        # Return view
        return view('admin.dashboard');
    }
}
