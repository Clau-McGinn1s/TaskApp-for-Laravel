<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task List App</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
      
    <body class='bg-gray-300 lg:justify-center min-h-screen '>
        <h1 class='text-2xl text-blue-950'>@yield('title')</h1>
        <div class='bg-amber-50 space-y-2'>
            @yield('content')
        </div>
    </body>
</html>