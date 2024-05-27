<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- Ganti logo dengan logo kustom Anda -->
            <div class="flex justify-center">
                <img src="{{ asset('img/gambar-header.png') }}" alt="Logo" class="w-20 h-20">
            </div>
        </x-slot>

        <!-- Teks "Log In" di atas form email -->
        <div class="text-center text-2xl font-semibold mb-6">
            {{ __('Log In') }}
        </div>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <x-label for="email" value="{{ __('Email') }}" />
                <div class="relative">
                    <x-input id="email" class="block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884l7.071 4.242a1 1 0 001.073 0l7.071-4.242A1 1 0 0017.5 5H2.5a1 1 0 00-.497.884z" />
                            <path d="M18 8.5a1 1 0 01-.553.894l-7.071 4.242a2 2 0 01-2.214 0L1.111 9.394A1 1 0 011 8.5v5.382a2 2 0 001.217 1.853l7.071 4.242a4 4 0 004.424 0l7.071-4.242A2 2 0 0019 13.882V8.5a1 1 0 01.5-.894l.5.294z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="space-y-2 mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <div class="relative">
                    <x-input id="password" class="block mt-1 w-full pl-10" type="password" name="password" required autocomplete="current-password" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a2 2 0 110-4 2 2 0 010 4zM4 9a6 6 0 1112 0v4a2 2 0 002 2h2a1 1 0 010 2h-2a4 4 0 01-8 0H4a4 4 0 01-8 0H2a1 1 0 010-2h2a2 2 0 002-2V9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                <div>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('register'))
                    <p class="text-sm text-gray-600">
                        {{ __("Don't have an account?") }}
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Create one') }}
                        </a>
                    </p>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
