<nav x-data="{ open: false, modal: false }" class="bg-transparent h-full">
    <!-- Primary Navigation Menu -->
    <div class="h-full flex flex-col justify-between">
        <!-- Logo -->
        <div class="bg-transparent h-16 pr-4">
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-x-2 px-3 py-2 group soft-transition">
                    <x-jet-application-mark class="block h-8 w-auto"/>
                    <span class="font-bold text-lg text-gray-3/90 group-hover:text-gray-3 leading-5">CID Unasam</span>
                </a>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col gap-y-3 divide-y divide-gray-1/50 pr-2 py-2 overflow-y-auto w-full h-full">
            <x-sidebar.group titulo="Cursos">
                <x-jet-nav-link href="{{ route('curso.index') }}" :active="request()->routeIs('curso.*')">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    @endslot
                    {{ __('Idiomas dictables') }}
                </x-jet-nav-link>
            </x-sidebar.group>

            <x-sidebar.group titulo="Personal" class="pt-3">
                <x-jet-nav-link href="{{ route('docente.index') }}" :active="request()->routeIs('docente.*')">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    @endslot
                    {{ __('Docente') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('autoridad.index') }}"
                                :active="request()->routeIs('autoridad.*')">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    @endslot
                    {{ __('Autoridad') }}
                </x-jet-nav-link>
            </x-sidebar.group>

            <x-sidebar.group titulo="Matrícula" class="pt-3">
                <x-jet-nav-link href="{{ route('director.matricula.programacion.index') }}"
                                :active="request()->routeIs('director.matricula.programacion.*')">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    @endslot
                    {{ __('Meses') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('director.matricula.prematricula.index') }}"
                                :active="request()->routeIs('director.matricula.prematricula.*')">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                    @endslot
                    {{ __('Pre-matrícula') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="#">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    @endslot
                    {{ __('Matrícula') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="#">
                    @slot('icon')
                        <x-icons.dollar class="icon-5" stroke="1.7"/>
                    @endslot
                    {{ __('Pagos') }}
                </x-jet-nav-link>
            </x-sidebar.group>

            <x-sidebar.group titulo="Clases" class="pt-3">
                <x-jet-nav-link href="#">
                    @slot('icon')
                        <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                    @endslot
                    {{ __('Grupos') }}
                </x-jet-nav-link>
            </x-sidebar.group>
        </div>

        <!-- Profile Data -->
        <div class="bg-transparent h-24 pr-4 py-1 space-y-1">
            <x-jet-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="icon-6 rounded-full object-cover"
                         src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                @endif
                <p class="text-sm font-semibold text-gray-3/90 group-hover:text-gray-3">
                    {{ Auth::user()->name }}
                </p>
            </x-jet-nav-link>

            <x-buttons.sidebar-button wire:click="$set('logout', true)">
                @slot('icon')
                    <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                @endslot
                {{ __('Log Out') }}
            </x-buttons.sidebar-button>
        </div>
    </div>


    {{-- Modal --}}
    <x-jet-confirmation-modal wire:model="logout">
        @slot('title')
            ¿Desea cerrar sesión?
        @endslot
        @slot('content')
            Si desea salir de la sesión actual, pulse en el botón <b>"Cerrar Sesión"</b>, en caso contrario, pulse sobre
            el botón 'Cancelar'.
        @endslot
        @slot('footer')
            <x-jet-secondary-button wire:click="$set('logout', false)">
                Cancelar
            </x-jet-secondary-button>

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-links.primary color="danger" href="{{ route('logout') }}"
                                 @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-links.primary>
            </form>
        @endslot
    </x-jet-confirmation-modal>

</nav>
