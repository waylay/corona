<?php

namespace App\Http\Controllers;

use App\Entry;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::all();
        // Show the admin dashboard (only logged in users can access it)
        return view('dashboard', compact('entries'));
    }
}
