<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Logbook PKL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
        <form action="{{ route('login') }}" method="POST"
            class="bg-white shadow-lg rounded-lg px-8 py-6 max-w-lg w-full space-y-6">
            @csrf

            <h2 class="text-3xl font-bold text-center text-gray-800">LOGIN</h2>

            <x-input label="Email" id="email" name="email" type="email" />

            <x-input label="Password" id="password" name="password" type="password" />

            <x-submit-button>
                Login
            </x-submit-button>
        </form>
    </div>
</body>

</html>
