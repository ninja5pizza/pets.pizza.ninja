<nav class="bg-white shadow-sm">
    <div class="flex h-12 justify-between mx-auto max-w-6xl">
        <div class="flex px-4 md:px-8 space-x-8">
            @if(Route::currentRouteName() !== 'home')
            <a
                class="inline-flex items-center border-b-2 border-pets-orange-600 hover:border-pets-orange-200 px-2 pt-1 text-sm font-medium text-orange-900 hover:text-orange-700"
                href="{{ route('home') }}"
            >
                home
            </a>
            @endif
        </div>
        <div class="flex px-4 md:px-8 space-x-8">
            @if(Route::currentRouteName() === 'pulverizers')
            <span
                class="inline-flex items-center border-b-2 border-pets-orange-200 px-2 pt-1 text-sm font-bold text-orange-600"
            >
                pulverizers
            </span>
            @else
            <a
                href="{{ route('pulverizers') }}"
                class="inline-flex items-center border-b-2 border-pets-orange-600 hover:border-pets-orange-200 px-2 pt-1 text-sm font-medium text-orange-900 hover:text-orange-700"
            >
                pulverizers
            </a>
            @endif
            <a
                href="https://docs.pizzapets.org"
                class="inline-flex items-center border-b-2 border-pets-orange-600 hover:border-pets-orange-200 px-2 pt-1 text-sm font-medium text-orange-900 hover:text-orange-700"
                target="_blank"
                rel="noopener"
            >
                read the guide
            </a>
            <a
                href="https://magiceden.io/ordinals/marketplace/pizza-pets"
                class="inline-flex items-center border-b-2 border-pets-orange-600 hover:border-pets-orange-200 px-2 pt-1 text-sm font-medium text-orange-900 hover:text-orange-700"
                target="_blank"
                rel="noopener"
            >
                buy a pet
            </a>
        </div>
    </div>
</nav>
