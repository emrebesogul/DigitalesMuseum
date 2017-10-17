<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>

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
                  <li id="list-header"><a class="active">Person</a></li>
                  <li id="list-header"><a href="/admin/epochs">Epoche</a></li>
                  <li id="list-header"><a href="/admin/users">User-List</a></li>
                </ul>
              </div>


              <div id="content-action-view">

                <a href="/admin/person/create">
                  <div id="content-view-create">
                    Neue Person anlegen
                  </div>
                </a>



                <div id="content-view-person">
                  <ul id="list-view-person">
                  @foreach ($people as $person)
                         <li id="list-persons">
                             {{$person['name']}}
                             <a href="/admin/person/{{$person['id']}}/delete">
                                 <button type="submit" id="delete-button">
                                     <span class="icon_trash"></span>
                                 </button>
                             </a>
                             <a href="/admin/person/{{$person['id']}}/update">
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
