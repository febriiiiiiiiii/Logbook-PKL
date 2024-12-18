<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Logbook PKL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-gray-100">
        <nav class="p-8 bg-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="text-lg font-semibold text-gray-800">
                    <a href="#" class="text-2xl font-bold text-indigo-600">Digital Logbook</a>
                </div>
                @guest    
                    <div>
                        <a href="{{ route('login') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Login</a>
                    </div>
                @endguest
            </div>
        </nav>

        <section class="bg-white">
            <div class="container mx-auto px-6 py-16 flex flex-col-reverse lg:flex-row items-center">
                <div class="lg:w-1/2 text-center lg:text-left">
                    <h1 class="text-4xl lg:text-6xl font-bold text-gray-800 leading-tight mb-4">Welcome to the Digital Logbook <span class="text-indigo-600">PKL</span></h1>
                    <p class="text-gray-600 mb-8"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate soluta sequi earum ipsum quiesse quaerat omnis molestiae corrupti?</p>
                    <div>
                        <a href="#" class="bg-indigo-600 text-white px-8 py-3 rounded-md shadow-lg hover:bg-indigo-700">Get Started</a>
                        <a href="#" class="ml-4 text-indigo-600 hover:underline">Learn More</a>
                    </div>
                </div>
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <img src="img_1.jpg" alt="Hero Image" class="w-full h-full object-cover">
                </div>
            </div>
        </section>
    </div>
</body>
