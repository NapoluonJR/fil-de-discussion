<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Canal : {{ $channel->name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <h1>Canal : {{ $channel->name }}</h1>
        <p>Utilisateur connecté : {{ Auth::user()->name }}</p>

        <div id="messages">
            @foreach ($channel->messages as $message)
                <div class="{{ $message->user_id == auth()->id() ? 'mine' : 'other' }}">
                    <strong>
                        {{ $message->user->name }}
                        <span style="background: {{ $message->user->role === 'admin' ? '#d9534f' : '#5bc0de' }}; color: white; padding: 2px 6px; border-radius: 5px; font-size: 0.8em;">
                            {{ ucfirst($message->user->role) }}
                        </span>
                        :
                    </strong>
                    <p>{{ $message->content }}</p>
                </div>
            @endforeach
        </div>

        <form id="messageForm" action="{{ route('messages.store', $channel->id) }}" method="POST">
            @csrf
            <textarea name="content" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $('#messageForm').on('submit', function(e) {
            e.preventDefault();

            var content = $('textarea[name="content"]').val();
            var channelId = {{ $channel->id }};
            var url = '/channels/' + channelId + '/messages';

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    content: content,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('textarea[name="content"]').val('');
                    fetchMessages();
                },
                error: function() {
                    alert('Une erreur est survenue');
                }
            });
        });

        function fetchMessages() {
            var channelId = {{ $channel->id }};
            $.ajax({
                url: '/channels/' + channelId + '/messages',
                method: 'GET',
                success: function(messages) {
                    let html = '';
                    messages.forEach(function(message) {
                        html += `
                            <div class="${message.user_id == {{ auth()->id() }} ? 'mine' : 'other'}">
                                <strong>
                                    ${message.user.name}
                                    <span style="background: ${message.user.role === 'admin' ? '#d9534f' : '#5bc0de'}; color: white; padding: 2px 6px; border-radius: 5px; font-size: 0.8em;">
                                        ${message.user.role.charAt(0).toUpperCase() + message.user.role.slice(1)}
                                    </span>
                                    :
                                </strong>
                                <p>${message.content}</p>
                            </div>
                        `;
                    });
                    $('#messages').html(html);
                }
            });
        }

        setInterval(fetchMessages, 2000);
        fetchMessages();
    });
    </script>
</body>
</html>
