<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-secondary text-gray-3 hover:bg-gray-1/70 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
