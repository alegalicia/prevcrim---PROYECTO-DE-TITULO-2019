<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
  <title>PREVCRIM</title>
  <link rel="stylesheet" href="css/video.css">
  <!--Made with love by Mutiullah Samim -->

  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
  <header class="v-header container">
    <div class="fullscreen-video-wrap">

      <video src="video/inicio.mov" autoplay="" loop="">
      </video>
    </div>
    <div class="header-overlay"></div>
    <div class="header-content text-md-center">
      <form action="../controller/acceso.php" method="post">

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
          </div>
          <input name="usuario" type="text" class="form-control" placeholder="Usuario" required maxlength="10">

        </div>
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-key"></i></span>
          </div>
          <input name="clave" type="password" class="form-control" placeholder="Contraseña" required maxlength="10">
        </div>
        <div class="form-group">
          <input id="ingresar" type="submit" value="Ingresar" class="btn float-right login_btn">
        </div>
        <img aling:center src="img/logo.png">

        <input type="hidden" name="opcion" value="login">
      </form>

      <p>SOPORTE: MESA DE AYUDA CLICK 222-22221 <BR>CORREO: CLICK@SOLOBINARY.CL</p>

    </div>
  </header>
  <div class="g-recaptcha" data-sitekey="TU CLAVE DEL SITIO AQUÍ"></div>
  <section class="section section-b">
    <div class="container">
      <h2>Copy Rigth 2019:</h2>
      <p><strong> PROYECTO TITULACIÓN: SOLOBINARY {Copy Rigth 2019: Alejandro Galicia - Patricio Tamayo}</strong> All rights
    reserved.</p>
    </div>
  </section>
</body>

</html>