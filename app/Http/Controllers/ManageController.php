<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	# Return redirect
    	return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
    	# Return view
    	return view('manage.dashboard');
    }
}
