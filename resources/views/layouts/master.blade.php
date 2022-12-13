<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Book Store') | Book Store</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> @stack('css_after')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Book Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ Route::is('books.index') ? 'active' : '' }}"
                    href="{{ route('books.index') }}">List Books<span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <div class="col p-4"> @yield('content') </div>
    {{-- Content END --}}


    {{-- Stack untuk menyisipkan element biasanya untuk script atau css --}}
    <script src="{{ asset('js/app.js') }}"></script> @stack('js_after')
</body>

</html>
