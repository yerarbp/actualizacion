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
    
     if( $_POST['modulo']!= ''){    
        $modulo=$_POST['modulo'];
        $tipomodulo=$_POST['tipomodulo'];
        $horarioinicio=$_POST['horarioinicio'];
        $horariocierre=$_POST['horariocierre'];
        $entidad=30;
        $direccion=$_POST['direccion'];
        $configuracion=$_POST['configuracion'];
        echo"El total de equipos son:";
        echo $totalequipos=$_POST['totalequipos'];
        echo "<BR>";
        echo "La situacion actual es:";
        echo $situacion=$_POST['situacion'];

        ECHO "EL DISTRITO ES:";
        ECHO $distrito=$_POST['distrito'];
        ECHO "<BR>";


        echo $sql="select count(*) as minimo from modulo";
        $query = $con->query($sql);
        $r=$query->fetch_array();
        echo $idminimo=$r["minimo"];

        if($idminimo==0){

          //insertar el guardar.

        }else{

          echo $sql =("select * from modulo");
          $ban=0;
          $igual=0;
                     $rs = $con->query($sql);
                      if($rs){
                      while ($fila = $rs->fetch_object()){
                      echo "el modulo capturado es:";
                      echo $idmodulo=$fila->idmodulo;
                      if($idmodulo==$modulo){
                    
                            echo "SON IGUALES";
                            
                                $igual++;
                                
                            }

              

                    }
                  }

                

               if($igual>=1){
                
                 echo "<script>alert('El Módulo que intenta registrar ya se encuentra capturado');window.location='#';</script>";

               }else{
                
              

            

            ECHO $sql3 =("INSERT INTO modulo (idmodulo, tipomodulo, horainicio, horacierre, entidad, direccion, configuracion, activo, totalequipos, distrito_iddistrito) VALUES ('$modulo','$tipomodulo','$horarioinicio','$horariocierre',30,'$direccion','$configuracion','$situacion','$totalequipos','$distrito');");
                    
                    $query1 = $con -> query($sql3);

                    echo "<script>alert('Se ha registrado un nuevo Distrito!');window.location='Modulosl.php';</script>";

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
       
        <h3 align="center">Registro de Módulos </h3>
        <h6 align="center"> x </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                
                <label>*</label><label for="nombre">Módulo</label>
                <input type="text" class="form-control" id="modulo" name="modulo" style="text-align:center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ placeholder="Entidad,Distrito,Num: 30xxxx">
                <label>*</label><label for="nombre">Tipo de Módulo</label>
                <select class="form-control" id="tipomodulo" name="tipomodulo">
                  <option> Seleccione: </option>
                    <option> F </option>
                    <option >FA </option>
                    <option >M</option>
                    <option >S</option>
                    <option >SF</option>
                    <option >UI</option>
                  
                </select>
                

                <label>*</label><label for="nombre">Horario de Inicio </label>
                <input type="time" class="form-control" id="horarioinicio" name="horarioinicio" style="text-align:center;">
                <label>*</label><label for="nombre">Horario de Cierre </label>
                <input type="time" class="form-control" id="horariocierre" name="horariocierre" style="text-align:center;">

                <label>*</label><label for="nombre">Entidad </label>
                <input type="text" class="form-control" id="entidad" name="entidad" style="text-align:center;" placeholder="Veracruz" disabled="">
                <label>*</label><label for="nombre">Dirección Actual </label>
                <input type="text" class="form-control" id="direccion" name="direccion" style="text-align:center;">
                <label>*</label><label for="nombre">Configuración </label>
                <input type="text" class="form-control" id="configuracion" name="configuracion" style="text-align:center;" placeholder="B+1">
                <label>*</label><label for="nombre">Total de equipos </label>
                <input type="text" class="form-control" id="totalequipos" name="totalequipos" style="text-align:center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  placeholder="2">
                <label>*</label><label for="nombre">Situación del Módulo</label>
                <select class="form-control" id="situacion" name="situacion">
                  <option> Seleccione: </option>
                  <option value="0" >Activo </option>
                    <option value="1"> Inactivo </option>
                </select>
                
                <label>*</label><label for="nombre">Distrito Asignado </label>
                
                 <select class="form-control" id="distrito" name="distrito">
                   <option value="0">Seleccione:</option>
                      <?php
                      
                        $sql4 =("select * from distrito");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>
                </select>
                       
                </div> 

             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="Modulosl.php" class="btn btn-success" role="button">CANCELAR</a>

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


