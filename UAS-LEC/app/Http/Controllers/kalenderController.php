<?php

namespace App\Http\Controllers;

use App\Models\Calender;
use Illuminate\Http\Request;

class kalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function KalenderGuest()
    {
        $events = array();
        $calenders = Calender::all();

        foreach ($calenders as $calender) {
            $events[] = [
                'id' => $calender->id,
                'title' => $calender->title,
                'start' => $calender->start_date,
                'end' => $calender->end_date,
            ];
        }


        return view('KalenderGuest', ['events' => $events]);
    }

    public function index()
    {
        $events = array();
        $calenders = Calender::all();

        foreach ($calenders as $calender) {
            $events[] = [
                'id' => $calender->id,
                'title' => $calender->title,
                'start' => $calender->start_date,
                'end' => $calender->end_date,
            ];
        }


        return view('kalender', ['events' => $events]);
    }
    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $calender = Calender::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        // return 'pass';
        return response()->json($calender);
    }
    public function update(Request $request, $id)
    {
        $calender = Calender::find($id);
        if (!$calender) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
        $calender->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Data has been updated');
    }

    public function destroy($id)
    {
        $calender = Calender::find($id);
        if (!$calender) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        $calender->delete();
        return $id;
    }
}
