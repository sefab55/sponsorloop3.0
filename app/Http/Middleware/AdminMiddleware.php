<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Vergeet niet het User model te importeren

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Haal de ingelogde gebruiker op
        $user = Auth::user();

        // Controleer of de gebruiker een instantie van User is en admin-rechten heeft
        if (!$user instanceof User || !$user->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Je hebt geen toestemming om deze actie uit te voeren.');
        }

        return $next($request);
    }
}
