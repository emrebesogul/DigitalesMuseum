<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/signup_emre.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>

      <div class="wrapper">

    		<div class="top">
    			<h1 id="title" class="hidden"><span class="highlighted">D</span>igitales <span class="highlighted">M</span>useum</h1>
        </div>

    		<div class="login-box">
    			<div class="box-header">
    				<h2>Registrieren</h2>
    			</div>
                <form action="/register" method="post">
                    {{ csrf_field() }}

                    <label for="email">E-Mail</label>
        			<br/>
        			<input type="email" name="email" required>
                    <br/>
        			<label for="name">Vor- und Nachname</label>
        			<br/>
        			<input type="text" name="name" required>
        			<br/>
        			<label for="password">Passwort</label>
        			<br/>
        			<input type="password" name="password" required>
        			<br/>
                    <label for="retyped_password">Passwort wiederholen</label>
        			<br/>
        			<input type="password" name="retyped_password" required>
        			<br/>
        			<button type="submit">Registrieren</button>
        			<br/>
                    <a href="/login"><p class="small">Haben Sie schon einen Account? Log In >></p></a>
                </form>


    		</div>
    	</div>


    </body>
</html>
