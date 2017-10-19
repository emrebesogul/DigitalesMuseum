<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login - Digitales Museum</title>

        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,900" rel="stylesheet">

        <link rel="stylesheet" href="/css/login_emre.css">
        <link rel="stylesheet" href="/fonts/elegant_font.css">
    </head>
    <body>

      <div class="wrapper">

    		<div class="top">
    			<h1 id="title" class="hidden"><span class="highlighted">D</span>igitales <span class="highlighted">M</span>useum</h1>
            </div>

    		<div class="login-box">
    			<div class="box-header">
    				<h2>Log In</h2>
    			</div>

                <form action="/login" method="post">
                    {{ csrf_field() }}

                    <label for="email">E-Mail</label>
        			<br/>
        			<input type="email" name="email" required>
        			<br/>
        			<label for="password">Passwort</label>
        			<br/>
        			<input type="password" name="password" required>
        			<br/>
        			<button type="submit">Log In</button>
        			<br/>
                    <a href="/register"><p class="small">Noch kein Account? Sign Up >></p></a>
                </form>

    		</div>
    	</div>


    </body>
</html>
