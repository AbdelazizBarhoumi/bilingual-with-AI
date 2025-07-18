<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="UTF-8">
    <title>{{ $locale === 'en' ? 'Evaluation Results' : 'Résultats de l\'évaluation' }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #1e40af; }
        .highlight { background-color: #fefcbf; padding: 5px; }
    </style>
</head>
<body>
    <h1>{{ $locale === 'en' ? 'AI Evaluation Results' : 'Résultats de l\'évaluation IA' }}</h1>
    <p class="highlight">{{ $data }}</p>
</body>
</html>