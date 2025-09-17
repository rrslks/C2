<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


        @foreach ($manuals as $manual)

            @if ($manual->locally_available)
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" class="btn btn-primary btn-sm" style="margin-left: 10px;">View</a>
            @else
                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" class="btn btn-primary btn-sm" style="margin-left: 10px;">View</a>
                <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
            @endif

            <span> - Views: {{ $manual->views }}</span>

            <br />
        @endforeach

</x-layouts.app>
