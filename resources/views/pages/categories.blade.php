<x-layouts.app>
    <h1>Categories</h1>
    @foreach ($categories as $category)
        <div class="category-card">
            <div class="category-name"><strong>{{ $category->name }}</strong></div>
        </div>
        @foreach ($brands as $brand)
            @if ($brand->category_id === $category->id)
                <div class="brand-card">
                    <a href="/categories/{{ $category->slug }}/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/"
                        alt="Manuals for '{{ $brand->name }}'" title="Manuals for '{{ $brand->name }}'">
                        <div class="brand-name">{{ $brand->name }}</div>
                    </a>
                </div>
            @endif
        @endforeach
    @endforeach
</x-layouts.app>
