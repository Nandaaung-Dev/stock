<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div id="app">
    <div class="flex h-screen">
        <div class="px-4 py-2 bg-gray-200 bg-indigo-600 lg:w-1/4">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-8 h-8 text-white lg:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <div class="flex flex-col justify-between h-full">
                <div class="hidden lg:block">
                    <div class="my-2 mb-6">
                        <h1 class="text-2xl font-bold text-white">Admin Dashboard</h1>
                    </div>
                    <ul>
                        
                        <li class="mb-2 rounded hover:shadow hover:bg-gray-500 {{ request()->is('items*') ? 'bg-gray-500':'' }}">
                            <a href="{{ route('items.index')}}" class="inline-block w-full px-3 py-2 font-bold text-white">
                                <i class="fa-solid fa-list me-5"></i>Items
                            </a>
                        </li>
                        <li class="mb-2 rounded hover:shadow hover:bg-gray-500 {{ request()->is('categories*') ? 'bg-gray-500':'' }}">
                            <a href="{{ route('categories.index') }}" class="inline-block w-full px-3 py-2 font-bold text-white">
                                <i class="fa-solid fa-sheet-plastic me-5"></i>Categories
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mb-5">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-normal py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full px-4 py-2 bg-gray-200 lg:w-full">
            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <span class="block sm:inline">{{ $message }}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
    @yield('script')
</body>
</html>
