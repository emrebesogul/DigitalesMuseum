<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="action">
            <span class="{{ $icon }}"></span>
            <h2>{{ $infoMessage }}</h2>
            <a href={{ $buttonLink }}><button>{{ $buttonLabel }}</button></a>
        </div>
    </body>
</html>
