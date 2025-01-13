<section
    aria-labelledby="pizza-pets-pulverizers"
    {{ $attributes->merge([
        'class' => 'mt-12',
    ]) }}
>
    <h2 id="pizza-pets-pulverizers" class="flex p-2 items-center justify-center bg-orange-900 font-game text-orange-600">
        PULVERIZERS
    </h2>
    <div cLass="flex flex-cols py-4 justify-center bg-white space-x-4">
        @foreach(config('pulverizers') as $type => $value)
            <div class="flex flex-col">
                <a
                    href="{{ route('pulverizer', ['type' => $type]) }}"
                >
                @svg('pulverizers.'.$type, [
                    'class' => 'w-16 md:w-32 border rounded-md cursor-pointer'
                        . (pulverizer($type, $value)->isActive() ? ' animate-shake' : ' hover:animate-shake'),
                    'title' =>  pulverizer($type, $value)->name(),
                ])
                </a>
                <span class="mt-1 text-xs font-game font-semibold text-orange-900 text-center">
                    {{ pulverizer($type, $value)->status }}
                </span>
                <span class="text-xs font-game font-semibold text-orange-600 text-center {{ pulverizer($type, $value)->isRecharging() ? 'visible' : 'invisible' }}">
                    recharging
                </span>
            </div>
        @endforeach
    </div>
</section>
