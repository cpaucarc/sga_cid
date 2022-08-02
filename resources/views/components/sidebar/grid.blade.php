<div class="grid grid-cols-10 gap-6">
    <div class="col-span-2">
        <div class="flex flex-col items-start gap-y-6 divide-slate-200 divide-y">
            {{ $sidebar }}
        </div>
    </div>

    <div class="col-span-8">
        {{ $slot }}
    </div>
</div>
