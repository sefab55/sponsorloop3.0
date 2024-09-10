<?php

namespace App\Http\Controllers;

use App\Models\Sponsorloop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;


class SponsorloopController extends Controller
{
    /**
     * Toon het formulier voor het creëren van een nieuwe sponsorloop.
     * Alleen toegankelijk voor admin-gebruikers.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function createSponsorloop()
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Controleer of de gebruiker een instantie van User is en admin-rechten heeft
        if (!$user instanceof User || !$user->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Je hebt geen toestemming om deze actie uit te voeren.');
        }

        // Toon het aanmaakformulier voor sponsorloop
        return view('sponsorloop.creeren'); // Zorg ervoor dat deze view bestaat
    }

    /**
     * Verwerk het formulier voor het opslaan van de sponsorloop.
     * Alleen toegankelijk voor admin-gebruikers.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSponsorloop(Request $request)
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Controleer of de gebruiker een instantie van User is en admin-rechten heeft
        if (!$user instanceof User || !$user->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Je hebt geen toestemming om deze actie uit te voeren.');
        }

        // Valideer de invoer
        $request->validate([
            'naam' => 'required|string|max:255',
            'locatie' => 'required|string|max:255',
            'standaardBedrag' => 'required|numeric',
            'afstand' => 'required|string|max:255',
            'beschrijving' => 'nullable|string',
            'datum' => 'required|date',
            'route' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:1024',
            'Organisatie_idOrganisatie' => 'required|integer',
            'Doel_idDoel' => 'required|integer',
        ]);

        // Maak de sponsorloop aan
        Sponsorloop::create([
            'naam' => $request->naam,
            'locatie' => $request->locatie,
            'standaardBedrag' => $request->standaardBedrag,
            'afstand' => $request->afstand,
            'beschrijving' => $request->beschrijving,
            'datum' => $request->datum,
            'route' => $request->route,
            'foto' => $request->hasFile('foto') ? $request->file('foto')->store('fotos', 'public') : null,
            'Organisatie_idOrganisatie' => $request->Organisatie_idOrganisatie,
            'Doel_idDoel' => $request->Doel_idDoel,
        ]);

        // Redirect met een success message
        return redirect()->route('dashboard')->with('success', 'Sponsorloop succesvol aangemaakt!');
    }

    /**
     * Toon het inschrijfformulier voor een sponsorloop.
     *
     * @return \Illuminate\View\View
     */
   // Toon het inschrijfformulier voor een sponsorloop
   public function showInschrijvenForm()
   {
       $sponsorlopen = Sponsorloop::all();
       return view('sponsorloop.inschrijven', compact('sponsorlopen'));
   }
    /**
     * Verwerk de inschrijving van een gebruiker voor een sponsorloop.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // Verwerk de inschrijving van een gebruiker voor een sponsorloop

public function storeInschrijven(Request $request)
{
    // Valideer de invoer
    $request->validate([
        'sponsorloop_id' => 'required|exists:sponsorloop,idSponsorloop',
    ]);

    // Haal de sponsorloop op aan de hand van de juiste kolomnaam
    $sponsorloop = Sponsorloop::where('idSponsorloop', $request->sponsorloop_id)->firstOrFail();

    // Controleer of de gebruiker al is ingeschreven voor deze sponsorloop
    $existingEntry = $sponsorloop->gebruikers()->where('user_id', Auth::id())->exists();

    if ($existingEntry) {
        return redirect()->back()->with('error', 'Je bent al ingeschreven voor deze sponsorloop.');
    }

    // Koppel de gebruiker aan de sponsorloop (inschrijving)
    $sponsorloop->gebruikers()->attach(Auth::id());

    // Maak een betaalverzoek en verstuur de e-mail
    $this->createPaymentRequest(Auth::id(), $sponsorloop->idSponsorloop);

    // Redirect met een success message
    return redirect()->route('dashboard')->with('success', 'Je bent succesvol ingeschreven voor de sponsorloop en het betaalverzoek is verstuurd naar je e-mail!');
}

//dit is logica voor de payments
public function createPaymentRequest($userId, $sponsorloopId)
{
    // Simuleer een betaalverzoek door een fake URL te maken
    $paymentUrl = route('payment.success'); // Dit verwijst naar de fake betaalpagina

    // Haal de gebruiker op en stuur de e-mail met de fake betaalverzoek link
    $user = User::find($userId);

    if ($user) {
        // Verstuur een email met de fake betalingslink
        Mail::to($user->email)->send(new PaymentRequestMail($paymentUrl));

        // Redirect met een success message
        return redirect()->route('dashboard')->with('success', 'Betaalverzoek is verstuurd naar je e-mail.');
    } else {
        // Als de gebruiker niet gevonden wordt, geef een foutmelding
        return redirect()->back()->with('error', 'Gebruiker niet gevonden.');
    }
}



}
