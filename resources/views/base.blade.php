<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Base</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="content">
            <div id="site-title">
                <div id="site-title-wrapper">
                    <span id="site-title-label">Personen</span>
                </div>
            </div>
            <div id="site-content">
                {{ $name }}
            </div>
        </div>
    </body>
</html>
