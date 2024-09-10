<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role; // Zorg ervoor dat het Role model is geïmporteerd
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Haal alle beschikbare rollen op voor de rolkeuze in het registratieformulier
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'voornaam' => ['required', 'string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'adres' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:10'], // Validatie voor postcode
            'telefoonnummer' => ['required', 'string', 'max:15'], // Validatie voor telefoonnummer
            'rol' => ['required', 'exists:roles,id'], // Zorg dat de rol bestaat in de roles tabel
        ]);

        // Maak een nieuwe gebruiker aan met de geregistreerde gegevens
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'adress' => $request->adres,
            'postcode' => $request->postcode, // Voeg postcode toe
            'telefoonnummer' => $request->telefoonnummer, // Voeg telefoonnummer toe
            'Rol_idRol' => $request->rol, // Koppel de gekozen rol aan de gebruiker
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
