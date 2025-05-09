<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Canal : {{ $channel->name }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<div class="container" style="flex: 1;">
    <h1>Canal : {{ $channel->name }}</h1>
    <p>Utilisateur connecté : {{ Auth::user()->name }}</p>

    @if (Auth::user()->role === 'admin')
        <form action="{{ route('channels.destroy', $channel->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression du canal ?');" style="margin-bottom: 20px;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color: #d9534f; color: white; padding: 5px 10px; border: none; border-radius: 5px;">
                Supprimer ce canal
            </button>
        </form>
    @endif

    <div id="messages">
        @foreach ($channel->messages as $message)
            <div class="{{ $message->user_id == auth()->id() ? 'mine' : 'other' }}">
                <strong>
                    {{ $message->user ? $message->user->name : 'Utilisateur supprimé' }}
                    <span style="background: {{ $message->user && $message->user->role === 'admin' ? '#d9534f' : '#5bc0de' }}; color: white; padding: 2px 6px; border-radius: 5px; font-size: 0.8em;">
                        {{ $message->user ? ucfirst($message->user->role) : 'Inconnu' }}
                    </span> :
                </strong>
                <p>{{ $message->content }}</p>

                @if (Auth::user()->role === 'admin')
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; color: #d9534f; font-size: 1.2em; cursor: pointer; padding-left: 10px;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <form id="messageForm" action="{{ route('messages.store', $channel->id) }}" method="POST">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
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

<script>
$(document).ready(function() {
    const csrf = $('meta[name="csrf-token"]').attr('content');
    const userId = {{ auth()->id() }};
    const userRole = '{{ auth()->user()->role }}';
    const isAdmin = userRole === 'admin';

    $('#messageForm').on('submit', function(e) {
        e.preventDefault();

        const content = $('textarea[name="content"]').val();
        const channelId = {{ $channel->id }};

        $.ajax({
            url: '/channels/' + channelId + '/messages',
            method: 'POST',
            data: {
                content: content,
                _token: csrf
            },
            success: function() {
                $('textarea[name="content"]').val(''); 
                fetchMessages();
            },
            error: function() {
                alert('Une erreur est survenue');
            }
        });
    });

    function fetchMessages() {
        const channelId = {{ $channel->id }};
        $.ajax({
            url: '/channels/' + channelId + '/messages',
            method: 'GET',
            success: function(messages) {
                let html = '';
                messages.forEach(function(message) {
                    html += `
                        <div class="${message.user_id == userId ? 'mine' : 'other'}">
                            <strong>
                                ${message.user ? message.user.name : 'Utilisateur supprimé'}
                                <span style="background: ${message.user && message.user.role === 'admin' ? '#d9534f' : '#5bc0de'}; color: white; padding: 2px 6px; border-radius: 5px; font-size: 0.8em;">
                                    ${message.user ? message.user.role.charAt(0).toUpperCase() + message.user.role.slice(1) : 'Inconnu'}
                                </span> :
                            </strong>
                            <p>${message.content}</p>
                    `;

                    if (isAdmin) {
                        html += `
                            <form action="/messages/${message.id}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                                <input type="hidden" name="_token" value="${csrf}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" style="background: none; border: none; color: #d9534f; font-size: 1.2em; cursor: pointer; padding-left: 10px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        `;
                    }

                    html += `</div>`;
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

