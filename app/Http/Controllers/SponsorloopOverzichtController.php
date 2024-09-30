<?php

namespace App\Http\Controllers;

use App\Models\Sponsorloop;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SponsorloopOverzichtController extends Controller
{
    public function overzicht(Request $idSponsorloop)
    {
        // Haal de sponsorloop op
        $sponsorloop = Sponsorloop::find($idSponsorloop);

        if (!$sponsorloop) {
            return redirect()->back()->with('error', 'Sponsorloop niet gevonden.');
        }

        // Haal de resultaten op uit de pivot-tabel gebruiker_has_sponsorloop
        $resultaten = DB::table('gebruiker_has_sponsorloop')
            ->join('users as loper', 'gebruiker_has_sponsorloop.user_id', '=', 'loper.id')
            ->join('users as sponsor', 'loper.sponsor_id', '=', 'sponsor.id') 
            ->select('loper.name as loperNaam', 'sponsor.name as sponsorNaam')
            ->where('gebruiker_has_sponsorloop.Sponsorloop_idSponsorloop', $idSponsorloop)
            ->get();

   

        return view('donateur.overzicht', compact('sponsorloop', 'resultaten',));
    }
}
