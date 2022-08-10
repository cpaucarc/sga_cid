@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-rose-3 text-center">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-outside text-sm text-rose-3 ml-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
