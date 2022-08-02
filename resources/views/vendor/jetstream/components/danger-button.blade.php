<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn text-white bg-rose-600 border-rose-800 hover:bg-rose-800 focus:border-red-900 focus:bg-rose-900 disabled:opacity-25']) }}>
    {{ $slot }}
</button>
