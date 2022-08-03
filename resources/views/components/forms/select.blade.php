<select {{ $attributes->merge([ 'class' => 'select disabled:bg-slate-50 disabled:cursor-not-allowed disabled:font-bold disabled:text-slate-600']) }}>
    {{ $slot }}
</select>
