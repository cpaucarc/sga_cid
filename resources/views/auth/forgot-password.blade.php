<x-guest-layout>

    <div class="w-full min-h-screen">
        <div class="w-4/5  md:w-2/4 lg:w-1/4 mx-auto py-12 lg:py-24 space-y-3">

            <x-jet-authentication-card-logo/>

            <div class="mb-4 text-sm text-gray-3 space-y-1 pb-1">
                <h3 class="font-bold text-gray-4 text-center">¿Olvidaste tu contraseña?</h3>
                <p>
                    Ingrese su correo electrónico y le enviaremos un enlace para restablecer su contraseña.
                </p>
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-3">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}"/>
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                 required autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        Enviar correo
                    </x-jet-button>
                </div>
            </form>
        </div>

    </div>

</x-guest-layout>
