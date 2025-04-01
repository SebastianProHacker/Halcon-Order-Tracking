<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Regresa el index o el dashboard
    public function index()
    {
        // Regresa dashboard view
        return view('dashboard'); 
    }
}