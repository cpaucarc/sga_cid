<a {{ $attributes->merge(['class' => 'btn bg-transparent hover:bg-slate-200/50 border-slate-300 text-slate-600 hover:text-slate-800 disabled:opacity-25']) }}>
    {{ $slot }}
</a>
