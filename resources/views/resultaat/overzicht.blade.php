<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Resultaten</title>
    <link rel="stylesheet" href="{{ asset('css/overzicht.css') }}">
</head>
<body>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        Mijn Resultaten
    </h2>

    <div class="results-grid">
        @foreach ($resultaten as $resultaat)
            <div class="result-card">
                <h3 class="font-bold text-lg">Sponsorloop: {{ $resultaat->sponsorloop->naam }}</h3>
                <p>Afgelegde Afstand: {{ $resultaat->afgelegdeAfstand }}</p>
                <p>Aantal Rondjes: {{ floor((float)filter_var($resultaat->afgelegdeAfstand, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) / (float)filter_var($resultaat->sponsorloop->afstand, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)) }}</p>
                <p>Opgehaalde Bedrag: €{{ number_format($resultaat->opgehaaldeBedrag, 2) }}</p>
            </div>
        @endforeach
    </div>
    <div class="button-group">
                    <a href="{{ route('dashboard') }}" class="btn-back">
                        Terug naar Dashboard
                    </a>
</body>
</html>
