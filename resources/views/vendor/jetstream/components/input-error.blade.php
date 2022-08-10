@props(['for'])

@error($for)
<div {{ $attributes->merge(['class' => 'flex items-center gap-x-1 rounded mt-1 text-xs text-rose-3']) }}>
    <x-icons.exclamation class="icon-4"/>
    <p>{{ $message }}</p>
</div>
@enderror
