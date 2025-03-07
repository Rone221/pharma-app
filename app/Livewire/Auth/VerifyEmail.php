<?php

namespace App\Livewire\Auth;

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class VerifyEmail extends Component
{
    /**
     * Envoyer une notification de vérification d'e-mail à l'utilisateur.
     */
    // public function sendVerification(): void
    // {
    //     if (Auth::user()->hasVerifiedEmail()) {
    //         $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

    //         return;
    //     }

    //     Auth::user()->sendEmailVerificationNotification();

    //     Session::flash('status', 'lien-de-verification-envoye');
    // }

    /**
     * Déconnecter l'utilisateur actuel de l'application.
     */
    // public function logout(Logout $logout): void
    // {
    //     $logout();

    //     $this->redirect('/', navigate: true);
    // }
}
