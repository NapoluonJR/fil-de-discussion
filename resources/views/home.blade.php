<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

<footer class="footer">
        <a href="{{ route('mentions') }}">
            <i class="fas fa-gavel"></i> Mentions légales
        </a>
        <a href="{{ route('confidentialite') }}">
            <i class="fas fa-user-secret"></i> Politique de confidentialité
        </a>
        <a href="{{ route('contact.form') }}">
            <i class="fas fa-envelope"></i> Contact
        </a>
        <p>© {{ date('Y') }} NapoluonChat — Réalisé dans le cadre du BTS SIO SLAM</p>
</footer>

</body>
</html>
