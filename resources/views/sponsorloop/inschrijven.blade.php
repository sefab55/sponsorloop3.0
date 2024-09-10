<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/inschrijven.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="register-container">
        <div class="form-section">
            <h2>Schrijf je hier in!</h2>
            <form method="POST" action="{{ route('sponsorloop.storeInschrijven') }}" enctype="multipart/form-data">
                @csrf

                <!-- Selecteer Sponsorloop -->
                <div class="input-group">
                    <x-input-label for="sponsorloop_id" :value="__('Kies een Sponsorloop')" />
                    <select id="sponsorloop_id" name="sponsorloop_id" required>
                        <option value="">Selecteer een sponsorloop</option>
                        @foreach($sponsorlopen as $sponsorloop)
                            <option value="{{ $sponsorloop->idSponsorloop }}">{{ $sponsorloop->naam }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('sponsorloop_id')" class="mt-2" />
                </div>

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


                <!-- Foto -->
                <div class="input-group">
                    <x-input-label for="foto" :value="__('Foto')" />
                    <input id="foto" type="file" name="foto" accept="image/*" />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>

                <!-- Inschrijven Button -->
                <div class="input-group">
                    <x-primary-button class="register-button">
                        {{ __('Inschrijven') }}
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
