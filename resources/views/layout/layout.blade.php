<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    @include('component.nav-bar')
    <div class="flex items-center justify-center w-screen">
        <div class="w-[1275px]">
            <div class="px-5 md:px-0">
                @yield('content')
            </div>
        </div>
    </div>
   @include('component.bot')

    @include('component.footer')
</body>
