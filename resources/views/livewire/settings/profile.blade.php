<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profil')" :subheading="__('Mettez à jour vos informations personnelles')">
        <form wire:submit.prevent="updateProfileInformation" class="my-6 w-full space-y-6">

            <!-- Nom -->
            <flux:input wire:model="nom" :label="__('Nom')" type="text" required autofocus
                autocomplete="family-name" />

            <!-- Prénom -->
            <flux:input wire:model="prenom" :label="__('Prénom')" type="text" required autocomplete="given-name" />

            <!-- Email -->
            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                    <div class="mt-4">
                        <flux:text>
                            {{ __('Votre adresse e-mail n’est pas vérifiée.') }}
                            <flux:link class="text-sm cursor-pointer"
                                wire:click.prevent="resendVerificationNotification">
                                {{ __('Cliquez ici pour renvoyer l’e-mail de vérification.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Numéro de téléphone -->
            <flux:input wire:model="tel" :label="__('Numéro de téléphone')" type="tel" required
                autocomplete="tel" />

            <!-- Boutons d'action -->
            <div class="flex items-center gap-4">
                <flux:button variant="primary" type="submit" class="w-full">
                    {{ __('Enregistrer') }}
                </flux:button>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Enregistré.') }}
                </x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
