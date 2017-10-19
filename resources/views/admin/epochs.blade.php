<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Epochenverwaltung - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="content">

            <div id="site-title">
                <div id="site-title-wrapper">
                    <span id="site-title-label">Settings</span>
                </div>
            </div>

            <div id="site-content">

              <div id="content-action-menu">
                <ul id="list-action-menu">
                  <a href="/admin/users"><li id="list-header">Benutzer</li></a>
                  <a><li id="list-header" class ="active">Epoche</li></a>
                  <a href="/admin/people"><li id="list-header">Person</li></a>
                </ul>
              </div>

              <div id="content-action-view">

                <a href="/admin/epochs/create">
                  <div class="content-view-create">
                    Neue Epoche anlegen
                  </div>
                </a>

                <div id="content-view-person">
                  <ul id="list-view-person">
                      @foreach ($epochs as $epoch)
                         <li id="list-persons">
                             {{$epoch['name']}}
                             <a href="/admin/epochs/{{$epoch['id']}}/delete">
                                 <button type="submit" id="delete-button">
                                     <span class="icon_trash"></span>
                                 </button>
                             </a>
                             <a href="/admin/epochs/{{$epoch['id']}}">
                                 <button type="button">
                                     Bearbeiten
                                 </button>
                             </a>
                         </li>
                      @endforeach
                  </ul>
                </div>

              </div>
            </div>
        </div>
    </body>
</html>
