<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aktivitas = Aktivitas::all();
        return view('aktivitas', compact('aktivitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'tanggal' => 'required|date',
        ]);
    
        $aktivitas = new Aktivitas;
        $aktivitas->judul = $request->judul;
        $aktivitas->kategori = $request->kategori;
        $aktivitas->deskripsi = $request->deskripsi;
        $aktivitas->tanggal = $request->tanggal;
    
        if ($request->hasFile('gambar')) {
            $originalFileName = $request->file('gambar')->getClientOriginalName();
            $gambar = $request->file('gambar')->storeAs('images', $originalFileName, 'public');
            $aktivitas->gambar = $gambar;
        }
        
    
        $aktivitas->save();
    
        return redirect()->route('show.aktivitas')->with('success', 'Aktivitas berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);

        
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'tanggal' => 'required|date',
        ]);
        
        $aktivitas->judul = $request->input('judul');
        $aktivitas->kategori = $request->input('kategori');
        $aktivitas->deskripsi = $request->input('deskripsi');
        $aktivitas->tanggal = $request->input('tanggal');

        if ($request->hasFile('gambar')) {
            $originalFileName = $request->file('gambar')->getClientOriginalName();
            $gambar = $request->file('gambar')->storeAs('images', $originalFileName, 'public');
            $aktivitas->gambar = $gambar;
        }
        
        $aktivitas->save();
        return redirect()->route('show.aktivitas')->with('success', 'Aktivitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();
    
        return redirect()->route('show.aktivitas')->with('success', 'Aktivitas terakhir telah dihapus!');
    }
}
