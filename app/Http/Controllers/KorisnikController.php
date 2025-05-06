<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    public function prikaziFormu()
    {
        // Prikaz forme za unos korisnika
        return view('korisnik.forma');
    }

    public function sacuvaj(Request $request)
    {
        // Logika za čuvanje korisnika
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Sačuvajte podatke u bazu ili uradite nešto drugo
        return redirect()->route('korisnik')->with('success', 'Korisnik sačuvan!');
    }
}