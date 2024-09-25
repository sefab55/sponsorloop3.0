<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak hier een account aan</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

<div class="container">
    <div class="form-section">
        <h2>Maak hier een account aan</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <input type="text" name="name" placeholder="Naam" required autofocus>

            <!-- Voornaam -->
            <input type="text" name="voornaam" placeholder="Voornaam" required>

            <!-- Achternaam -->
            <input type="text" name="achternaam" placeholder="Achternaam" required>

            <!-- Email Address -->
            <input type="email" name="email" placeholder="E-mail" required>

            <!-- Adres -->
            <input type="text" name="adres" placeholder="Adres" required>

            <!-- Postcode -->
            <input type="text" name="postcode" placeholder="Postcode" required>

            <!-- Telefoonnummer -->
            <input type="text" name="telefoonnummer" placeholder="Telefoonnummer" required>

            <!-- Rol kiezen -->
            <div class="mt-4">
                <x-input-label for="rol" :value="__('Kies een rol')" />
                <select id="rol" name="rol" class="block mt-1 w-full" required>
                    @foreach(App\Models\Role::where('naam', '!=', 'admin')->get() as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->naam }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('rol')" class="mt-2" />
            </div>

            <!-- Password -->
            <input type="password" name="password" placeholder="Wachtwoord" required>

            <!-- Confirm Password -->
            <input type="password" name="password_confirmation" placeholder="Bevestig Wachtwoord" required>

            <div class="form-buttons">
                <button type="submit" class="register-button">Register</button>
                <a href="{{ route('welcome') }}" class="login-link">Already registered?</a>
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
