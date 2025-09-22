<x-layouts.app>

    <x-slot:introduction_text>
        <p>{{ __('introduction_texts.letter_page_intro', ['letter' => $letter]) }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.brands_starting_with_letter', ['letter' => $letter]) }}
        </x-slot:title>
    </h1>

    <div class="container">
        <!-- Alphabetical Navigation Menu -->
        <div class="alphabet-nav">
            <h3>{{ __('misc.browse_by_letter') }}</h3>
            <div class="alphabet-nav-buttons">
                <?php
                // Get all first letters that have brands
                $availableLetters = [];
                foreach ($brands as $brand) {
                    $firstLetter = strtoupper(substr($brand->name, 0, 1));
                    if (!in_array($firstLetter, $availableLetters)) {
                        $availableLetters[] = $firstLetter;
                    }
                }
                sort($availableLetters);

                // Generate A-Z buttons, only showing letters that have brands
                foreach (range('A', 'Z') as $letterOption) {
                    if (in_array($letterOption, $availableLetters)) {
                        echo '<a href="/' . $letterOption . '" class="alphabet-btn">' . $letterOption . '</a>';
                    } else {
                        echo '<span class="alphabet-btn disabled">' . $letterOption . '</span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>{{ __('introduction_texts.top_10_viewed_manuals') }}</h2>
                <ul>
                    @foreach ($top10manuals as $manual)
                        <li>
                            <h2>{{ $manual->brand->name }}: {{ $manual->name }}</h2>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($brands->count() > 0)
                    <h2>{{ __('misc.brands_starting_with_letter', ['letter' => $letter]) }}</h2>
                    <ul class="brands-list">
                        @foreach ($brands as $brand)
                            <li class="brand-item">
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="brand-link">
                                    {{ $brand->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="alert alert-info">
                        <h3>{{ __('misc.no_brands_starting_with_letter', ['letter' => $letter]) }}</h3>
                        <p>{{ __('misc.browse_other_letters') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-layouts.app>
