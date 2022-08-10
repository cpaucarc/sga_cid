<x-guest-layout>

    <div class="grid grid-cols-5">

        <div class="col-span-3 bg-blue-4 min-h-screen">
            {{-- Imagenes del CID --}}
        </div>

        <div class="col-span-2 bg-white min-h-screen">

            <div class="w-2/3 mx-auto mt-24 gap-y-3 flex flex-col justify-center">
                <x-jet-authentication-card-logo/>

                <x-jet-validation-errors class="mb-4"/>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-3">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Username') }}"/>
                        <x-jet-input id="email" class="block mt-1 w-full" type="text" name="identity"
                                     :value="old('email')"
                                     required autofocus/>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}"/>
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                     autocomplete="current-password"/>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-forms.checkbox id="remember_me" name="remember"/>
                            <span class="text-sm text-gray-3">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <x-links.secondary href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </x-links.secondary>
                        @endif

                        <x-jet-button>{{ __('Log in') }}</x-jet-button>
                    </div>
                </form>
            </div>

        </div>

    </div>


</x-guest-layout>
