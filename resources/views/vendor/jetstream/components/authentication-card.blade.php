<div class="min-h-screen pt-10 bg-gray-1/10">
    <div class="flex flex-col sm:justify-center items-center">
        <div>
            {{ $logo }}
        </div>

        <div
            class="w-10/12 sm:w-8/12 md:w-6/12 lg:w-3/12 border border-gray-1 mt-6 px-6 pt-6 pb-4 bg-white overflow-hidden rounded-md">
            {{ $slot }}
        </div>
    </div>
</div>
