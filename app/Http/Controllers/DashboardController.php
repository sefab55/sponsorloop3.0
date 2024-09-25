<?php

namespace App\Http\Controllers;

use App\Models\Sponsorloop;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Toon het dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Haal alle sponsorlopen op
        $sponsorlopen = Sponsorloop::all();

        // Stuur de sponsorlopen door naar de Blade-template
        return view('dashboard', compact('sponsorlopen'));
    }
}
