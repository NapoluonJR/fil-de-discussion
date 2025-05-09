<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mentions légales</title>
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
        <h1>Mentions légales</h1>
        <section>
            <h2>1. Éditeur du site</h2>
            <p>Le site <strong>Nom du site</strong> est édité par :</p>
            <ul>
                <li><strong>Nom de l'éditeur</strong></li>
                <li><strong>Adresse</strong></li>
                <li><strong>Email</strong></li>
            </ul>

            <h2>2. Hébergement</h2>
            <p>Le site est hébergé par :</p>
            <ul>
                <li><strong>Nom de l'hébergeur</strong></li>
                <li><strong>Adresse de l'hébergeur</strong></li>
                <li><strong>Contact</strong></li>
            </ul>

            <h2>3. Propriété intellectuelle</h2>
            <p>Le contenu du site (textes, images, logos, etc.) est la propriété de l'éditeur du site, sauf mention contraire.</p>

            <h2>4. Loi applicable</h2>
            <p>Le site est soumis à la législation française. Tout litige sera porté devant les juridictions compétentes en France.</p>
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
        <p>© {{ date('Y') }} NapoluonChat — Tous droits réservés</p>
</footer>

</body>
</html>
