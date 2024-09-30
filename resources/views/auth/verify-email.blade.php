<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Logbook PKL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">

        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Verify Your Email</h1>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-sm text-green-600 bg-green-100 rounded-lg p-4">
                A new email verification link has been emailed to you!
            </div>
        @endif

        <p class="text-gray-600 mb-4">Please verify your email at:
            <span class="font-semibold text-gray-800">{{ auth()->user()->email }}</span>
        </p>

        <a href="{{ route('verification.send') }}"
            class="block w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition ease-in-out duration-200 focus:outline-none focus:ring-4 focus:ring-blue-300"
            onclick="event.preventDefault(); document.getElementById('verify-email').submit();">
            Resend Verification Email
        </a>

        <form action="{{ route('verification.send') }}" method="POST" id="verify-email" class="hidden">
            @csrf
        </form>
    </div>

</div>

</html>
