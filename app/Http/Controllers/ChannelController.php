<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = Channel::all();
        return view('channels.index', compact('channels'));
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:channels|max:255',
        ]);

        Channel::create([
            'name' => $request->name
        ]);

        return redirect()->route('channels.index');
    }

    public function show($id)
    {
        $channel = Channel::with('messages.user')->findOrFail($id);
        return view('channels.show', compact('channel'));
    }

    public function destroy($id)
    {
        // Vérifie si l'utilisateur est un admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Action non autorisée.');
        }

        $channel = Channel::findOrFail($id);
        $channel->delete();

        return redirect()->route('channels.index')->with('success', 'Canal supprimé avec succès.');
    }
}

