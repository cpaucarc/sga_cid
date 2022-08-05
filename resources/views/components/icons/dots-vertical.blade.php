@props(['stroke' => 2])

<svg {{ $attributes->merge(['class' => '']) }} fill="none" viewBox="0 0 24 24" stroke="currentColor"
     stroke-width="{{ $stroke }}">
    <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
</svg>
