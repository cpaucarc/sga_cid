<button {{ $attributes->merge(['class' => 'flex w-full px-4 py-2 text-sm text-left leading-5 text-gray-3 hover:text-gray-4 hover:bg-gray-1/30 focus:outline-none soft-transition']) }}>
    {{ $slot }}
</button>
