<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $nom = '';
    public string $prenom = '';
    public string $email = '';
    public string $tel = '';
    public string $adresse = '';
    public string $profil = 'admin'; // Valeur par défaut
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'tel' => ['nullable', 'string', 'max:20'],
            'adresse' => ['nullable', 'string', 'max:255'],
            'profil' => ['required', 'string', 'in:utilisateur,admin,pharmacien'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Hacher le mot de passe
        $validated['password'] = Hash::make($validated['password']);

        // Création de l'utilisateur
        $user = User::create($validated);

        // 🔥 Assignation automatique du rôle pharmacien
        $user->assignRole('admin');

        // Déclencher l'événement d'inscription
        event(new Registered($user));

        // Connexion automatique après l'inscription
        Auth::login($user);

        // Redirection vers le tableau de bord
        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
