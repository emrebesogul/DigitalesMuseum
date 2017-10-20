<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eine Person anlegen - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/johannes_admin.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>
        @include('nav')

        <div id="content">
          <div id="site-title">
            <a href="/admin/people"><button id="back-button" class="edit-form-data buttons"><span id="test" class="arrow_carrot-left_alt2"></span>Zurück</button></a>
              <div id="site-title-wrapper">
                  <span id="site-title-label">Settings</span>
              </div>
          </div>
            <div id="site-content">
              <div id="edit-form-wrapper">
                <span id="label-new-person"> Neue Person anlegen </span>
                <form id="edit-form" action="/admin/person/create"  method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div id="mandatory-field">

                    <div class="form-profile-picture">
                      <span id="profile-picture">Wählen Sie das Porträt der Person:</span>
                      <br />
                      <input id="form-profile-picture-data" class="form-profile-picture" type="file" name="edit-form-data-profile-picture" size="80px" accept="image/*" />
                    </div>

                    <p id="edit-form-data-name" class="edit-form-data">
                      Name: <input class="edit-form-textarea" name="edit-form-data-name" type="text" placeholder="Geben Sie den Namen der Person ein!" />
                    </p>
                    <p id="edit-form-data-location" class="edit-form-data">
                      Ort: <input class="edit-form-textarea" name="edit-form-data-location" type="text" placeholder="Geben Sie den Ort der Person ein!" />
                    </p>
                    <br />
                    <p id="edit-form-data-life" class ="edit-form-data lifetime">
                      <span id ="lifetime-label-birth">Geboren am:</span> <input type="date" name="edit-form-data-birthdate" />
                      <span id ="lifetime-label-death">Gestorben am:</span> <input type="date" name="edit-form-data-deathdate" />
                    </p>
                    
                    <div id="epoch-select-form">
                      Die Person einer oder mehreren Epochen hinzufügen:
                      <br />
                      <select id="epoch-select" name="edit-form-epoch-select[]" multiple>
                        @foreach ($epochs as $epoch)
                        <option value="{{$epoch['id']}}"> {{$epoch['name']}} </option>

                        @endforeach
                        </option>

                      </select>

                    </div>

                    <p id="short-p" class="edit-form-data">
                      <span id="short-description">Kurzbeschreibung:</span>
                      <textarea id="textarea-short" class="edit-form-textarea" name="edit-form-data-short-description" placeholder="Geben Sie hier die Kurzbeschreibung der Persönlichkeit ein!"></textarea>
                    </p>
                  </div>

                  <div id="form-text">
                    <p id="edit-form-data-text" class="edit-form-data">
                      <input type="hidden" value="text" name="edit-form-data[0][type]" />
                      Informationen: <textarea id="form-text-edit" class="edit-form-textarea" name="edit-form-data[0][content]" placeholder="Geben Sie hier Ihren Text ein!"></textarea>
                      Index des Elements: <input id="form-data-index" name="edit-form-data[0][index]" class="edit-form-textarea" type="number" min="1" />
                      <span id="add-textbox" onclick="addTextbox('');">Weiteres Textelement hinzufügen</span>
                    </p>
                  </div>

                  <span id="label-new-epoch"> Bilder hinzufügen </span>
                  <div id="form-picture">
                    <span id="pictre-add"> Bilder der Persönlichkeit hinzufügen </span>
                  <span id="add-textbox" onclick="addPictureBox();">Bildelement hinzufügen</span>
                  </div>

                  <span id="label-new-epoch"> Videos hinzufügen </span>
                  <div id="form-video">
                    <input type="hidden" value="video" name="edit-form-data[1][type]" />
                    <p id="edit-form-data-video" class="edit-form-data">
                      Geben Sie die URL eines Videos ein: <input id="form-video-data" name="edit-form-data[1][content]" type="text" placeholder="URL des Videos" />
                    </p>
                    <span id="add-videobox" onclick="addVideoBox("");">Videoelement hinzufügen</span>
                  </div>

                  <span id="label-new-epoch"> Poster hinzufügen </span>
                  <div id="form-poster">

                    <span id="poster-label"> Poster der Persönlichkeit hinzufügen </span>
                      <input type="hidden" value="poster"  />
                    <input type="file" name="form-poster-data" accept="*.pdf" />
                  </div>

                  <button id="submit-button" class="edit-form-data buttons" type="submit" text="Absenden">Änderungen speichern</button>
                </form>
              </div>
            </div>
        </div>
        <script language="javascript" type="text/javascript" src="/js/johannes_admin-edit.js"></script>

        <script>
        /*
        var string = '[{"id":1,"name":"Test"},{"id":2,"name":"Test2"}]';
        var epochs = JSON.parse(string);


        var eId = epochs[0]['name'];

        //alert(eId);
        */
        </script>
    </body>
</html>
