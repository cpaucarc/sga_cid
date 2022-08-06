@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-slate-600 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
