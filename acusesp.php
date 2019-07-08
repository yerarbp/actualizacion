<?php  
session_start(); 
include "conexion.php";
	 $idusuario=$_SESSION['usuario'][0]['id'];
    $nivelp=$_SESSION['nivelp'][0]['nivelp'];
     setlocale(LC_ALL,"es_MX.UTF-8");
      $fecha= date('Y-m-d');


		if(($idusuario!='') && ($nivelp==3)){
		?>
    <?php
      	} 

		else{
		    print "<script>alert('Acceso restringido y/o ha registrado los acuses'); window.location='index.php';</script>";
	
		}


 if($_POST['guardar']){

        setlocale(LC_ALL,"es_MX.UTF-8");
           $fecha= date('Y-m-d');
           $hora= date('H:i:s');

      $sql="select max(idpadron) as maximo from padron where encargadoRM_idencargadoRM=$idusuario;";
       $query = $con->query($sql);
        $r=$query->fetch_array();
        $maximo=$r["maximo"];

        $acuse1=$_FILES["acuse1"]["name"];
        $ruta=$_FILES["acuse1"]["tmp_name"];
        $destino="document/acuses/actualizacionp/".$acuse1;
        $ext = pathinfo( $acuse1, PATHINFO_EXTENSION);

        $acuse2=$_FILES["acuse2"]["name"];
        $ruta2=$_FILES["acuse2"]["tmp_name"];
        $destino2="document/acuses/borrado/".$acuse2;
        $ext2 = pathinfo( $acuse2, PATHINFO_EXTENSION);
        $allowed =  array('pdf','PDF');

        if((!in_array($ext,$allowed)) || (!in_array($ext2,$allowed)) ){
           
           echo "<script>alert('Alguno de los Documentos no tiene el formato PDF solicitado y/o no ha asignado ningún archivo');</script>";
        }else{
          move_uploaded_file($ruta,$destino);
          move_uploaded_file($ruta2,$destino2); 

        $sql =("INSERT INTO padronf (fecha, hora, ruta1, ruta2,padron_idpadron, encargadoRM_idencargadoRM) VALUES('$fecha','$hora','$destino','$destino2','$maximo', '$idusuario');");

            $query1 = $con -> query($sql);
            echo "<script>alert('Los registros se han guardado con éxito!');window.location='principal2.php';</script>";


        }

    
        }

    
		?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title> ACUSES </title>
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
  }
}

  </style>
<body>

<?php include "menue.php";
$bandera=false;?> 

 
      <div class="container" align="center" style="border:1px solid:#C0BCBC;">
        <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
        <BR>

       

         <div class="form-group" style="width:60%;">
           <h3 align="center" class="titulog">ADJUNTE LOS ACUSES CORRESPONDIENTES </h3>
        <h6 align="center"> Los archivos son en formato PDF</h6> <br>

          <label for="entidad">Adjunte Control de Actualización del Padrón:</label>
            <h6 align="center" >Nombre: 30DD-FECHA ACTUALIZACIÓN(ddmmaa)-A  30DD-210619-A </h6> <br>
                  <input class="form-control" type="file" id="acuse1" name="acuse1">
            

                  <br> <br>

              <label for="entidad">Adjunte Acta y Evidencia de Borrado Seguro:</label>
              <h6 align="center"> Nombre: 30DD-FECHA BORRADO(ddmmaa)-B  30DD-210619-B </h6> <br>
                  <input class="form-control" type="file" id="acuse2" name="acuse2">

            <br>

               <input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="principal2.php" class="btn btn-success" role="button">CANCELAR</a>
          </div>
                 
        </form>
                  	
      </div>
  
      

  <br>   
  
  <footer style="background-color: black;
  position:absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  background-color:#ECF0F1; color:#17202A">
  
  <?php include "piepagina.php"; ?>
 </footer> 
  
  
</body>
</html>