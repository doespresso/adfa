<!DOCTYPE html>
<html lang="ru">
<head>
    @include('partial.meta')
    @include('partial.og')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#f7f7f7">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <link href="/assets/css/app.min.css" rel="stylesheet">
    <script src="/assets/js/app/app1.min.js"></script>
</head>
<body>
<div id="main-loader" class="loading">
<div class="indicator">
    <div id="a"></div>
    <div id="d"></div>
    <div id="f"></div>
</div>
<div class="naming"></div>
</div>

@include('menus.mobileindex')

@include('partial.header')

@yield('page-content')

@include('partial.footer')

<div id="bg-home"></div>
</body>
</html>
