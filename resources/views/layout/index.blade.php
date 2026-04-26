<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Freya Laundry | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('asset/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/all.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/tinymce/js/tinymce/tinymce.min.js') }}"></script>
   <script src="{{ asset('js/app.js') }}" defer></script>
   <style>
        .tinymce-editor {
            background-color: #F4F6FF;
        }
    </style>

</head>

<body class="bg-latar text-sm font-sans antialiased">
    <div class="pt-24 min-h-screen">
        @include('partials/admin/navbar')

    @if (Auth::check())
        @if (Auth::user()->level === 'admin')
            @include('partials/admin/sidebar') <!-- Sidebar untuk admin -->
        @elseif(Auth::user()->level === 'pegawai')
            @include('partials/pegawai/sidebar') <!-- Sidebar untuk pegawai -->
        @endif
    @endif
    @yield('content')
    </div>
    <script>
        // Mengatur zona waktu JavaScript ke UTC+8
        Intl.DateTimeFormat().resolvedOptions().timeZone = 'UTC+8';
        displayCopyright();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Temukan elemen tombol unggah
            const uploadButton = document.querySelector('.fa-circle-up');

            // Ketika tombol unggah diklik
            uploadButton.addEventListener('click', function(e) {
                e.preventDefault();

                // Temukan input file tersembunyi
                const fileInput = document.querySelector('input[type="file"]');

                // Klik input file untuk memilih gambar
                fileInput.click();
            });
        });
    </script>

</body>

</html>
