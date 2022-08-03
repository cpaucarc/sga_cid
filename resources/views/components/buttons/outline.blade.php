<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn bg-white hover:bg-slate-200/50 border-slate-300 text-slate-600 hover:text-slate-800 disabled:opacity-25']) }}
>
    {{ $slot }}
</button>
