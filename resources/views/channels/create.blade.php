<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un canal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Créer un nouveau canal</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('channels.store') }}">
            @csrf
            <label for="name">Nom du canal :</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            <button type="submit">Créer</button>
        </form>

        <a href="{{ route('channels.index') }}">Retour à la liste</a>
    </div>
</body>
</html>
