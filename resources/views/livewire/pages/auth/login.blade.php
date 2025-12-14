<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // Redirect berdasarkan role user
        $user = auth()->user();
        if ($user->role === 'admin') {
            $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: true);
        } else {
            $this->redirectIntended(default: route('candidate', absolute: false), navigate: true);
        }
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- NIS -->
        <div>
            <x-input-label for="nis" :value="__('NIS')" />
            <x-text-input wire:model="form.nis" id="nis" class="block mt-1 w-full" type="text" name="nis" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.nis')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
