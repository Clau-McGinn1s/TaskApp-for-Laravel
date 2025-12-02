<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task List App</title>

         <script src="//unpkg.com/alpinejs" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
      
    <body class='container mx-auto bg-blue-100  min-h-screen max-w-xl'>
        <h1 class='text-5xl text-center text-blue-950 mx-6 py-2'>@yield('title')</h1>
        

        <div class='bg-amber-50 space-y-2 px-3 mx-3 py-3 rounded-2xl'>
            @if (session()->has('success'))
                <div x-data="{ flash:true }">
                    <div  x-show="flash"
                        class='relative bg-green-300  px-3 mx-2 py-6 rounded-2xl' role='alert'>
                        <h1 class='font-bold text-1xl text-green-950 mx-6'>{{session('success')}}</h1>
                        <span class='absolute top-0 bottom-0 right-0 px-1 py-0.5'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" @click="flash = false"
                                stroke="currentColor" class="h-6 w-6 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>
                </div>
            @endif 

            @yield('content')

        </div>
    </body>
</html>