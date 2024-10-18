<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <div class="jumbotron">
        <h1>Top Manuals for Brand ID: {{ $brandId }}</h1>
        <h2>Top 5 Manuals</h2>
        <ol>
            @if($topBrandManuals->isNotEmpty())
                @foreach($topBrandManuals as $manual)
                    <li>{{ $manual->name }}</li> <!-- Toont alleen manuals met het bijbehorende brand_id -->
                @endforeach
            @else
                <li>Geen manuals gevonden voor dit merk.</li>
            @endif
        </ol>
    </div>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

        @foreach ($manuals as $manual)
        <div class="linkKnop">

            <a href="{{ route('manual.redirect', $manual->id) }}" alt="{{ $manual->name }}" title="{{ $manual->name }}" target="{{ $manual->locally_available ? '_self' : '_blank' }}">
                {{ $manual->name }}
            </a>
        </div>
        @endforeach
    </div>

</x-layouts.app>
