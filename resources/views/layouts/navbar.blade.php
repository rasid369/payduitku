<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Store') }}</title>
    <script src="https://app-sandbox.duitku.com/lib/js/duitku.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex items-center justify-between">
                <a class="text-white font-bold text-xl" href="{{ url('/') }}">{{ config('app.name', 'Store') }}</a>
                <div class="text-white">
                    <a href="/">Store</a>
                </div>
                <div class="text-white">
                    <a href="{{route('history')}}">History</a>
                </div>
                <div class="text-white">
                    <a href="{{route('cash')}}">Cash</a>
                </div>
                <div>
                    <a href="{{ url('/cart') }}" class="text-white hover:text-gray-300 mr-4">
                        <svg class="w-6 h-6 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h10a2 2 0 012 2v10a2 2 0 01-2 2H9a2 2 0 01-2-2V9a2 2 0 012-2zm3 0v3m0 0V7m0 3h3m-3 0H7m0 0a3 3 0 110-6 3 3 0 010 6z"></path>
                        </svg>
                        Cart
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
