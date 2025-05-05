<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        $slotovi = Slot::where('status', 'slobodan')->get();
        return view('slotovi', compact('slotovi'));
    }

    public function rezervisi(Request $request)
    {
        $slot = Slot::findOrFail($request->slot_id);
        $slot->status = 'rezervisan';
        $slot->save();

        return redirect()->route('korisnik')->with('success', 'Slot je rezervisan!');
    }
}