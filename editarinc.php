<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
    
		if(($idusuario!='')&& ($nivelp==2)){
		} 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}

           
if($_POST['guardar']){
    $idincidencia=$_GET['x']; 
   $con->set_charset('utf8');
    
     if( $_POST['codigo']!= '' &&  $_POST['nombre']!= '' ){    
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];

        $sql3= ("UPDATE  incidencias  set codigo = '$codigo', incidencias = '$nombre' WHERE (idincidencias = '$idincidencia');");

                  mysqli_set_charset($con,'utf8'); // para que acepte los acentos al momento de actualizar :)
                    $query1 = $con -> query($sql3);
                    echo "<script>alert('Los datos se han actualizado correctamente');window.location='incidenciasl.php';</script>";
       
     }


}

    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

        <title>REGISTRO DE INCIDENCIAS </title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/signin.css" rel="stylesheet" type="text/css">
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://momentjs.com/downloads/moment.min.js"></script>
    </head>
    <style type="text/css">
         .let{
            font-size: 30px;
            font: italic;}
    </style>
    <body>
        <?php include "menub.php";
         $idincidencias=$_GET['x'];
          $sql="SELECT * FROM incidencias where idincidencias= $idincidencias";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
                $codigo=$fila->codigo;
                $nombre=$fila->incidencias;             
             }
          }


         ?>
       
        <h3 align="center">Registro de Incidencias </h3>
        <h6 align="center"> Ingrese los datos correspondientes </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                
                <label>*</label><label for="nombre">Código de Incidencia </label>
                 <input type="text" class="form-control" id="codigo" name="codigo" style="text-align:center;"  onkeypress='return event.charCode >= 8 && event.charCode <= 57 '/ value="<?php echo utf8_encode($codigo);?>">

                <label>*</label><label for="nombre">Nombre de la Incidencia</label>
                <input type="text" class="form-control" name="nombre" id="nombre"  style="text-align:center;" value="<?php echo utf8_encode($nombre);?>">

                
                </div> 

             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="incidenciasl.php" class="btn btn-success" role="button">CANCELAR</a>


            </form>
            

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


