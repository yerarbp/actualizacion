<?php  session_start();
include "conexion.php";

		$idusuario=$_SESSION['usuario'][0]['id'];
		if($idusuario!=''){
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

<?php include "menud.php";
$bandera=false;?> 
<div class="container">
  <h3 align="center" class="let"> Principal </h3><br><br>
    <!-- BUSCADOR-->
  <div class="container-fluid" >

      <div class="col-lg-4 sidenav">
      <div class="input-group">
        <form method="get" action="">
         
                 
        </form>
              
      </div>
      </di>
      </div>
                  	
      </div
  
      

  <br>   
  
 
  
  
</body>
</html>