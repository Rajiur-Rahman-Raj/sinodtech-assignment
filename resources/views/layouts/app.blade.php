<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title') </title>

    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>

    <div class="wrapper">

        @include('partials.sidebar')

        <div class="main">

            @include('partials.navbar')

            <div class="container-fluid py-4">
                <nav class="mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Dashboard
                        </li>
                    </ol>
                </nav>

                @yield('content')

            </div>
        </div>
    </div>

    @stack('scripts')

</body>

</html>
