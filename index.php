<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion Central</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="row"><div class="col-12 p-4"></div></div>
<div class="row">
    
    
</div>

<div class="row">
    <div class="col-sm-12 col-md-6 p-4 hvfacebook">
        <div class="card bg-black border-0 p-4" style="width: 100%;">
            <div class="card-header text-center"><h2><b>Facebook</b></h2></div>
            <div class="card-body text-center">
            <p class="card-text"><div id="status"></div></p>
            </div>
        </div>
    <div align="center">
        <fb:login-button class="fb_button" length="long" size="large" scope="public_profile,email" onlogin="checkLoginState();">
            <span class="span">Continuar con Facebook</span>
        </fb:login-button>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 p-4 hvtwitter">
        <div class="card bg-black border-0 p-4" style="width: 100%;">
            <div class="card-header text-center"><h2><b>Twitter</b></h2></div>
            <div class="card-body text-center">
            <p class="card-text"><div id="statusT">Usted debe dar click sobre el botón de Twitter
        para acceder a su cuenta.</div></p>
            </div>
        </div>
    <div align="center">
        <a id="twitter-button" length="long" size="large" class="btn btn-social btn-twitter btn_twitter">
            <i class="fa fa-twitter"></i> Continuar con Twitter
        </a>
    </div>
    </div>
</div>

<!--
    LLAMADO DE BUTTOM CON ESTILO
<div class="fb-login-button" data-width="" data-size="large" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false"></div>
-->
<!--
    LLAMADO DE BUTTOM PROPUESTO POR FACEBOOK
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
        </fb:login-button>
-->

</div>
<script>
    $('#twitter-button').on('click', function() {
        // Inicualizamos nuestro OAuth.io con el public key
        OAuth.initialize('mngOr5r_pIZSMsTbH1QHbYSCpe8');
        // Hacemos uso de popup para el OAuth
        OAuth.popup('twitter').then(twitter => {
        console.log('twitter:', twitter);
        // Regresar los datos del usuario desde oauth provider
        twitter.me().then(data => {
          console.log('data:', data);
          //alert('Twitter says your name in Twitter is: ' + data.name + " and your username is: "+ data.alias);
          document.getElementById('statusT').innerHTML = 'Gracias por loguearse, usuario: ' + data.name + " y/o alias: "+ data.alias;
        });
        twitter.get('/1.1/account/verify_credentials.json?include_email=true').then(data => {
          console.log('self data:', data);
        })    
      });
    })
</script>
<script src="facebook/facebook.js"></script>
<!-- Cargar el JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
</html>