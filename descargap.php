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

        $acuse1=$_FILES["acuse1"]["name"];
        $ruta=$_FILES["acuse1"]["tmp_name"];
        $destino="document/acuses/actaentrega/".$acuse1;
        $ext = pathinfo( $acuse1, PATHINFO_EXTENSION);
        $allowed =  array('pdf','PDF');
        if((!in_array($ext,$allowed))){
           
           echo "<script>alert('El Docuneto no tiene el formato PDF solicitado y/o no ha asignado ningún archivo');</script>";
        }else{
          move_uploaded_file($ruta,$destino);
          //move_uploaded_file($ruta2,$destino2); 
        $sql =("INSERT INTO padron (fecha, hora, ruta1, encargadoRM_idencargadoRM) VALUES('$fecha','$hora','$destino', '$idusuario');");

            $query1 = $con -> query($sql);
            echo "<script>alert('Los registros se han guardado con éxito!');window.location='descargarp.php';</script>";


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
    
    <body>
         <?php include "menue.php"; ?>

         
        <h3 align="center">Padrón Electoral</h3>
        <h6 align="center"> Los archivos adjuntos deberan contener la siguiente estructura en el nombre
        30DISTRITO-DIAMESAÑO-ENTREGA PADRON(300X-110619-ENTREGAPADRON) </h6>
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

              <div class="form-group" style="width: 50%;">
             <label for="nombre">Acta de entrega, recepción y devolución del Padrón
                   Electoral del Registro Federal de Electores</label>
                  <a class="form-control" href="document/ACUSE.docx" download>
                  <img  src="img/dowload.png" alt="descargar" width="30" height="30" >
                  </a>

                  <br> <br>

              <label for="entidad">Adjunte Acuse PDF del Acta de entrega, recepción y devolución del Padrón
                  Electoral del Registro Federal de Electores:</label>
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


