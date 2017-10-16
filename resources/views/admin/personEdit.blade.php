<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Base</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/johannes_admin_edit.css">
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
                <span id="welcome-message">Willkommen zurück, Johannes!</span>

                <a href="/logout" id="logout-icon">
                    <span class="icon icon_lock_alt"></span>
                </a>
            </div>
        </nav>

        <div id="content">
          <div id="site-title">
              <button id="back-button" class="edit-form-data buttons"><span id="test" class="arrow_carrot-left_alt2"></span>Zurück</button>
              <div id="site-title-wrapper">

                  <span id="site-title-label">Settings</span>
              </div>
          </div>
            <div id="site-content">
              <div id="edit-form-wrapper">
                <span id="label-new-person"> Eine Person bearbeiten </span>
                <form id="edit-form" action="/admin/person/{{ $id }}/update" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div id="mandatory-field">
                    <div class="form-profile-picture">
                      <div id="profile-picture-preview">

                      </div>
                      <span id="profile-picture">Der Persönlichkeit ein anderes Portät zuweisen:</span>
                      <label for="form-profile-picture-data" id="label-custom-pic" onchange="btnChange();" onclick="buttonSubmitClicked(event);" class="custom-file-upload">
                        Datei auswählen
                      </label>
                      <input id="form-profile-picture-data" class="form-profile-picture" type="file" name="edit-form-data-profile-picture" size="80px" accept="image/*" />
                    </div>
                    <p id="edit-form-data-name" class="edit-form-data">
                      Name: <input class="edit-form-textarea" name="edit-form-data-name" type="text" placeholder="Geben Sie den Namen der Person ein!" value={{ $name }} />
                    </p>
                    <p id="edit-form-data-location" class="edit-form-data">
                      Ort: <input class="edit-form-textarea" name="edit-form-data-location" type="text" placeholder="Geben Sie den Ort der Person ein!" value={{ $location }} />
                    </p>
                    <p id="edit-form-data-life" class ="edit-form-data lifetime">
                      <span id ="lifetime-label-birth">Geboren am:</span> <input type="date" name="edit-form-data-birthdate" value={{ $birthday }} />
                      <span id ="lifetime-label-death">Gestorben am:</span> <input type="date" name="edit-form-data-deathdate" value={{ $date_of_death }} />
                    </p>
                    <p id="short-p" class="edit-form-data">
                      <span id="short-description">Kurzbeschreibung:</span>
                      <textarea id="textarea-short" class="edit-form-textarea" name="edit-form-data-short-description" placeholder="Geben Sie hier die Kurzbeschreibung der Persönlichkeit ein!">{{ $short_description }}</textarea>
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

                  <div id="form-picture">
                    <!--<input type="hidden" value="picture" name="edit-form-data[0][type]" />-->
                    <span id="pictre-add"> Bilder der Persönlichkeit hinzufügen </span>
                    <!--
                    <p id="edit-form-data-name" class="edit-form-data">
                      Titel des Bildes: <input class="edit-form-textarea" type="text" placeholder="Geben Sie den Titel des Bildes ein!" />
                    </p>
                    <input id="form-picture-data" type="file" name="edit-form-data[0][content]" size="80px" accept="image/*" />
                    <br />
                    Index des Elements: <input id="form-data-index" name="edit-form-data[0][index]" class="edit-form-textarea" type="number" min="1" />
                  -->
                  <span id="add-textbox" onclick="addPictureBox();">Bildelement hinzufügen</span>
                  </div>
                  <button id="submit-button" class="edit-form-data buttons" type="submit" text="Absenden">Absenden</button>
                </form>
              </div>
            </div>
        </div>
        <script language="javascript" type="text/javascript" src="/js/johannes_admin-edit.js"></script>

    </body>
</html>
