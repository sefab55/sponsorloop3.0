<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/inschrijven.css') }}">
    <title>Inschrijven</title>
</head>
<body>
    <div class="register-container">
        <div class="form-section">
            <h2>Schrijf je hier in!</h2>
            
            <!-- Formulier voor het selecteren van de sponsorloop -->
            <form method="GET" action="{{ route('sponsorloop.inschrijven') }}">
                <!-- Selecteer Sponsorloop -->
                <div class="input-group">
                    <x-input-label for="sponsorloop_id" :value="__('Kies een Sponsorloop')" />
                    <select id="sponsorloop_id" name="sponsorloop_id" onchange="this.form.submit()">
                        <option value="">Selecteer een sponsorloop</option>
                        @foreach($sponsorlopen as $sponsorloop)
                            <option value="{{ $sponsorloop->idSponsorloop }}" {{ (isset($selectedSponsorloop) && $selectedSponsorloop->idSponsorloop == $sponsorloop->idSponsorloop) ? 'selected' : '' }}>
                                {{ $sponsorloop->naam }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('sponsorloop_id')" class="mt-2" />
                </div>
            </form>

            <!-- Check of er een sponsorloop geselecteerd is voordat de inschrijfformulier verschijnt -->
            @if(isset($selectedSponsorloop))
            <!-- Formulier voor inschrijving -->
            <form method="POST" action="{{ route('sponsorloop.storeInschrijven') }}" enctype="multipart/form-data">
                @csrf
                <!-- Voeg de geselecteerde sponsorloop toe als verborgen invoer -->
                <input type="hidden" name="sponsorloop_id" value="{{ $selectedSponsorloop->idSponsorloop }}">

                <!-- Naam -->
                <div class="input-group">
                    <x-input-label for="naam" :value="__('Naam')" />
                    <x-text-input id="naam" type="text" name="naam" value="{{ Auth::user()->name }}" readonly />
                    <x-input-error :messages="$errors->get('naam')" class="mt-2" />
                </div>

                <!-- Locatie -->
                <div class="input-group">
                    <x-input-label for="locatie" :value="__('Locatie')" />
                    <x-text-input id="locatie" type="text" name="locatie" value="{{ $selectedSponsorloop->locatie }}" readonly />
                    <x-input-error :messages="$errors->get('locatie')" class="mt-2" />
                </div>

                <!-- Datum -->
                <div class="input-group">
                    <x-input-label for="datum" :value="__('Datum')" />
                    <x-text-input id="datum" type="date" name="datum" value="{{ \Carbon\Carbon::parse($selectedSponsorloop->datum)->format('Y-m-d') }}" readonly />
                    <x-input-error :messages="$errors->get('datum')" class="mt-2" />
                </div>
                
                <!-- Gewenste Afstand -->
                <div class="input-group">
                    <x-input-label for="gekozenAfstand" :value="__('Gewenste Afstand (km)')" />
                    <x-text-input id="gekozenAfstand" type="number" step="0.1" name="gekozenAfstand" required />
                    <x-input-error :messages="$errors->get('gekozenAfstand')" class="mt-2" />
                </div>


                <!-- Inschrijven Button -->
                <div class="input-group">
                    <x-primary-button class="register-button">
                        {{ __('Inschrijven') }}
                    </x-primary-button>
                </div>
            </form>
            @endif
        </div>

        <div class="info-section">
            <h2>Welkom op SPONSORYOU</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
</body>
</html>
