<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
    
		if(($idusuario!='')&& ($nivelp==3)){
    } 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}


    if($_POST['guardar']){

        setlocale(LC_ALL,"es_MX.UTF-8");
           $fecha= date('Y-m-d');
           $hora= date('H:i:s');
          $mes=date('m');

        $acuse1=$_FILES["acuse1"]["name"];
        $ruta=$_FILES["acuse1"]["tmp_name"];
        $destino="document/acuses/actaentrega/".$acuse1;
        $ext = pathinfo( $acuse1, PATHINFO_EXTENSION);
        $allowed =  array('pdf','PDF');
        if((!in_array($ext,$allowed))){
           
           echo "<script>alert('El Documento no tiene el formato PDF solicitado y/o no ha asignado ningún archivo');</script>";
        }else{

        
       $sql3="select count(idpadron) as contador from padron where MONTH(fecha) = $mes  AND YEAR(NOW()) and encargadoRM_idencargadoRM=$idusuario; ";
                $query = $con->query($sql3);
                $r=$query->fetch_array();
                $contador=$r["contador"];

        if($contador<1){
             move_uploaded_file($ruta,$destino);
              //move_uploaded_file($ruta2,$destino2); 
               $sql =("INSERT INTO padron (fecha, hora, ruta1, encargadoRM_idencargadoRM,dpadron) VALUES('$fecha','$hora','$destino', '$idusuario',0);");
               $query1 = $con -> query($sql);
               echo "<script>alert('Los registros se han guardado con éxito!');window.location='descargarp.php';</script>";


        }else{
        echo "<script>alert('Ya se ha registrado el Acuse de Entrega Recepción de este periodo');window.location='principal2.php';</script>";
        }

    
        }
}
?>

<!DOCTYPE>

 <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">
        <title>DESCARGA DEL PADRÓN ELECTORAL </title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/signin.css" rel="stylesheet" type="text/css">
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
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
  }
}
    </style>
    <body>
         <?php include "menue.php"; ?>

         <BR>
       
                <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

              <div class="form-group" style="width: 60%;">
                
         <h3 align="center" class="titulog">PADRÓN ELECTORAL </h3> <br>
             <label for="nombre">Descargue Acta de Descarga de Padrón Electoral </label>
             <br>

            <?php
              $sql3="select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario";
                $query = $con->query($sql3);
                $r=$query->fetch_array();
           $distrito=$r["distrito_iddistrito"];

           $liga="document/actas/".$distrito.".pdf"; 

            ?>
      

          <a  href=" <?php echo $liga ?>" download>
                  <img  src="img/dowload.png" alt="descargar" width="50" height="50" >
                  </a>

                  <!--<a  href="document/Acta de Descarga de Padron Electoral.docx" download>
                  <img  src="img/dowload.png" alt="descargar" width="80" height="80" >
                  </a>-->


                  <br> <br><br><br>

              <label for="entidad">Adjunte Acuse PDF del Acta de Descarga de Padrón Electoral</label>

               <h6 align="center"> Nombre: 30DD-MES-AÑO(30DD-06-2019) </h6>
                  <input class="form-control" type="file" id="acuse1" name="acuse1">

            <br>
               

               <input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="principal2.php" class="btn btn-success" role="button">CANCELAR</a>
          </div>
          </form>

        </div>

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


