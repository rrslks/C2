<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100"
                height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <!-- Alphabetical Navigation Menu -->
    <div class="container">
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
                foreach (range('A', 'Z') as $letter) {
                    if (in_array($letter, $availableLetters)) {
                        echo '<a href="#letter-' . $letter . '" class="alphabet-btn">' . $letter . '</a>';
                    } else {
                        echo '<span class="alphabet-btn disabled">' . $letter . '</span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    $size = count($brands);
    $columns = 1; // Changed from 3 to 1 column for less crowded layout
    $chunk_size = ceil($size / $columns);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Top 10 viewed manuals</h2>
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
        <!-- Single column layout for less crowded brands list -->
        <div class="row">
            <div class="col-12">
                <ul class="brands-list">
                    @foreach ($brands as $brand)
                        <?php
                        $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                        if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                            echo '<h2 id="letter-' . $current_first_letter . '" class="brand-letter-header">' . $current_first_letter . '</h2>';
                        }
                        $header_first_letter = $current_first_letter;
                        ?>

                        <li class="brand-item">
                            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" class="brand-link">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{ $name }}
</x-layouts.app>
