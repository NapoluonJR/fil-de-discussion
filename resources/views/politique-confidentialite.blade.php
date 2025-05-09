<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Politique de confidentialité</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<header class="site-header">
    <nav class="header-content">
        <a href="{{ url('/') }}">Accueil</a>
        <a href="{{ route('login.form') }}">Connexion</a>
        <a href="{{ route('register.form') }}">Inscription</a>
    </nav>
</header>

    <div class="container">
        <h1>Politique de confidentialité</h1>
        <section>
            <h2>1. Introduction</h2>
            <p>Nous respectons votre vie privée et nous nous engageons à protéger vos données personnelles. Cette politique explique comment nous recueillons, utilisons et protégeons vos informations lorsque vous utilisez notre site.</p>

            <h2>2. Collecte des informations</h2>
            <p>Nous collectons les informations suivantes :</p>
            <ul>
                <li>Nom</li>
                <li>Adresse email</li>
                <li>Informations de connexion</li>
            </ul>

            <h2>3. Utilisation des informations</h2>
            <p>Les informations collectées sont utilisées pour :</p>
            <ul>
                <li>Créer et gérer votre compte utilisateur.</li>
                <li>Vous envoyer des informations relatives à votre compte.</li>
                <li>Améliorer notre service.</li>
            </ul>

            <h2>4. Partage des informations</h2>
            <p>Nous ne partageons vos informations personnelles avec des tiers que dans les cas suivants :</p>
            <ul>
                <li>Si la loi nous y oblige.</li>
                <li>Pour protéger nos droits ou notre sécurité.</li>
            </ul>

            <h2>5. Sécurité</h2>
            <p>Nous mettons en œuvre des mesures de sécurité pour protéger vos informations personnelles contre tout accès non autorisé, toute modification, divulgation ou destruction.</p>

            <h2>6. Vos droits</h2>
            <p>Vous avez le droit d'accéder, de corriger ou de supprimer vos données personnelles. Si vous souhaitez exercer l'un de ces droits, contactez-nous à l'adresse suivante : <strong>contact@monsite.com</strong>.</p>

            <h2>7. Modifications de cette politique</h2>
            <p>Nous nous réservons le droit de modifier cette politique de confidentialité. Toute modification sera publiée sur cette page.</p>

            <h2>8. Contact</h2>
            <p>Si vous avez des questions concernant cette politique de confidentialité, veuillez nous contacter à l'adresse suivante : <strong>contact@monsite.com</strong>.</p>
        </section>
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
