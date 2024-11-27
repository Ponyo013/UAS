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
        
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
        
    }
}
