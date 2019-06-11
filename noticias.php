<?php session_start(); 
  include ("conexion.php");
  $idusuario=$_SESSION['usuario'][0]['id'];
    if($idusuario!=''){
    } 
    else{ 
    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
    }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

     
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Anuncios</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet" type="text/css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <link href="bootstrap/css/carousel.css" rel="stylesheet">
  </head>
 <!--EMPIEZA LA BARRA DE NAVEGACIÓN-->
<body>
 
  
<?php include "menu.php"; ?>       
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-sile-to="3"></li>
        <li data-target="#myCarousel" data-sile-to="4"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/anuncios/1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1> Firma SEGOB convenio de publicaciones entre Editora de Gobierno y Tribunal Electoral de Veracruz.</h1>
              <p></p>
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/anuncios/2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>En el Día del Policía Veracruzano, se reconoce el esfuerzo y dedicación de los elementos estatale </h1>
              <p></p>
             
            </div>
          </div>
        </div>
        
          <div class="item">
          <img class="second-slide" src="img/anuncios/3.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Toman protesta a infantes y adolescentes seleccionados para participar permanentemente en el SIPINNA</h1>
              <p></p>
             
            </div>
          </div>
        </div>
        
          

           
        <div class="item">
          <img class="third-slide" src="img/anuncios/4.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1> Estrena Veracruz el programa La Sinfónica en mi Escuela</h1>
              
              <p> </p>
              
            </div>
          </div>
        </div>
      </div>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    <!--FOOTER-->
        <?php include "piepagina.php"; ?>   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    
    
   
</body>
</html>