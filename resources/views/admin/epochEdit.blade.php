<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eine Epoche bearbeiten - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/epochCreate_johannes.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>

        @include('nav')


        <div id="content">
          <div id="site-title">
            <a href="/admin/epochs"><button id="back-button" class="edit-form-data buttons"><span id="test" class="arrow_carrot-left_alt2"></span>Zurück</button></a>
              <div id="site-title-wrapper">
                  <span id="site-title-label">Settings</span>
              </div>
          </div>
            <div id="site-content">
              <div id="edit-form-wrapper">
                <span id="label-new-person"> Eine Epoche bearbeiten </span>

                <form id="edit-form"  action="/admin/epochs/{{$id}}/update" method="post" enctype="multipart/form-data">

                  {{ csrf_field() }}
                  <div id="mandatory-field">
                    <div class="form-profile-picture">
                      <div id="cover-picture-preview">
                          <img src="/storage/epochs/pictures/{{ $cover_filename }}" widht="180px" height="180px">
                      </div>
                      <span id="profile-picture">Der Epoche ein anderes Coverbild zuweisen:</span>
                      <label for="form-epoch-picture-data" id="label-custom-pic" onclick="buttonSubmitClicked(event);" class="custom-file-upload">
                        Datei auswählen
                      </label>
                      <input id="form-epoch-picture-data" class="form-profile-picture" type="file" name="edit-form-data-epoch-picture" size="80px" accept="image/*" />
                    </div>
                    <p id="edit-form-data-name" class="edit-form-data">
                      Name der Epoche: <input class="edit-form-textarea" type="text" name="edit-form-data-epoch-name" placeholder="Geben Sie den Namen der Epoche ein!" value="{{ $name }}" />
                    </p>
                    <p id="edit-form-data-life" class ="edit-form-data lifetime">
                      <span id ="lifetime-label-birth">Start der Epoche:</span> <input type="text" placeholder="Jahr" class="epoch-time-text" name="edit-form-data-startdate" value="{{ $period_begin }}" />
                      <span id ="lifetime-label-death">Ende der Epoche:</span> <input type="text" placeholder="Jahr" class="epoch-time-text" name="edit-form-data-enddate" value="{{ $period_end }}" />
                    </p>
                  </div>

                  <button id="submit-button" class="edit-form-data buttons" type="submit" text="Absenden">Änderungen speichern</button>
                </form>
              </div>
            </div>
        </div>
          <script language="javascript" type="text/javascript" src="/js/johannes_admin-edit.js"></script>
    </body>
</html>
