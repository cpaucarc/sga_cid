<x-guest-layout>
    <div class="w-full min-h-screen">
        <div class="w-4/5 md:w-2/4 lg:w-1/4 mx-auto py-8 lg:py-20 space-y-3">

            <x-jet-authentication-card-logo/>

            <h3 class="font-bold text-gray-4 text-center">Restablecer contraseña</h3>

            <x-jet-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                 :value="old('email', $request->email)" required autofocus/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('New Password') }}"/>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                 autocomplete="new-password"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                 name="password_confirmation" required autocomplete="new-password"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        {{ __('Reset Password') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
