<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Canaux</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="site-header">
    <div class="header-content">
        <a href="{{ url('/') }}">Accueil</a>
        <a href="{{ route('login.form') }}">Connexion</a>
        <a href="{{ route('register.form') }}">Inscription</a>
    </div>
</header>
    <div class="container">
        <h1>Liste des canaux</h1>
        <ul>
            @foreach ($channels as $channel)
                <li>
                    <a href="{{ route('channels.show', $channel->id) }}">{{ $channel->name }}</a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('channels.create') }}">Créer un canal</a>
    </div>
</body>
</html>
