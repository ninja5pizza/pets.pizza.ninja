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
                <a href="{{ route('pulverizer', ['type' => $key]) }}">
                @svg('pulverizers.'.$key, [
                    'class' => 'w-96 md:w-24 border rounded-md'
                        . ($key == '---' ? ' animate-shake' : ' hover:animate-shake'),
                    'title' => Str::of($key)->ucfirst()->append(' ')->append('Pizza Pet Pulverizer')->toString(),
                ])
                </a>
                <span class="mt-1 text-xs font-game font-semibold text-orange-900 text-center">
                    {{ ($key == '---' ? 'active' : 'inactive') }}
                </span>
            </div>
        @endforeach
    </div>
</section>
