
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Timeline - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/johannes_timeline.css" />
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="content">
            <div id="site-title">
                <div id="site-title-wrapper">
                    <span id="site-title-label">People</span>
                </div>
            </div>
            <div id="site-content">
              <section class="timeline">
                  @if(empty($people) && isset($_GET['q']))
                      <div id="action">
                          <span class="icon_error-circle_alt"></span>
                          <h2>Keine Personen gefunden.</h2>
                      </div>
                  @else
                  <ul>
                    @foreach ($people as $person)
                      <li>
                        <div class="timelineEntry">
                          <a href="/person/{{$person['id']}}">

                              @if($person['portrait_filename'] == null)
                                <div class="timelinePicture"><span class="icon_profile" style="font-size:100px; color: #333"/></div>
                              @else
                                <div class="timelinePicture" style="background-image: url(/storage/people/portraits/{{$person['portrait_filename']}})"></div>
                              @endif

                          <div class="timeline-entry-content">
                            <h2>{{$person['name']}}</h2>
                            <span class="timeline-info-birth">
                              Geboren am: {{ Carbon\Carbon::parse($person['birthday'])->format('d.m.Y') }}
                            </span>
                            <br />
                            <span class="timeline-info-death">
                                @if($person['date_of_death'] == NULL)

                                @else
                                    Gestorben am: {{ Carbon\Carbon::parse($person['date_of_death'])->format('d.m.Y') }}
                                    <br />
                                @endif

                              <p>
                                {{$person['short_description']}}
                              </p>
                            </span>
                          </div>
                          </a>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                  @endif
              </section>
            </div>
        </div>
          <script language="javascript" type="text/javascript" src="/js/johannes_timeline.js"></script>
    </body>
</html>
