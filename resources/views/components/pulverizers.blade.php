<section
    aria-labelledby="pizza-pets-pulverizers"
    {{ $attributes->merge([
        'class' => 'mt-32',
    ]) }}
>
    <h2 id="pizza-pets-pulverizers" class="flex p-2 items-center justify-center bg-orange-900 font-game text-orange-600">
        PULVERIZERS
    </h2>
    <div cLass="flex flex-cols p-4 justify-center bg-white space-x-4">
        @foreach(config('pulverizers') as $key => $value)
            <div class="flex flex-col">
                <a
                    href="{{ route('pulverizer', ['type' => $key]) }}"
                >
                @svg('pulverizers.'.$key, [
                    'class' => 'w-96 md:w-24 border rounded-md cursor-pointer'
                        . (pulverizer($key, $value)->isActive() ? ' animate-shake' : ' hover:animate-shake'),
                    'title' =>  pulverizer($key, $value)->name(),
                ])
                </a>
                <span class="mt-1 text-xs font-game font-semibold text-orange-900 text-center">
                    {{ pulverizer($key, $value)->status }}
                </span>
                <span class="text-xs font-game font-semibold text-orange-600 text-center {{ pulverizer($key, $value)->is_recharging ? 'visible' : 'invisible' }}">
                    recharging
                </span>
            </div>
        @endforeach
    </div>
</section>
