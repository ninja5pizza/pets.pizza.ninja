<section
    aria-labelledby="pizza-pets-stats"
    {{ $attributes->merge([
        'class' => 'mt-12',
    ]) }}
>
    <h2 id="pizza-pets-stats" class="flex p-2 items-center justify-center bg-orange-900 font-game text-orange-600">
        STATISTICS
    </h2>
    <div class="bg-orange-600 font-game">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-2 gap-px lg:grid-cols-4">
                <div class="px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-xs text-orange-900 uppercase">pets alive</p>
                    <p class="mt-1 flex items-baseline gap-x-2">
                        <span class="text-4xl text-white">{{ $alive_count }}</span>
                    </p>
                </div>
                <div class="px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-xs text-orange-900 uppercase">pets dead</p>
                    <p class="mt-1 flex items-baseline gap-x-2">
                        <span class="text-4xl text-off-white">{{ $dead_count }}</span>
                    </p>
                </div>
                <div class="px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-xs text-orange-900 uppercase">owners</p>
                    <p class="mt-1 flex items-baseline gap-x-2">
                        <span class="text-4xl text-off-white">{{ $owner_count }}</span>
                    </p>
                </div>
                <div class="px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-xs text-orange-900 uppercase">listed for sale</p>
                    <p class="mt-1 flex items-baseline gap-x-2">
                        <span class="text-4xl text-off-white">{{ $listed_for_sale }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
