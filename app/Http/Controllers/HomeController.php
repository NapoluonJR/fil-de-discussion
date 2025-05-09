<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Models\User;
use App\Mail\ContactMessageReceived;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('home', compact('user'));
        }

        return redirect('/login');
    }

    // Affiche le formulaire de contact
    public function showContactForm()
    {
        return view('contact');
    }

    // Traite l'envoi du formulaire de contact
    public function submitContactForm(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Vérifie si l'email est enregistré
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Cette adresse email n’est pas enregistrée.'])->withInput();
        }

        // Enregistrement du message avec le nom inclus
        ContactMessage::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Envoi du mail à l'adresse fixe
        Mail::to('NapoluonJR@gmail.com')->send(new ContactMessageReceived($validated));

        return redirect()->back()->with('success', 'Votre message a bien été envoyé.');
    }
}
