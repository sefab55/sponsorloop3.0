<?php

namespace App\Http\Controllers;

use App\Models\Resultaat;
use App\Models\Sponsorloop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultaatController extends Controller
{
   // Haal de sponsorlopen waarvoor de gebruiker is ingeschreven
public function showRegisterDeviceForm()
{
    $user = Auth::user();

    // Haal alleen de sponsorlopen op waarvoor de gebruiker is ingeschreven
    $sponsorlopen = $user->sponsorlopen;

    return view('resultaat.register_device', compact('sponsorlopen'));
}


    // Verwerk registratie van telefoon of smartwatch
    public function registerDevice(Request $request)
{
    $request->validate([
        'sponsorloop_id' => 'required|exists:sponsorloop,idSponsorloop',
        'afgelegdeAfstand' => 'required|string|max:45',  // bijvoorbeeld '30 km'
    ]);

    // Haal de sponsorloop op
    $sponsorloop = Sponsorloop::find($request->sponsorloop_id);

    // Converteer de afstand naar een numeriek formaat
    $totaleAfstand = (float)filter_var($request->afgelegdeAfstand, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $rondjeAfstand = (float)filter_var($sponsorloop->afstand, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // Bereken het aantal rondjes
    $aantalRondjes = floor($totaleAfstand / $rondjeAfstand);

    // Bereken het opgehaalde bedrag
    $opgehaaldeBedrag = $aantalRondjes * $sponsorloop->standaardBedrag;

    // Maak registratie van resultaat aan
    Resultaat::create([
        'user_id' => Auth::id(),
        'sponsorloop_id' => $request->sponsorloop_id,
        'afgelegdeAfstand' => $request->afgelegdeAfstand,
        'opgehaaldeBedrag' => $opgehaaldeBedrag,
    ]);

    return redirect()->route('resultaat.overzicht')->with('success', 'Je apparaat is geregistreerd.');
}

    // Toon het overzicht van de gelopen afstanden en opgehaalde bedragen
public function showResultaatOverzicht()
{
    $resultaten = Resultaat::where('user_id', Auth::id())->get();
    return view('resultaat.overzicht', compact('resultaten'));
}

}
