<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>THK Holdings Vietman Hanoi</title>
        @vite('resources/css/admin/base.css')
        @vite('resources/scss/admin/side-menu.scss')
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @yield('custom_css')
    </head>
    <body>
        <x-admin.side-menu />
        @yield('main_contents')
        @yield('page_js')
    </body>
</html>