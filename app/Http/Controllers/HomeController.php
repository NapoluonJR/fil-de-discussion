<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user();  // Récupère l'utilisateur connecté
            return view('home', compact('user'));  // Passe l'utilisateur à la vue
        }
    
        // Si l'utilisateur n'est pas connecté, rediriger vers la page de login
        return redirect('/login');
    }
    
}    