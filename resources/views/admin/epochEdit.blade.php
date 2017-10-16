<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="/css/admin_emre.css">
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
                  <span id="site-title-label">Settings</span>
              </div>
          </div>
            <div id="site-content">
                <div id="label-site">
                    <span id="label-user">Epoche bearbeiten</span>
                </div>

                <div id="formular-edit">
                    <form action="/admin/epochs/{{$id}}/update" method="post">
                        {{ csrf_field() }}
                        <div id="mandatory-field">
                          <div class="form-profile-picture">
                            <span id="profile-picture">Wählen Sie das Coverbild der Epoche:</span>
                            <label for="form-epoch-picture-data" id="label-custom-pic" onclick="buttonSubmitClicked(event);" class="custom-file-upload">
                              Datei auswählen
                            </label>
                            <input id="form-epoch-picture-data" class="form-profile-picture" type="file" name="edit-form-data-profile-picture" size="80px" accept="image/*" />
                          </div>
                          <p id="edit-form-data-name" class="edit-form-data">
                            Name der Epoche: <input class="edit-form-textarea" type="text" name="name" value="{{$name}}"/>
                          </p>
                          <p id="edit-form-data-life" class ="edit-form-data lifetime">
                            <span id ="lifetime-label-birth">Start der Epoche:</span> <input type="text" name="period_begin" value="{{$period_begin}}" />
                            <span id ="lifetime-label-death">Ende der Epoche:</span> <input type="text" name="period_end" value="{{$period_end}}" />
                        </p>
                        </div>

            			<br/>
            			<button type="submit">Änderungen Bestätigen</button>

                        <a href="/admin/epochs">
                            <button type="button">
                                Änderung verwerfen
                            </button>
                        </a>

                    </form>
                </div>

            </div>
        </div>




    </body>
</html>
