<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/inschrijven.css') }}">
    <title>Creëer Sponsorloop</title>
</head>
<body>
    <div class="register-container">
        <div class="form-section">
            <h2>Creëer een Sponsorloop</h2>
            <form method="POST" action="{{ route('sponsorloop.storeSponsorloop') }}" enctype="multipart/form-data">
                @csrf

                <!-- Naam -->
                <div class="input-group">
                    <x-input-label for="naam" :value="__('Naam')" />
                    <x-text-input id="naam" type="text" name="naam" :value="old('naam')" required autofocus />
                    <x-input-error :messages="$errors->get('naam')" class="mt-2" />
                </div>

                <!-- Locatie -->
                <div class="input-group">
                    <x-input-label for="locatie" :value="__('Locatie')" />
                    <x-text-input id="locatie" type="text" name="locatie" :value="old('locatie')" required />
                    <x-input-error :messages="$errors->get('locatie')" class="mt-2" />
                </div>

                <!-- Standaard Bedrag -->
                <div class="input-group">
                    <x-input-label for="standaardBedrag" :value="__('Standaard Bedrag')" />
                    <x-text-input id="standaardBedrag" type="number" step="0.01" name="standaardBedrag" :value="old('standaardBedrag')" required />
                    <x-input-error :messages="$errors->get('standaardBedrag')" class="mt-2" />
                </div>

                <!-- Afstand -->
                <div class="input-group">
                    <x-input-label for="afstand" :value="__('Afstand')" />
                    <x-text-input id="afstand" type="text" name="afstand" :value="old('afstand')" required />
                    <x-input-error :messages="$errors->get('afstand')" class="mt-2" />
                </div>

                <!-- Beschrijving -->
                <div class="input-group">
                    <x-input-label for="beschrijving" :value="__('Beschrijving')" />
                    <textarea id="beschrijving" name="beschrijving" rows="4">{{ old('beschrijving') }}</textarea>
                    <x-input-error :messages="$errors->get('beschrijving')" class="mt-2" />
                </div>

                <!-- Datum -->
                <div class="input-group">
                    <x-input-label for="datum" :value="__('Datum')" />
                    <x-text-input id="datum" type="date" name="datum" :value="old('datum')" required />
                    <x-input-error :messages="$errors->get('datum')" class="mt-2" />
                </div>

                <!-- Route -->
                <div class="input-group">
                    <x-input-label for="route" :value="__('Route')" />
                    <x-text-input id="route" type="text" name="route" :value="old('route')" />
                    <x-input-error :messages="$errors->get('route')" class="mt-2" />
                </div>

                <!-- Foto -->
                <div class="input-group">
                    <x-input-label for="foto" :value="__('Foto')" />
                    <input id="foto" type="file" name="foto" accept="image/*" />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>

                <!-- Organisatie ID -->
                <div class="input-group">
                    <x-input-label for="Organisatie_idOrganisatie" :value="__('Organisatie ID')" />
                    <x-text-input id="Organisatie_idOrganisatie" type="number" name="Organisatie_idOrganisatie" :value="old('Organisatie_idOrganisatie')" required />
                    <x-input-error :messages="$errors->get('Organisatie_idOrganisatie')" class="mt-2" />
                </div>

                <!-- Doel ID -->
                <div class="input-group">
                    <x-input-label for="Doel_idDoel" :value="__('Doel ID')" />
                    <x-text-input id="Doel_idDoel" type="number" name="Doel_idDoel" :value="old('Doel_idDoel')" required />
                    <x-input-error :messages="$errors->get('Doel_idDoel')" class="mt-2" />
                </div>

                <!-- Creëer Button -->
                <div class="input-group">
                    <x-primary-button class="register-button">
                        {{ __('Creëer Sponsorloop') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <div class="info-section">
            <h2>Welkom op SPONSORYOU</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
</body>
</html>
