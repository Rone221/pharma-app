<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Mot de passe oublié')" :description="__('Entrez votre adresse e-mail pour recevoir un lien de réinitialisation')" />

    <!-- Statut de la session -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Adresse e-mail -->
        <flux:input wire:model="email" :label="__('Adresse e-mail')" type="email" required autofocus
            placeholder="exemple@email.com" />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Envoyer le lien de réinitialisation') }}
        </flux:button>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-400">
        {{ __('Ou, retourner à') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('la connexion') }}</flux:link>
    </div>
</div>
