<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Aktivitas;
use App\Models\Galeri;

class HomeController extends Controller
{
    /**
     * Show the application dashboard with newsletters and activities.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $newsletters = Newsletter::all(); 
        $galeri = Galeri::all(); 
        $aktivitas = Aktivitas::latest()->limit(3)->get(); 

        // Pass the data to the view
        return view('welcome', compact('newsletters', 'aktivitas', 'galeri'));
    }
}
