<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

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
}
