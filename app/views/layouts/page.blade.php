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
<div id="main-loader" class="loading"><div class="indicator"><svg version="1.1" id="adf" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="400px" height="400px" viewBox="8.09 -98.948 400 400" enable-background="new 8.09 -98.948 400 400" xml:space="preserve"><polygon id="f" points="306.285,45.163 288.702,45.163 288.702,68.696 288.702,92.228 288.702,156.943 306.285,156.943	306.285,92.228 313.87,92.228 313.87,68.696 323.18,68.696 323.18,45.163 "/><path id="d" d="M230.814,100.806c0-22.736-11.646-42.925-29.661-55.643v111.286C219.169,143.733,230.814,123.542,230.814,100.806z"/><polygon id="a" points="118.124,45.163 93,156.943 118.124,156.943 143.249,156.943 "/></svg></div><div class="naming"></div></div>

@include('menus.mobileindex')

@include('partial.header')

@yield('page-content')

@include('partial.footer')


</body>
</html>
