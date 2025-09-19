<x-layouts.app>

    <x-slot:introduction_text>
        <p>{{ __('misc.contact_intro') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.contact') }}
        </x-slot:title>
    </h1>

    <div class="container">
        <form action="/contact" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('name') }}</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">{{ __('email') }}</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">{{ __('message') }}</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('send') }}</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

</x-layouts.app>
