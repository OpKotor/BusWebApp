<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        // Logika za prikaz slotova
        return view('slotovi.index');
    }

    public function rezervisi(Request $request)
    {
        // Logika za rezervaciju slotova
        return redirect()->route('slotovi')->with('success', 'Rezervacija uspešna!');
    }
}