<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Mise à jour du mot de passe')" :subheading="__('Assurez-vous d’utiliser un mot de passe long et sécurisé pour protéger votre compte.')">

        <form wire:submit.prevent="updatePassword" class="mt-6 space-y-6">

            <!-- Mot de passe actuel -->
            <flux:input wire:model="current_password" :label="__('Mot de passe actuel')" type="password" required
                autocomplete="current-password" />

            <!-- Nouveau mot de passe -->
            <flux:input wire:model="password" :label="__('Nouveau mot de passe')" type="password" required
                autocomplete="new-password" />

            <!-- Confirmation du mot de passe -->
            <flux:input wire:model="password_confirmation" :label="__('Confirmer le nouveau mot de passe')"
                type="password" required autocomplete="new-password" />

            <!-- Boutons d'action -->
            <div class="flex items-center gap-4">
                <flux:button variant="primary" type="submit" class="w-full">
                    {{ __('Mettre à jour') }}
                </flux:button>

                <x-action-message class="me-3" on="password-updated">
                    {{ __('Mot de passe mis à jour avec succès.') }}
                </x-action-message>
            </div>

        </form>
    </x-settings.layout>
</section>
