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
     $nombre=$_POST['nombre'];
        $modulo=$_POST['modulo'];
        $distrito=$_POST['distrito'];
    
     if( ($_POST['nombre']!='')  && ($_POST['distrito']!= '') && ($_POST['modulo']!= '')){    
         
         $sql3 =("INSERT INTO distrito_encargado (distrito_iddistrito, encargadoRM_idencargadoRM,modulo_idmodulo) 


                     VALUES ('$distrito','$nombre','$modulo');");
                    

                    $query1 = $con -> query($sql3);

                    echo "<script>alert('Se han asignado Distrito y/o Módulo !');window.location='usuarios.php';</script>";


            
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

        <title>Asignación de Distritos y Módulos </title>

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
         <br>
        <h3 align="center">Registro de Distritos y Módulos </h3>
        <h6 align="center"> </h6>


        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">

                	<label>*</label><label for="tipomodulo">Nombre del Empleado </label>
                	<select id="nombre" name="nombre" class="form-control" rows="5" style="text-align:center;">
                       <option value="0">Seleccione:</option>
                      <?php
                      
                        $sql4 =("select * from encargadorm");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.utf8_encode ($valores[idencargadoRM]).'">'.utf8_encode ($valores[nombre])." ".utf8_encode ($valores[apaterno])." ".utf8_encode($valores[amaterno]).'</option>';

                            }
                        ?>

                        </select>


                	 <label>*</label><label for="tipomodulo">Distrito Asignado </label>

                     <select id="distrito" name="distrito" class="form-control" rows="5" style="text-align:center;">
                       <option value="0">Seleccione:</option>
                      <?php
                      
                        $sql4 =("select * from distrito");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>

                        </select>


                        <script>
                            
                        $("document").ready(function(){
                                $("#distrito").change(function(){

                                     var iddistrito=($("#distrito").val());
                                      $.get("modulof.php",{parametro_id:iddistrito})
                                      .done(function(data){
                                        $("#modulo").html(data);
                                      })
                                       })
                             })
                        </script>

                     <label>*</label><label for="tipomodulo"> Módulo Asignado </label>


                     <select id="modulo" name="modulo" class="form-control" rows="5" readonly="readonly">
                      

                        </select>


                       
                </div> 

             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="usuarios.php" class="btn btn-success" role="button">CANCELAR</a>


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

