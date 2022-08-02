<table class="w-full text-sm text-left text-slate-500">
    @if(isset($head))
        <thead class="text-xs text-slate-700 uppercase bg-slate-200/50">
        <tr>
            {{ $head }}
        </tr>
        </thead>
    @endif

    <tbody>
    {{ $slot }}
    </tbody>
</table>
