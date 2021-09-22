// Llamar los resultados desde FB.getLoginStatus().
function statusChangeCallback(response) {  
    console.log('statusChangeCallback');
// Actual estado del usuario
    console.log(response);     
// Logearse dentro de la página de Facebook             
    if (response.status === 'connected') {   
      testAPI();  
    } else {    
// Mensaje en caso de no estar logeado
      document.getElementById('status').innerHTML = 'Usted debe dar click sobre el botón de Facebook ' +
        'para acceder a su cuenta.';
    }
  }

// Llamar cuando una persona esta finalizando con un boton de login
  function checkLoginState() {               
    FB.getLoginStatus(function(response) { 
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '891008314818281',
      cookie     : true,            // Habilitación de cookies para la sesión
      xfbml      : true,            // Convertir plugins
      version    : 'v11.0'  // Versión de la API
    });

// Llamar después de que el JS SDK se inicializa.
    FB.getLoginStatus(function(response) {   
      statusChangeCallback(response);
    });
  };
 
// Testing Graph API después del login. 
  function testAPI() {                     
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Gracias por loguearse, usuario: ' + response.name + '!';
    });
  }
