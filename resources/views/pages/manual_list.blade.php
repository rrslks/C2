<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>



    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    @if(isset($top5Manuals) && $top5Manuals->count())
        <div style="margin-bottom: 20px;">
            <h2>Top 5 manuals of this brand</h2>
            <ol>
                @foreach($top5Manuals as $manual)
                    <li>
                        {{ $manual->name }}
                    </li>
                @endforeach
            </ol>
        </div>
    @endif



    <div class="manuals-grid">
        @foreach ($manuals as $manual)
            <div class="manual-card">
                <div class="manual-title">{{ $manual->name }}</div>
                <div class="manual-meta">
                    <span>{{ $manual->filesize_human_readable }}</span>
                    <span>Views: {{ $manual->views }}</span>
                </div>
                <div class="manual-actions">
                    @if ($manual->locally_available)
                        <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" class="btn btn-primary btn-sm">View</a>
                    @else
                        <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ $manual->url }}" target="_blank" class="btn btn-outline-secondary btn-sm">Extern</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</x-layouts.app>
