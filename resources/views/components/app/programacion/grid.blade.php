<div class="grid grid-cols-12 gap-12">
    <div class="col-span-3">
        {{ $info }}
    </div>
    <div class="col-span-6">
        {{ $slot }}
    </div>
    <div class="col-span-3">
        <div class="flex flex-col items-start gap-y-6 divide-slate-200 divide-y">
            {{ $sidebar }}
        </div>
    </div>
</div>
