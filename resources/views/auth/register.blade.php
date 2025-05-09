<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
        <h1>Inscription</h1>

        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required autofocus>
            </div>

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmation mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>

        <p>Déjà inscrit ? <a href="{{ route('login.form') }}">Se connecter</a></p>
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


