<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
        <h1>Connexion</h1>

        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>

            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">Se connecter</button>
        </form>

        <p>Pas encore inscrit ? <a href="{{ route('register.form') }}">Créer un compte</a></p>
    </div>
</body>
</html>
