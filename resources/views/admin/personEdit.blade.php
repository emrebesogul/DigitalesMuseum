<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Eine Person bearbeiten - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/johannes_admin_edit.css">
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
                <span id="label-new-person"> Eine Person bearbeiten </span>
                <form id="edit-form" action="/admin/person/{{ $id }}/update" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div id="mandatory-field">
                    <div class="form-profile-picture">
                        @if($portrait_filename == null)
                            <div id="profile-picture-preview" style="background-color: white; overflow: visible;">
                                <span class="icon_profile" style="font-size:140px; color: #333"/>
                            </div>
                        @else
                            <div id="profile-picture-preview">
                                <img src="/storage/people/portraits/{{ $portrait_filename }}" widht="140px" height="140px">
                            </div>
                        @endif

                      <span id="profile-picture">Der Persönlichkeit ein anderes Portät zuweisen:</span>

                      <input id="form-profile-picture-data" class="form-profile-picture" type="file" name="edit-form-data-profile-picture" size="80px" accept="image/*" />
                    </div>
                    <p id="edit-form-data-name" class="edit-form-data">
                      Name:* <input class="edit-form-textarea" name="edit-form-data-name" type="text" placeholder="Geben Sie den Namen der Person ein!" value={{ $name }} />
                    </p>
                    <p id="edit-form-data-location" class="edit-form-data">
                      Ort: <input class="edit-form-textarea" name="edit-form-data-location" type="text" placeholder="Geben Sie den Ort der Person ein!" value="{{ $location }}" />
                    </p>
                    <p id="edit-form-data-life" class ="edit-form-data lifetime">
                      <span id ="lifetime-label-birth">Geboren am:*</span> <input type="date" name="edit-form-data-birthdate" value={{ $birthday }} />
                      <span id ="lifetime-label-death">Gestorben am:</span> <input type="date" name="edit-form-data-deathdate" value={{ $date_of_death }} />
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
                      <textarea id="textarea-short" class="edit-form-textarea" name="edit-form-data-short-description" placeholder="Geben Sie hier die Kurzbeschreibung der Persönlichkeit ein!">{{ $short_description }}</textarea>
                    </p>
                  </div>

                  <div id="uploaded-text">

                  </div>
                  <div id="form-text">

                  </div>
                  <span id="label-new-epoch"> Bilder hinzufügen </span>
                  <div id="show-uploaded-pictures">
                    @foreach ($pictures as $picture)
                    <div id="uploaded-pics" style="background-size:cover; background-image: url(/storage/people/pictures/{{$picture['filename']}})">
                    </div>
                    @endforeach

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
                  <span id="label-new-epoch"> Videos hinzufügen </span>
                  <div id="show-uploaded-vids">

                  </div>

                  <div id="form-video">
                    <span id="video-add"> Videos der Persönlichkeit hinzufügen </span>
                    <span id="add-videobox" onclick="addVideoBox('');">Videoelement hinzufügen</span>
                  </div>

                  <span id="label-new-epoch"> Poster hinzufügen </span>
                  Bisherige Poster der Person werden hier angezeigt:
                  <br />

                  <a id="poster-link"  href="/storage/people/posters/{{$poster_filename}}"><span class="icon_documents"></span> Poster Download</a>

                  <div id="form-poster">
                    <span id="poster-label"> Poster der Persönlichkeit hinzufügen </span>
                      <!--<span id="add-posterbox" onclick="addPosterBox();"> Posterelement hinzufügen</span> -->
                      <input type="hidden" value="poster"  />
                    <input type="file" name="form-poster-data" accept=".pdf" />

                  </div>

                  <button id="submit-button" class="edit-form-data buttons" type="submit" text="Absenden">Änderungen speichern</button>
                </form>
              </div>
            </div>
        </div>
        <script language="javascript" type="text/javascript" src="/js/johannes_admin-edit.js"></script>
        <script>

          @foreach ($texts as $text)
            addTextbox("{{$text['content']}}", {{$text['text_index']}});
          @endforeach

          @foreach ($videos as $video)
            addVideoBox("{{$video['url']}}");
          @endforeach
        </script>
    </body>
</html>
