<?php

namespace App\Http\Controllers;
use App\Models\Donasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        $request->validate([
            'nama_donatur' => 'required|string|max:255',
            'jumlah_donasi' => 'required|min:0',
            'deskripsi' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpg,png,gif|max:2048',
        ]);

        $jumlahDonasi = preg_replace('/\D/', '', $request->jumlah_donasi);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('donasi_images', $request->file('image')->getClientOriginalName(), 'public');
        }

        $userId = Auth::id(); 

        Donasi::create([
            'user_id' => $userId,
            'nama_donatur' => $request->nama_donatur,
            'jumlah_donasi' => $jumlahDonasi,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath, 
        ]);

        return redirect()->route('donasi')->with('success', 'Terima kasih atas donasi Anda akan! Donasi akan diproses');
    }

    public function destroy($id)
    {

        $donasi = Donasi::findOrFail($id);
        if ($donasi->image) {
            Storage::disk('public')->delete($donasi->image);
        }
        $donasi->delete();
        return redirect()->route('show.donasi')->with('success', 'Donatur berhasil dihapus');
    }
}
