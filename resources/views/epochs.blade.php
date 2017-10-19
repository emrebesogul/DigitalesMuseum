<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Epochen - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/epoch_emre.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="content">

            <div id="site-title">
                <div id="site-title-wrapper">
                    <span id="site-title-label">Epochen</span>
                </div>
            </div>

            <div id="site-content">


              <a href="/" id="navigator-timeline">
                <div id="site-navigator-timeline">
                  <h2>Zur Timeline</h2>
                </div>
              </a>

              @foreach ($epochs as $epoch)
              <div id="test" style="background-image:url('/storage/epochs/pictures/{{$cover_filename}}')">
                <a href="/epochs/{{$epoch['id']}}" id="navigator-epochs">
                  <div id="site-navigator-epochs">
                    <h2>{{$epoch['name']}}</h2>
                    <h4>{{$epoch['period_begin']}} - {{$epoch['period_end']}}</h4>
                  </div>
                </a>
              </div>
              @endforeach

            </div>

        </div>


    </body>
</html>
