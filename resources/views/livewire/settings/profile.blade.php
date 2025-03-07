<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit.prevent="updateProfileInformation" class="my-6 w-full space-y-6">
            
            <!-- Nom -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Name') }}
                </label>
                <input type="text" wire:model="name" id="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
                    required autofocus autocomplete="name">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Email') }}
                </label>
                <input type="email" wire:model="email" id="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white"
                    required autocomplete="email">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                <!-- Vérification d'email -->
                @if (auth()->check() && auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                    <div class="mt-4">
                        <p class="text-sm text-yellow-600 dark:text-yellow-400">
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <button type="button" wire:click.prevent="resendVerificationNotification"
                            class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md">
                        {{ __('Save') }}
                    </button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
