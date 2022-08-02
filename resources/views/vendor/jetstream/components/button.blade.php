<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'btn text-white bg-blue-600 border-blue-800 hover:bg-blue-800 focus:border-blue-900 focus:bg-blue-900 disabled:opacity-25']) }}
>
    {{ $slot }}
</button>
