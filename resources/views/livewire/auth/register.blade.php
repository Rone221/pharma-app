<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Créer un compte')" :description="__('Entrez vos informations ci-dessous pour créer votre compte')" />

    <!-- Statut de la session -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Prénom -->
        <flux:input wire:model="nom" :label="__('Prénom')" type="text" required autofocus autocomplete="given-name"
            :placeholder="__('Entrez votre prénom')" />

        <!-- Nom -->
        <flux:input wire:model="prenom" :label="__('Nom')" type="text" required autocomplete="family-name"
            :placeholder="__('Entrez votre nom')" />

        <!-- Adresse e-mail -->
        <flux:input wire:model="email" :label="__('Adresse e-mail')" type="email" required autocomplete="email"
            placeholder="exemple@email.com" />

        <!-- Numéro de téléphone -->
        <flux:input wire:model="tel" :label="__('Téléphone')" type="text" autocomplete="tel"
            :placeholder="__('Entrez votre numéro de téléphone')" />

        <!-- Mot de passe -->
        <flux:input wire:model="password" :label="__('Mot de passe')" type="password" required
            autocomplete="new-password" :placeholder="__('Mot de passe')" />

        <!-- Confirmer le mot de passe -->
        <flux:input wire:model="password_confirmation" :label="__('Confirmer le mot de passe')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirmez votre mot de passe')" />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Créer un compte') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Vous avez déjà un compte ?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Se connecter') }}</flux:link>
    </div>
</div>
