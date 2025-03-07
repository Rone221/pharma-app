<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Connexion à votre compte')" :description="__('Entrez votre adresse e-mail et votre mot de passe ci-dessous pour vous connecter')" />

    <!-- Statut de la session -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Adresse e-mail -->
        <flux:input wire:model="email" :label="__('Adresse e-mail')" type="email" required autofocus autocomplete="email"
            placeholder="exemple@email.com" />

        <!-- Mot de passe -->
        <div class="relative">
            <flux:input wire:model="password" :label="__('Mot de passe')" type="password" required
                autocomplete="current-password" :placeholder="__('Mot de passe')" />

            @if (Route::has('password.request'))
                <flux:link class="absolute right-0 top-0 text-sm" :href="route('password.request')" wire:navigate>
                    {{ __('Mot de passe oublié ?') }}
                </flux:link>
            @endif
        </div>

        <!-- Se souvenir de moi -->
        <flux:checkbox wire:model="remember" :label="__('Se souvenir de moi')" />

        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('Se connecter') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('Vous n\'avez pas encore de compte ?') }}
            <flux:link :href="route('register')" wire:navigate>{{ __('Créer un compte') }}</flux:link>
        </div>
    @endif
</div>
