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
   $con->set_charset('utf8');
    
     if(( $_POST['nombre']!= '')&& ( $_POST['numero']!= '')){ 
    $iddistrito=$_POST['numero'];
          
        $nombre=$_POST['nombre'];
       

      $sql="select min(iddistrito) as minimo from distrito";
        $query = $con->query($sql);
        $r=$query->fetch_array();
        $idminimo=$r["minimo"];

        if($idminimo==0){

          //insertar el guardar.

        }else{

        $sql =("select * from distrito");
          $ban=0;
          $igual=0;
                     $rs = $con->query($sql);
                      if($rs){
                      while ($fila = $rs->fetch_object()){
                     // echo "el distrito capturado es:";
                    $distritonombre=$fila->nombredistrito;
                      if($distritonombre==$nombre){
                    
                           // echo "SON IGUALES";
                            
                                $igual++;
                                
                            }

              

                    }
                  }

                

               if($igual>=1){
                
                 echo "<script>alert('El distrito que intenta registrar ya se encuentra capturado');window.location='distritos.php';</script>";

               }else{
                
                $sql3 =("INSERT INTO distrito (iddistrito, nombredistrito) 

                     VALUES ('$iddistrito','$nombre');");
                    
                    $query1 = $con -> query($sql3);

                    echo "<script>alert('Se ha registrado un nuevo distrito!');window.location='distritos.php';</script>";

               }
  
             }

      }else{
         echo "<script>alert('Algunos campos no han sido llenados');</script>";
      }
      
 }




    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.png">

        <title>REGISTRO DE PERSONAL </title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/signin.css" rel="stylesheet" type="text/css">
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
         .let{
            font-size: 30px;
            font: italic;}
    </style>
    <body>
         <?php include "menud.php"; ?>
       
        <h3 align="center">Registro de Distritos </h3>
        <h6 align="center"> Use mayusculas, sin acentos </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                <label>*</label><label for="nombre">Núm del Distrito </label>
                <input type="text" class="form-control" id="numero" name="numero" style="text-align:center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                <label>*</label><label for="nombre">Nombre del Distrito </label>
                <input type="text" class="form-control" id="nombre" name="nombre" style="text-align:center;">
                       
                </div> 

             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="distritos.php" class="btn btn-success" role="button">CANCELAR</a>


            </form>
            

        </div>
        <?php include "piepagina.php"; ?> 
<script type="text/javascript">
  
$(document).ready(function () {
  $('#mostrar_contrasena').click(function () {
    if ($('#mostrar_contrasena').is(':checked')) {
      $('#contraseña').attr('type', 'text');
    } else {
      $('#contraseña').attr('type', 'password');
    }
  });
});


</script>
    </body>
</html>


