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
        <nav>
            <div id="logo">
                <span class="highlighted">D</span>igitales <span class="highlighted">M</span>useum
            </div>

            <div id="search-bar">
                <span class="icon icon_search"></span>
                <input type="text" name="search_query" placeholder="Search the museum">
            </div>

            <div id="user-information">
                <span id="welcome-message">Willkommen zurück, Herr Administrator!</span>

                <a href="/logout" id="logout-icon">
                    <span class="icon icon_lock_alt"></span>
                </a>
            </div>
        </nav>

        <div id="content">

            <div id="site-title">
                <div id="site-title-wrapper">
                    <span id="site-title-label">Administrator</span>
                </div>
            </div>

            <div id="site-content">

              <div id="content-action-menu">
                <ul id="list-action-menu">
                  <li id="list-header"><a href="/admin-person">Person</a></li>
                  <li id="list-header"><a href="/admin-epoch">Epoche</a></li>
                  <li id="list-header"><a class="active" href="/admin-user">User-List</a></li>
                  <li id="list-header"><a href="#">Erweiterungen</a></li>
                </ul>
              </div>

              <div id="content-action-view">

                <a href="#">
                  <div id="content-view-create">
                    Neue Person anlegen
                  </div>
                </a>

                <div id="content-view-person">
                  <ul id="list-view-person">
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>
                    <li id="list-persons">User 1<a href="/"><button type="button">Bearbeiten / Löschen</button></a></li>

                  </ul>
                </div>

              </div>



            </div>


        </div>
    </body>
</html>
