<div class="flex flex-col items-start">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading="__('Mettre à jour les paramètres d\'apparence de votre compte
        
        ')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('Clair') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('Sombre') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('Systeme') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</div>
