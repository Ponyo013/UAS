<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Aktivitas;
use App\Models\Donasi;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCount = User::count();
        $newsletterCount = Newsletter::count();
        $aktivitasCount = Aktivitas::count();
        $donasiCount = Donasi::count();

       
        $totalDonasi = Donasi::sum('jumlah_donasi');
        $totalDonasiToday = Donasi::whereDate('created_at', Carbon::today())->sum('jumlah_donasi');
        
        $totalDonasiThisWeek = Donasi::whereBetween('created_at', [
            Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()
        ])->sum('jumlah_donasi');

        $totalDonasiThisYear = Donasi::whereYear('created_at', Carbon::now()->year)->sum('jumlah_donasi');

        return view('dashboard', compact(
            'userCount', 'newsletterCount', 'aktivitasCount', 'donasiCount',
            'totalDonasi', 'totalDonasiToday', 'totalDonasiThisWeek', 'totalDonasiThisYear'
        ));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::where('role', 0)->get();
        return view('ManageUser', compact('users'));
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
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'email_verified_at' => 'nullable|date',  
        ]);
    
        $user->update($validated);
        return redirect()->route('ManageUser')->with('success', 'User Telah diperbarui!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {
        
            $user->delete();
            return redirect()->route('ManageUser')->with('success', 'User Berhasil Dihapus.');
        }
        return redirect()->route('ManageUser')->with('error', 'User not found.');
    }
}
