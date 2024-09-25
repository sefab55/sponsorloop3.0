<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Welkom bij SponsorYOU</title>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Welkom bij SponsorYOU</h1>
        </div>

        <div class="dropdown">
            <button class="dropdown-toggle" id="userMenuButton">
                {{ Auth::user()->name }} <span>&#9662;</span> <!-- Toon de naam van de ingelogde gebruiker -->
            </button>
            <div class="dropdown-menu" aria-labelledby="userMenuButton">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Log Out</button>
                </form>
            </div>
        </div>

        <div class="info-section">
            <p>Met deze applicatie kan je inschrijven voor een sponserloop. <br>
               door op de knop inschijven voor Sponserloop kan je je inschijven voor een bestaande sponserloop.<br>
               met registreer afstand kan je je gelopen afstand regristreren en bij bekijk overzicht kan je je overzicht zien.</p>
        </div>

        <div class="button-container">
            <a href="{{ route('sponsorloop.inschrijven') }}" class="dashboard-button">Inschrijven voor Sponsorloop</a>
            
            <!-- Alleen tonen als de gebruiker admin is -->
            @if(Auth::user()->isAdmin()) <!-- Controle op admin-rechten -->
                <a href="{{ route('sponsorloop.createSponsorloop') }}" class="dashboard-button">Creëer een Sponsorloop</a>
            @endif

            <a href="{{ route('resultaat.register') }}" class="dashboard-button">Registreer Afstand</a>
            <a href="{{ route('resultaat.overzicht') }}" class="dashboard-button">Bekijk Overzicht</a>
        </div>

        <!-- Sponsorloop Informatie -->
        <div class="sponsorloop-info-container">
            <h2>Actuele sponserlopen</h2>
            <div class="sponsorloop-blokjes">
                @foreach($sponsorlopen as $sponsorloop)
                    <div class="sponsorloop-kaart">
                        <h3>{{ $sponsorloop->naam }}</h3>
                        <p>Afstand per rondje: {{ $sponsorloop->afstand }} km</p>
                        <p>Bedrag per rondje: €{{ number_format($sponsorloop->standaardBedrag, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</body>
</html>
