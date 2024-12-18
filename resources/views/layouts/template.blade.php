<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Logbook PKL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> --}}

</head>

<body>
    @include('components.navbar')

    @include('components.sidebar')
    
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')

</body>

</html>
