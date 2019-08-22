<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

    <title>Inicio al sistema</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/signin.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<body style="background:#FFFFFF;">

  <div class="container" align="center">
	<div class="logo" align="center"><img src="img/INE.JPG" width="200" height="200"></div>
    <h2 class="form-signin-heading">Actualización del Padrón Electoral de Atención Ciudadana</h2>
    <h2 class="form-signin-heading"></h2>
      <form class="form-signin role="form" name="login" action="login.php" method="post"">
      
        <h4 class="form-signin-heading">Ingrese al sistema </h4>
        <label for="inputEmail" class="sr-only">Ingresa usuario</label>
        <input type="text" id="Ingresausuario" name="nombre" class="form-control" placeholder="Ingresa usuario" required autofocus style="text-align:center";>
        <br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control"  name="contra" placeholder="Password" required style="text-align:center";>
        <div class="checkbox">
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

        
      </form>

    </div> <!-- /container -->
<br>
   <?php include "piepagina.php"; ?>   
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
