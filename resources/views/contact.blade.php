<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
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
        <h1>Contact</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div style="color: red;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}">
            @csrf
            <div>
                <label for="name">Nom :</label><br>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email">Email :</label><br>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="subject">Sujet :</label><br>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
            </div>

            <div>
                <label for="message">Message :</label><br>
                <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </div>
    
<footer class="site-footer">
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

