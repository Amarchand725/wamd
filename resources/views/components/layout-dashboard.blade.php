<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WTZ Track QR - Beta version">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="Tracking and delivery message system">
    <meta name="author" content="MZ Team">
    <title>{{ $title }} | WTZ Track QR</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('public/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('public/plugins/pace/pace.css')}}" rel="stylesheet">
    <link href="{{asset('public/plugins/highlight/styles/github-gist.css')}}" rel="stylesheet">
    <script src="{{asset('public/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('public/css/main.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('public/images/avatars/avatar2.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/avatars/avatar2.png')}}" />
</head>

<body>
<x-sidebar></x-sidebar>
{{ $slot }}


    <!-- Javascripts -->

<script src="{{asset('public/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('public/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('public/plugins/blockUI/jquery.blockUI.min.js')}}"></script>
<script src="{{asset('public/js/main.min.js')}}"></script>
<script src="{{asset('public/js/custom.js')}}"></script>
<script src="{{asset('public/js/pages/blockui.js')}}"></script>
<script src="{{ asset('public/js/search.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>