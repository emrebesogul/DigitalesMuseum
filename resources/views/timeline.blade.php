
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Base</title>

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
                <ul>
                  <li>
                    <div class="timelineEntry">
                      <div class="timelinePicture">
                          <img src = "https://pbs.twimg.com/profile_images/655015593276477441/LmuMXwW4.jpg" style='height: 100%; width: 100%; object-fit: contain'/>
                      </div>
                      <div class="timeline-entry-content">
                        <h2> Neue Welt </h2>
                        <span class="timeline-info-birth">
                          Geboren: <time>2010</time>
                        </span>
                        <span class="timeline-info-death">
                          Gestorben: <time>2011</time>
                          <br />
                          <p>
                            Wir haben nun alle Komponenten, die einen endlichen Automaten festlegen, formal
     beschrieben. Die folgende Definition fasst diese Festlegungen zusammen:
     Akzeptor) A ist festgelegt durch A = (; S; ; s0; F). Dabei ist  das Eingabealphabe
                          </p>
                        </span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="timelineEntry">
                      <div class="timelinePicture">
                          <img src = "https://pbs.twimg.com/profile_images/655015593276477441/LmuMXwW4.jpg" style='height: 100%; width: 100%; object-fit: contain'/>
                      </div>
                      <div class="timeline-entry-content">
                        <h2> Neue Welt </h2>
                        <span class="timeline-info-birth">
                          Geboren: <time>2010</time>
                        </span>
                        <span class="timeline-info-death">
                          Gestorben: <time>2011</time>
                          <br />
                          <p>
                            Wir haben nun alle Komponenten, die einen endlichen Automaten fe
                          </p>
                        </span>
                      </div>
                    </div>
                  </li>

                  @foreach ($people as $person)
                    <li>
                      <div class="timelineEntry">
                        <div class="timelinePicture">
                            <img src="/storage/people/portaits/{{$portrait_filename}}" style='height: 100%; width: 100%; object-fit: contain' />
                        </div>
                        <div class="timeline-entry-content">
                          <h2>{{$name}}</h2>
                          <span class="timeline-info-birth">
                            Geboren am: {{$birthday}}
                          </span>
                          <span class="timeline-info-death">
                            Gestorben am: {{$date_of_death}}
                            <br />
                            <p>
                              {{$short_description}}
                            </p>
                          </span>
                        </div>

                      </div>
                    </li>

                  @endforeach

              </section>

            </div>
        </div>
          <script language="javascript" type="text/javascript" src="/js/johannes_timeline.js"></script>
    </body>
</html>
