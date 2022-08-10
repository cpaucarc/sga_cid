@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'border-blue-3 font-medium text-gray-4 focus:outline-none focus:border-gray-2'
                : 'border-transparent font-medium text-gray-2 hover:text-gray-3 hover:border-gray-1 focus:outline-none focus:border-gray-2';
@endphp

<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <a {{ $attributes->merge(['class' => $classes . ' inline-flex items-center px-2 pt-1 border-b-[3px] text-sm leading-5 soft-transition']) }}>
        {{ $slot }}
    </a>
</div>
