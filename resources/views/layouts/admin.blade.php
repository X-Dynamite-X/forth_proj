<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    </script>
    {{-- @vite('resources/css/app.css') --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>


    @yield('css')

    <style>
        .active {
            background-color: #d1d5db !important;
            color: #000 !important;
        }

        .hover_color_link:hover {
            background-color: #777;
            color: #000;
        }
    </style>
</head>

<body>
    <div id="messageContainer"></div>






    <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
        @include('layouts.admin_nav')
        <main class=" flex w-full bg-slate-500">
            <div class=" flex w-full ">

                @yield('content')
            </div>
        </main>
        {{-- </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>




    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var currentPath = window.location.pathname;
            if (currentPath.includes("admin/roles")) {
                $("#rolesLink").addClass("active");
            } else if (currentPath.includes("admin/permissions")) {
                $("#permissionsLink").addClass("active");
            }
            else if (currentPath.includes("admin/users")) {
                $("#UserLink").addClass("active");
            }
        });
    </script>
    <script>
        var baner_message = `@include('layouts.message')`;
        var csrf_token = "{{ csrf_token() }}";
    </script>
    @yield('js')

</body>

</html>
