<a {{ $attributes->merge(['class' => 'btn text-white bg-rose-600 border-rose-800 hover:bg-rose-800 active:border-red-900 active:bg-rose-900 disabled:opacity-25']) }}>
    {{ $slot }}
</a>
