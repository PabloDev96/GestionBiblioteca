<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel con Vue</title> 

        <!-- Cargar Tailwind CSS a través de Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="">
        <div id="app">
            
        </div>

        @vite('resources/js/app.js')    
    </body>
</html>
