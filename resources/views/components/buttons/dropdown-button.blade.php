<button {{ $attributes->merge(['class' => 'flex w-full px-4 py-2 text-sm text-left leading-5 text-slate-700 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 transition']) }}>
    {{ $slot }}
</button>
