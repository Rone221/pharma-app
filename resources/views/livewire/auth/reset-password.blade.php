<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Réinitialisation du mot de passe')" :description="__('Veuillez entrer votre nouveau mot de passe ci-dessous')" />

    <!-- Statut de la session -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="resetPassword" class="flex flex-col gap-6">
        <!-- Adresse e-mail -->
        <flux:input wire:model="email" :label="__('Adresse e-mail')" type="email" required autocomplete="email" />

        <!-- Nouveau mot de passe -->
        <flux:input wire:model="password" :label="__('Nouveau mot de passe')" type="password" required
            autocomplete="new-password" :placeholder="__('Nouveau mot de passe')" />

        <!-- Confirmer le mot de passe -->
        <flux:input wire:model="password_confirmation" :label="__('Confirmer le mot de passe')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirmez le mot de passe')" />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Réinitialiser le mot de passe') }}
            </flux:button>
        </div>
    </form>
</div>
