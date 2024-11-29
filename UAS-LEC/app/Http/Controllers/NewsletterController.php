<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('newsletter', compact('newsletters'));
    }

    public function create()
    {
    }    
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'publish_date' => 'required|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $originalName, 'public');
        }

       Newsletter::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,  
            'publish_date' => $request->input('publish_date'),
        ]);

        return redirect()->route('show.newsletter')->with('success', 'Newsletter telah diterbitkan!');
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        $newsletter = Newsletter::findOrFail($id);

        $newsletter->title = $request->input('title');
        $newsletter->description = $request->input('description');
        $newsletter->publish_date = $request->input('publish_date');

        if ($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $originalName, 'public');
            $newsletter->image = $imagePath;
        }

        $newsletter->save();

        return redirect()->route('show.newsletter')->with('success', 'Newsletter telah diedit!');
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();
    
        return redirect()->route('show.newsletter')->with('success', 'Newsletter telah dihapus!');
    }
}
