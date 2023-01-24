{{-- @if (filled($brand = config('filament.brand')))
    <div @class([
        'filament-brand text-xl font-bold tracking-tight',
        'dark:text-white' => config('filament.dark_mode'),
    ])>
        {{ $brand }}
    </div>
@endif --}}

<img src="{{ asset('/images/ghaneps.png') }}" alt="Logo" class="h-10">
