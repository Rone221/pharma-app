<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Confirmer le mot de passe')" :description="__(
        'Ceci est une zone sécurisée de l’application. Veuillez confirmer votre mot de passe avant de continuer.',
    )" />

    <!-- Statut de la session -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="confirmPassword" class="flex flex-col gap-6">
        <!-- Mot de passe -->
        <flux:input wire:model="password" :label="__('Mot de passe')" type="password" required
            autocomplete="current-password" :placeholder="__('Mot de passe')" />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Confirmer') }}</flux:button>
    </form>
</div>
