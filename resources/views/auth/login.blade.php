<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Gudang | Login</title>
    @include('layouts.style')
    @livewireStyles
</head>
<body class="hold-transition login-page" style="background: linear-gradient(135deg, #1f2937 0%, #0f172a 45%, #1d4ed8 100%);">
    <div class="d-flex align-items-center justify-content-center w-100 p-3">
        @livewire('auth.login')
    </div>

    @include('layouts.script')
    @livewireScripts
</body>
</html>