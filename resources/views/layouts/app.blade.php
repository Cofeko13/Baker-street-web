<!DOCTYPE html>
<html lang="ru" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Пекарня Baker Street — свежий хлеб, выпечка и десерты каждый день.">

    <title>@yield('title', 'Baker Street — пекарня')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700|dm-sans:400,500,600,700" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            cream: '#faf6f0',
                            brown: {
                                200: '#e8ddd4',
                                300: '#d4c4b8',
                                400: '#b89a88',
                                500: '#9a7b68',
                                600: '#7a5c4a',
                                700: '#5c3d2e',
                                800: '#3d2318',
                                900: '#2c1810',
                            },
                        },
                        fontFamily: {
                            sans: ['DM Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                            display: ['Playfair Display', 'ui-serif', 'Georgia', 'serif'],
                        },
                    },
                },
            };
        </script>
    @endif
    
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-cream text-brown-900 font-sans antialiased">
    @yield('content')
</body>
</html>