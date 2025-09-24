<x-layouts.app>
    <h1>Categories</h1>
    @foreach ($categories as $category)
        <div class="category-card">
            <div class="category-name">{{ $category->name }}</div>
        </div>
    @endforeach
</x-layouts.app>
