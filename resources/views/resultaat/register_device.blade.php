<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreer Afstand</title>
    <link rel="stylesheet" href="{{ asset('css/invoer.css') }}">
</head>
<body>
    <div class="register-container">
        <div class="form-section">
            <h2>Registreer Afstand</h2>
            <form method="POST" action="{{ route('resultaat.registerDevice') }}">
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

                <!-- Afgelegde Afstand -->
                <div class="input-group">
                    <x-input-label for="afgelegdeAfstand" :value="__('Afgelegde Afstand (bijv. 5 km)')" />
                    <x-text-input id="afgelegdeAfstand" type="text" name="afgelegdeAfstand" required />
                    <x-input-error :messages="$errors->get('afgelegdeAfstand')" class="mt-2" />
                </div>

                <!-- Buttons Section -->
                <div class="button-group">
                    <a href="{{ route('dashboard') }}" class="btn-back">
                        Terug naar Dashboard
                    </a>
                    <x-primary-button class="register-button">
                        {{ __('Registreer') }}
                    </x-primary-button>
                </div>
    </body>
    </html>