<button {{ $attributes->merge(['type' => 'button',
'class' => 'btn text-white bg-rose-3 border-rose-3 hover:bg-rose-4 hover:border-rose-4 active:border-rose-3 active:bg-rose-3 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
