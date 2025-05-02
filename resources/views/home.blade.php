<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
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
        <h1>Bienvenue {{ $user->name }} !</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Se Déconnecter</button>
        </form>
        <a href="{{ route('channels.index') }}">Voir les canaux</a>
    </div>
</body>
</html>
