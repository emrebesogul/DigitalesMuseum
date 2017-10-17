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

                <div id="formular-edit">
                    <form action="/admin/user/{{$id}}/update" method="post">
                        {{ csrf_field() }}
            			<label for="name">Benutzername</label>
            			<br/>
            			<input type="text" name="name" value="{{$name}}">
            			<br/>
                        <label for="email">E-Mail</label>
            			<br/>
            			<input type="email" name="email" value="{{$email}}">
                        <br/>
            			<label for="password">Neues Passwort eingeben</label>
            			<br/>
            			<input type="password" name="password">
            			<br/>
                        <label for="is_admin">Zum Admin machen?</label>
            			<br/>
            			<input type="number" name="is_admin" min="0" max="1" value="{{$is_admin}}">
            			<br/>
            			<button type="submit">Änderungen Bestätigen</button>

                        <a href="/admin/users">
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
