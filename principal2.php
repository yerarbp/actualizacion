<?php  session_start();
include "conexion.php";
		$idusuario=$_SESSION['usuario'][0]['id'];
    $nivelp=$_SESSION['nivelp'][0]['nivelp'];
		if(($idusuario!='') && ($nivelp==3)){
		?>
    <?php
      	} 

		else{
		    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
	
		}

    
		?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title> </title>
  <link rel="icon"   type ="image/PNG" href="img/INE2.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
  .letra{
    font-size: 18px;
    text-align: left;
  }
  .let{
    font-size: 30px;
    font: italic; 
  }
  </style>
<body>

<?php include "menue.php";
$bandera=false;?> 
<div class="container">
  <h3 align="center" class="let">  </h3><br><br>
    <!-- BUSCADOR-->
  <div class="container-fluid" >

     
        <form method="get" action="">
          <DIV style="border-style: outset;">
          <H2 style="color:#F53309; text-align: center;"> AVISO DE CONFIDENCIALIDAD </H2>
          <BR>
         
           <article  style="text-align: justify;  font-size: 28px; margin:10px;">
             Es importante mencionar, que la información contenida este sitio es de uso exclusivo del  Instituto Nacional Electoral (INE),
             a través de los funcionarios de la Junta Local y Distrital del Registró Federal de Electores. Por lo que ÚNICAMENTE debe ser empleada para
              los fines que fue creada. La persona que haga mal uso de la misma, será acreedora a las sanciones que establece la Ley. 
           </article>
          </div>
          <br><br>
        </form>
              
     
      </div>
                  	
      </div
  
      

  <br>   
<footer style="background-color: black;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  background-color:#ECF0F1; color:#17202A">
  
  <?php include "piepagina.php"; ?>
 </footer> 
  
</body>
</html>