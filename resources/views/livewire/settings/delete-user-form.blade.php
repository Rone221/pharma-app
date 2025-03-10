<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('Supprimer mon compte') }}</flux:heading>
        <flux:subheading>{{ __('Supprimez votre compte et toutes ses données de manière irréversible.') }}</flux:subheading>
    </div>

    <!-- Bouton de suppression du compte -->
    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('Supprimer mon compte') }}
        </flux:button>
    </flux:modal.trigger>

    <!-- Modal de confirmation -->
    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form wire:submit.prevent="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}</flux:heading>

                <flux:subheading>
                    {{ __('Une fois votre compte supprimé, toutes vos données seront définitivement effacées. Veuillez saisir votre mot de passe pour confirmer cette action irréversible.') }}
                </flux:subheading>
            </div>

            <!-- Champ de mot de passe -->
            <flux:input wire:model="password" :label="__('Mot de passe')" type="password" required />

            <!-- Boutons d'action -->
            <div class="flex justify-end space-x-2">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('Annuler') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit">
                    {{ __('Confirmer la suppression') }}
                </flux:button>
            </div>
        </form>
    </flux:modal>
</section>
