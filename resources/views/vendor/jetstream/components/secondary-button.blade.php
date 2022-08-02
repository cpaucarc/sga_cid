<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn disabled:opacity-25']) }}>
    {{ $slot }}
</button>
