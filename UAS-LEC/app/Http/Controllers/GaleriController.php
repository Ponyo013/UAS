<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Show the gallery
    public function index()
    {
        // Get all the gallery items
        $galeriItems = Galeri::all();

        // Return view with gallery data (you can modify the view name as needed)
        return view('galeri', compact('galeriItems'));
    }

    public function indexGuess()
    {
        // Get all the gallery items
        $galeriItems = Galeri::all();

        // Return view with gallery data (you can modify the view name as needed)
        return view('galeriGuess', compact('galeriItems'));
    }

    // Store a new gallery item
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $originalName = $request->file('gambar')->getClientOriginalName();
            $imagePath = $request->file('gambar')->storeAs('images', $originalName, 'public');
        }

        Galeri::create([
            'gambar' => $imagePath,
        ]);

        return redirect()->route('show.galeri')->with('success', 'Foto berhasil dimasukkan!');
    }


    // Update an existing gallery item
    public function update(Request $request, $id)
    {
        // Find the gallery item by ID
        $galeriItem = Galeri::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update the gallery item data
        $galeriItem->title = $request->input('title');

        // Handle file upload (if a new gambar is provided)
        if ($request->hasFile('gambar')) {
            // Delete the old gambar if necessary
            if ($galeriItem->gambar) {
                Storage::delete('public/' . $galeriItem->gambar);
            }

            // Store the new gambar
            $galeriItem->gambar = $request->file('gambar')->store('galeri_images', 'public');
        }

        // Save the updated gallery item
        $galeriItem->save();

        // Redirect back with a success message
        return redirect()->route('show.galeri')->with('success', 'Gallery item updated successfully!');
    }

    // Delete a gallery item
    public function destroy($id)
    {
        // Find the gallery item by ID
        $galeriItem = Galeri::findOrFail($id);
        // Delete the gallery item
        $galeriItem->delete();

        // Redirect back with a success message
        return redirect()->route('show.galeri')->with('success', 'Gallery item deleted successfully!');
    }
}
