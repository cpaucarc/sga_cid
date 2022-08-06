@props(['stroke' => 2])

<svg {{ $attributes->merge(['class' => '']) }} fill="none" viewBox="0 0 24 24" stroke="currentColor"
     stroke-width="{{ $stroke }}">
    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
