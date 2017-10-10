<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Base</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/johannes_admin.css">
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
              <div id="site-title-wrapper">
                  <span id="site-title-label">Settings</span>
              </div>
          </div>
            <div id="site-content">
              <div id="edit-form-wrapper">
                <span id="label-new-person"> Neue Person anlegen </span>
                <form id="edit-form"  method="post">
                  <p id="edit-form-data-name" class="edit-form-data">
                    Name: <input class="edit-form-textarea" type="text" />
                  </p>
                  <div id="form-text">
                    <p id="edit-form-data-text" class="edit-form-data">
                      Informationen: <textarea class="edit-form-textarea" name="edit-form-data[]" placeholder="Geben Sie hier Ihren ein!">
                      </textarea>
                      Index des Elements: <input id="form-data-index" class="edit-form-textarea" type="number" min="1" />
                      <span id="add-textbox" onclick="addTextbox();">Weiteres Textelement hinzufügen</span>
                    </p>
                  </div>
                  <button id="submit-button" class="edit-form-data" type="submit" text="Absenden">Absenden</button>
                </form>
              </div>
            </div>
        </div>
          <script language="javascript" type="text/javascript" src="/js/johannes_admin-edit.js"></script>
    </body>
</html>
