<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title id="page-title">Freya Laundry</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('asset/css/fontawesome.css') }}" rel="stylesheet">
    <script src="{{ asset('asset/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <link href="{{ asset('asset/css/all.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-latar scroll-smooth">
    <header>
        @include('partials/user/nav')
    </header>
    <main>
        @yield('content')
    </main>
    <script>
        displayCopyright();
    </script>
</body>

</html>
