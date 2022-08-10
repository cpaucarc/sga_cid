<x-guest-layout>
    <div class="w-full min-h-screen">
        <div class="w-4/5 md:w-2/4 lg:w-1/4 mx-auto py-8 lg:py-20 space-y-3">

            <x-jet-authentication-card-logo/>

            <x-jet-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}"/>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                 required autofocus autocomplete="name"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                 required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}"/>
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                 autocomplete="new-password"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                 name="password_confirmation" required autocomplete="new-password"/>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-between mt-4">
                    <x-links.secondary href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </x-links.secondary>

                    <x-jet-button>{{ __('Register') }}</x-jet-button>
                </div>
            </form>

        </div>
    </div>

</x-guest-layout>
