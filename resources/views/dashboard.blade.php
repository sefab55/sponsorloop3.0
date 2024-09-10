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
            <p>uitleg over de applicatie</p>
        </div>

        <div class="button-container">
            <a href="{{ route('sponsorloop.inschrijven') }}" class="dashboard-button">Inschrijven voor Sponsorloop</a>
            <a href="{{ route('sponsorloop.createSponsorloop') }}" class="dashboard-button">Creëer een Sponsorloop</a>
            <a href="{{ route('resultaat.register') }}" class="dashboard-button">Registreer Afstand</a>
            <a href="{{ route('resultaat.overzicht') }}" class="dashboard-button">Bekijk Overzicht</a>
        </div>
    </div>
</body>
</html>
