<?php

namespace App\Http\Controllers;
use App\Models\Donasi;

use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function donasiGuest()
    {
        $donasi = Donasi::all();
        return view('donasiGuest', compact('donasi'));
    }

    public function index()
    {
        $donasi = Donasi::all();
        return view('donasi', compact('donasi'));
    }
}
