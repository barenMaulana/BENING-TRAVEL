<!--======================================================
    - Baren maulana       - dedication
    - 01-02-2020             - discipline
    - 22.45 WIB.              - never give up until i die.
========================================================-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- style --}}
    @stack('addon-style')
    @stack('prepend-style')
    @include('includes.style')
    {{-- end of style --}}

</head>

<body>
    <!-- awal navbar -->
    @include('includes.navbar-success')
    <!-- akhir navbar -->

    {{-- main content --}}
    @yield('content')
    {{-- end of main content --}}


    {{-- scripts --}}
    @include('includes.script')
    @stack('prepend-script')
    @stack('addon-script')
    {{-- end of script --}}
</body>

</html>