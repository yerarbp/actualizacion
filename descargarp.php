<?php  

session_start();
include "conexion.php";
		$idusuario=$_SESSION['usuario'][0]['id'];
    $nivelp=$_SESSION['nivelp'][0]['nivelp'];
     setlocale(LC_ALL,"es_MX.UTF-8");
           $fecha= date('Y-m-d');
           $año=date('Y');
           $mes=date('m');

         


    $sql="select count(*) as cont from padron where MONTH(fecha) = $mes  and Year(fecha)=$año and encargadoRM_idencargadoRM=$idusuario;";
       $query = $con->query($sql);
        $r=$query->fetch_array();
        $encontrado=$r["cont"];




		if(($idusuario!='') && ($nivelp==3) && ($encontrado>=1)){
		?>
    <?php
      	} 

		else{
		    print "<script>alert('Acceso restringido y/o no ha registrado el Acta de Descarga de Padrón Electoral  ); window.location='index.php';</script>";
	
		}


 if($_POST['guardar']){ 

      $dpadron=$_POST['estatus']; 
       $mes=date('m');


       $sql="select idpadron from padron where  MONTH(fecha) = $mes and Year(fecha)=$año  and encargadoRM_idencargadoRM=$idusuario";
       $query = $con->query($sql);
        $r=$query->fetch_array();
        $idpadron=$r["idpadron"];


      $sql="UPDATE padron  SET dpadron = $dpadron WHERE (idpadron = '$idpadron')";
       $query1 = $con -> query($sql);


       print "<script>alert('La primera etapa ha concluido correctamente'); window.location='principal2.php';</script>";
      

     }
     



    
		?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title> DESCARGAR PADRÓN ELECTORAL  </title>
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
  <h3 align="center" class="let"> </h3>
    <!-- BUSCADOR-->
 
      
          <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

         <div class="form-group" style="width: 100%;">
              
                <CENTER> <label for="nombre" class="titulog">DESCARGUE EL PADRÓN ELECTORAL</label> </CENTER>
                  <BR><BR>
                  <a   href="document/padron/VERACRUZ-1-1-6095238-4067889126.txt.gz.srn" download >
                  <CENTER><img  src="img/despadron.png" alt="descargar" width="300" height="300" ></CENTER>
                  </a>

                  <br> <br><br>
                  <CENTER><div id="blink">! ESTATUS DE LA DESCARGA DEL PADRÓN ELECTORAL !</div> </CENTER>
                  
        <fieldset>
        <div style=" border-style: solid;
  border-color: red; margin:9px; padding:4px;">
        <center><legend>SELECCIONE UNA OPCIÓN</legend></center>
        <H4><input type="radio" name="estatus" value="0" checked>   <B> NO CONCLUIDO:</B>   ES EL VALOR INICIAL, E INDICA QUE EL ARCHIVO SE ENCUENTRA EN PROCESO DE DESCARGA <br></H4>
        <H4><input type="radio" name="estatus" value="1">   <B> CONCLUIDO:  </B>  CUANDO EL ARCHIVO HAYA TERMINADO DE DESCARGAR Y COINCIDA EL TAMAÑO EN KB CON EL ACTA DE DESCARGA (posteriormente, dar clic en guardar) <br></H4>
        <br>
        
    </fieldset>
    </div>              
              

              
                   
        </div>

          <div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5"> <input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR"></div>
        <div class="col-lg-2"></div>
    </div>
</div>
            
                 
        </form>
              
 
                  	
      </div>
  
      

  <br>   
  
  <footer style="background-color: black;
  position:relative;
  bottom: 0;
  width: 100%;
  height: 40px;
  background-color:#ECF0F1; color:#17202A">
  
  <?php include "piepagina.php"; ?>
 </footer> 
 <script type="text/javascript">
  window.setInterval (BlinkIt, 2000);
  var color = "red";

  function BlinkIt () {
    var blink = document.getElementById ("blink");
    color = (color == "#ffffff")? "red" : "#ffffff";
    blink.style.color = color;
    blink.style.fontSize='20px';
  }
</script>
  
  
  
</body>
</html>