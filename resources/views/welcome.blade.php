<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    </head>
    <body class="antialiased">
        <livewire:user-table/>
    </body>
</html>
 