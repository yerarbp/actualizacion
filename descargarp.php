<?php  

session_start();
include "conexion.php";
		$idusuario=$_SESSION['usuario'][0]['id'];
    $nivelp=$_SESSION['nivelp'][0]['nivelp'];
     setlocale(LC_ALL,"es_MX.UTF-8");
           $fecha= date('Y-m-d');

    $sql="select count(*) as cont from padron where fecha='$fecha' and encargadoRM_idencargadoRM=$idusuario;";
       $query = $con->query($sql);
        $r=$query->fetch_array();
        $encontrado=$r["cont"];



		if(($idusuario!='') && ($nivelp==3) && ($encontrado>=1)){
		?>
    <?php
      	} 

		else{
		    print "<script>alert('Acceso restringido y/o ha registrado los acuses'); window.location='index.php';</script>";
	
		}

    
		?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title> DESCARGAR PADRÓN ELECTORAL  </title>
  <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">
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
  .titulog{
 
font-family:Arial; 
font-weight:bold; 
font-size: 30px; 
color: #c431a6; 
text-shadow: -1px 0 #dee1e8, 0 1px #dee1e8, 1px 0 #dee1e8, 0 -1px #dee1e8, -2px 2px 0 #dee1e8, 2px 2px 0 #dee1e8, 1px 1px #dee1e8, 2px 2px #dee1e8, 3px 3px #dee1e8, 4px 4px #dee1e8, 5px 5px #dee1e8; 6px 6px #414D68, 7px 7px #414D68, 8px 8px #414D68, 9px 9px #414D68;
}

@media screen and (max-width: 400px) {
  footer {
    display: none;
  }}

  </style>
<body>

<?php include "menue.php";
$bandera=false;?> 
<div class="container">
  <h3 align="center" class="let"> </h3><br><br>
    <!-- BUSCADOR-->
 
      
        <form method="get" action="">
         <div class="form-group" style="width: 100%;">

                  <label>*</label> <label for="nombre" class="titulog">DESCARGUE EL PADRÓN ELECTORAL</label>
                  <BR><BR>
                  <a   href="document/VERACRUZ-1-1-6082529-49410875.txt.gz.srn" download >
                  <CENTER><img  src="img/despadron.png" alt="descargar" width="400" height="400" ></CENTER>
                  </a>
        </div>
                 
        </form>
              
 
                  	
      </div>
  
      

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