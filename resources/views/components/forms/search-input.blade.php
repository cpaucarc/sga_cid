@props(['disabled' => false])

<div>
    <label class="block text-sm font-medium text-zinc-900">
        <div class="relative rounded-md">
            <div class="absolute inset-y-0 left-0 pl-3 mr-2 flex items-center pointer-events-none">
                <svg class="icon-5 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input {{ $attributes->merge([
                     'type' => 'search',
                     'placeholder' => 'Buscar...',
                     'class' => 'focus:ring-sky-500 bg-zinc-50 py-1.5 focus:bg-white focus:border-sky-500 block w-full pl-10 pr-2 text-sm border-zinc-300 rounded-md'
                     ])}}>
        </div>
    </label>
</div>
