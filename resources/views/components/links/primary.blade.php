<a {{ $attributes->merge([
    'class' => 'btn text-white bg-blue-600 border-blue-800 hover:bg-blue-800 active:border-blue-900 active:bg-blue-900 disabled:opacity-25']) }}
>
    {{ $slot }}
</a>
