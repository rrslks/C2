<x-layouts.app>
    <h1>Categories</h1>
    @foreach ($categories as $category)
        <div class="category-card">
            <div class="category-name"><strong>{{ $category->name }}</strong></div>
        </div>
        @foreach ($brands as $brand)
            @if ($brand->category_id === $category->id)
                <div class="brand-card">
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="brand-link">
                        {{ $brand->name }}
                    </a>
                </div>
            @endif
        @endforeach
    @endforeach
</x-layouts.app>
