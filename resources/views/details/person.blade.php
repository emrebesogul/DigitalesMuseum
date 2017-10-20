<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$name}} - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/person_emre.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="content">
            <div id="site-title">
                <a href="/"><button id="back-button" class="edit-form-data buttons"><span id="test" class="arrow_carrot-left_alt2"></span>Zurück</button></a>

                <div id="site-title-wrapper">
                    <span id="site-title-label">Portrait</span>
                </div>
            </div>



            <div id="site-fact">
              <div id="site-fact-wrapper">
                <div id="site-fact-image">

                 @if($portrait_filename == null)
                    <span class="icon_profile" style="font-size:140px; color: #333"/>
                 @else
                    <img src="/storage/people/portraits/{{$portrait_filename}}" id="image-person">
                 @endif

                </div>
                <div id="site-fact-text">
                  <span id="site-fact-label">Fakten</span>
                  <br><br>
                  <span id="site-fact-birth" class="site-facts"><i >Geboren:</i><br>{{ Carbon\Carbon::parse($birthday)->format('d.m.Y') }}</span>
                  <br><br>
                  <span id="site-fact-death" class="site-facts"><i>Gestorben:</i><br>{{ Carbon\Carbon::parse($date_of_death)->format('d.m.Y') }}</span>
                  <br><br>
                  <span id="site-fact-details" class="site-facts"><i>Ort:</i><br>{{$location}}</span>
                  <br /><br />
                  <span id="site-fact-short-description" class="site-facts"><i>Kurzbeschreibung:</i> <br /> {{$short_description}}</span>
                  <br><br>
                  <span id="site-fact-download-link"><span class="icon_link_alt"> </span><a target="_blank" href="/storage/people/posters/{{$poster_filename}}" download>Download poster</a></span>

                  <br><br>
                </div>
              </div>

            </div>



            <div id="site-content">
              <div id="portrait-name">
                <span id="site-portrait-name">{{$name}}</span>
              </div>

              <div id="site-content-wrapper">
                <div id="site-content-text">


                  @foreach ($texts as $text)
                      <div id="site-content-middle">
                        {!!nl2br($text['content'])!!}
                      </div>
                  @endforeach

                  @if(empty($videos))
                    <span id="site-label-type"> </span>
                  @else
                      <span id="site-label-type">Videos</span>
                      @foreach ($videos as $video)
                          <div id="site-content-video">
                            {!!$video['embedCode']!!}
                          </div>
                      @endforeach
                  @endif


                  @if(empty($pictures))
                    <span id="site-label-type"> </span>
                  @else
                     <span id="site-label-type">Bilder</span>
                     @foreach ($pictures as $picture)
                          <div id="site-content-picture">
                            <img src="/storage/people/pictures/{{$picture['filename']}}" width="500px"/>
                          </div>
                     @endforeach
                  @endif



            </div>
        </div>
    </body>
</html>
