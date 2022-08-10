<div class="py-2">
    <table class="w-full text-sm text-left text-gray-3">
        @if(isset($head))
            <thead class="text-xs text-gray-3 bg-gray-1/40 uppercase border-b-2 border-gray-1">
            <tr>
                {{ $head }}
            </tr>
            </thead>
        @endif

        <tbody class="divide-y divide-gray-1 divide-dashed border-b-2 border-gray-1">
        {{ $slot }}
        </tbody>
    </table>
</div>
