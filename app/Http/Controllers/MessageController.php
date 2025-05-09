<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Channel;

class MessageController extends Controller
{
    public function store(Request $request, $channelId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
    
        $channel = Channel::findOrFail($channelId);
    
        $message = new Message();
        $message->content = $request->content;
        $message->user_id = auth()->id(); // ← IMPORTANT
        $message->channel_id = $channel->id;
        $message->save();
    
        // Optionnel : retourner les messages mis à jour
        return response()->json([
            'user_name' => $message->user->name,
            'content' => $message->content,
        ]);
    }
    public function fetch(Channel $channel)
{
    return response()->json($channel->messages()->with('user')->get());
}
public function destroy($messageId)
{
    $message = Message::findOrFail($messageId);

    // Vérification du rôle de l'utilisateur
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Accès non autorisé');
    }

    $message->delete();

    return redirect()->route('channels.show', $message->channel_id);
}

}
