<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Userverwaltung - Digitales Museum</title>

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
                    <span id="site-title-label">Admin</span>
                </div>
            </div>

            <div id="site-content">

              <div id="content-action-menu">
                <ul id="list-action-menu">
                  <a><li id="list-header" class ="active">Benutzer</li></a>
                  <a href="/admin/epochs"><li id="list-header">Epochen</li></a>
                  <a href="/admin/people"><li id="list-header">Personen</li></a>
                </ul>
              </div>

              <div id="content-action-view">

                  <div class="content-view-create">
                    Benutzerverwaltung
                  </div>

                <div id="content-view-person">
                  <ul id="list-view-person">
                      @foreach ($users as $user)
                         <li id="list-persons">
                             {{$user['name']}}
                             <a href="/admin/user/{{$user['id']}}/delete">
                                 <button type="submit" id="delete-button">
                                     <span class="icon_trash"></span>
                                 </button>
                             </a>
                             <a href="/admin/user/{{$user['id']}}">
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
