<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SIMBARANG</title>
    
    {{-- Tambahin Vite untuk load Tailwind --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blueGray-100 text-blueGray-700 antialiased">
    
    <x-sidebar />

    <div class="relative md:ml-64 bg-blueGray-100">
        <x-navbars.admin/>

        {{-- Header --}}
        <x-headers.header-stats />

        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            {{-- Section konten halaman dashboard, maps, settings, tables --}}
            @yield('admin-content')

            <x-footers.footer-admin />
        </div>
    </div>

</body>
</html>
