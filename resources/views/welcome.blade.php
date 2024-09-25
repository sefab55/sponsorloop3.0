<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welkom op SPONSORYOU</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

<div class="container">
    <div class="login-section">
        <h2>Log hier in met uw account!</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Emailadres" required autofocus>
            <input type="password" name="password" placeholder="Wachtwoord" required>
            <div class="form-options">
                <label class="onthoud">
                    <input type="checkbox" name="remember"> Onthoud mij
                </label>
                <a href="{{ route('password.request') }}" class="forgot-password">Wachtwoord vergeten?</a>
            </div>
            <div class="form-buttons">
                <a href="{{ route('register') }}" class="register-button">Registreer hier</a>
                <button type="submit" class="login-button">Inloggen</button>
            </div>
        </form>
    </div>

    <div class="right-section">
        <h2>Welkom op SPONSORYOU</h2>
        <p></p>
    </div>
</div>

</body>
</html>
