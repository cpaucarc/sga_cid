<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @stack('css')
</head>
<body class="font-sans antialiased">

<div class="grid grid-cols-10 bg-[#F6F6F6]">
    <div class="col-span-2 min-h-screen max-h-screen py-6 pl-6 pr-3">
        <livewire:sidebar-menu/>
    </div>

    <div class="col-span-8 py-6 pl-3 pr-6 min-h-screen max-h-screen overflow-hidden">
        <div class="bg-white rounded-md border border-gray-1/40 shadow-sm overflow-auto w-full h-full">
            {{--            <x-jet-banner/>--}}

            <!-- Page Heading -->
            {{--            @if (isset($header))--}}
            {{--                <header class="bg-white shadow sticky top-0">--}}
            {{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
            {{--                        {{ $header }}--}}
            {{--                    </div>--}}
            {{--                </header>--}}
            {{--            @endif--}}

            <!-- Page Content -->
            <main>
                <div class="px-6 py-6">
                    <div class="max-w-7xl mx-auto space-y-6">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>


@stack('modals')

@livewireScripts
<script src="{{ asset('js/alertas.js') }}"></script>
@stack('js')
</body>
</html>
