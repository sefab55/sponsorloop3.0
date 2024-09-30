<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Sponsorloop</title>
</head>
<body>
    <h1>Overzicht van Sponsorloop: {{ $sponsorloop->naam }}</h1>

    <h2>Resultaten:</h2>
    <ul>
        @foreach ($resultaten as $resultaat)
            <li>
                Loper: {{ $resultaat->loperNaam }} <br>
                Sponsor: {{ $resultaat->sponsorNaam }} <br>
                Afgelegde Afstand: {{ $resultaat->gekozenAfstand }} km <br>
            </li>
        @endforeach
    </ul>
</body>
</html>
