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
    $idmodulo=$_GET['x'];   
       $con->set_charset('utf8');
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


        $sql3= "UPDATE modulo SET idmodulo = '$modulo', tipomodulo = '$tipomodulo', horainicio = '$horarioinicio', horacierre = '$horariocierre', entidad = 30, direccion = '$direccion', configuracion = '$configuracion',activo = '$situacion', totalequipos = '$totalequipos', distrito_iddistrito = '$distrito'

          WHERE (idmodulo = '$idmodulo');";
        mysqli_set_charset($con,'utf8'); // para que acepte los acentos al momento de actualizar :)
        $query1 = $con -> query($sql3);
         echo "<script>alert('Los datos se han actualizado correctamente');window.location='Modulosl.php';</script>";




      
 }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

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
          <?php include "menud.php"; 
         $idmodulo=$_GET['x'];
         $sql="SELECT * FROM modulo where idmodulo=$idmodulo";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
              $modulo=$fila->idmodulo;
              $tipomodulo=$fila->tipomodulo;
              $horainicio=$fila->horainicio;
              $horacierre=$fila->horacierre;
              $direccion=$fila->direccion;
              $configuracion=$fila->configuracion;
              $activo=$fila->activo;
              $totalequipos=$fila->totalequipos;
              $iddistrito=$fila->distrito_iddistrito;

                           
              }
          }


         ?>
       
        <h3 align="center">Editar Módulo </h3>
        <h6 align="center"> x </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                
                <label>*</label><label for="nombre">Módulo</label>
                <input type="text" class="form-control" id="modulo" name="modulo" style="text-align:center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ value="<?php echo utf8_encode($modulo);?>"> 
                <label>*</label><label for="nombre">Tipo de Módulo</label>
                <select class="form-control" id="tipomodulo" name="tipomodulo">
                 <?php
                      $s6="F";
                      $s5="FA";
                      $s4="M";
                      $s3="S";
                      $s2="SF";
                      $s1="UI";

                    if($tipomodulo=="F"){
                      echo "<option>". $s6. "</option>";
                      echo "<option>". $s5. "</option>";
                      echo "<option>". $s4. "</option>";
                      echo "<option>". $s3. "</option>";
                      echo "<option>". $s2. "</option>";
                      echo "<option>". $s1. "</option>";
                    }elseif ($nivelp=="FA") {
                      echo "<option>". $s5. "</option>";
                      echo "<option>". $s6. "</option>";
                      echo "<option>". $s4. "</option>";
                      echo "<option>". $s3. "</option>";
                      echo "<option>". $s2. "</option>";
                      echo "<option>". $s1. "</option>";                     
                    } elseif ($nivelp=="M") {
                      echo "<option>". $s4. "</option>";
                      echo "<option>". $s6. "</option>";
                      echo "<option>". $s5. "</option>";
                      echo "<option>". $s3. "</option>";
                      echo "<option>". $s2. "</option>";
                      echo "<option>". $s1. "</option>";
                      
                    } elseif ($nivelp=="S") {
                      echo "<option>". $s3. "</option>";
                      echo "<option>". $s6. "</option>";
                      echo "<option>". $s5. "</option>";
                      echo "<option>". $s4. "</option>";
                      echo "<option>". $s2. "</option>";
                      echo "<option>". $s1. "</option>";
                     
                    }elseif ($nivelp=="SF") {
                      echo "<option>". $s2. "</option>";
                      echo "<option>". $s6. "</option>";
                      echo "<option>". $s5. "</option>";
                      echo "<option>". $s4. "</option>";
                      echo "<option>". $s3. "</option>";
                      echo "<option>". $s1. "</option>";

                    
                    }else{
                      echo "<option>". $s1. "</option>";
                      echo "<option>". $s6. "</option>";
                      echo "<option>". $s5. "</option>";
                      echo "<option>". $s4. "</option>";
                      echo "<option>". $s3. "</option>";
                      echo "<option>". $s2. "</option>";
                    }

                    ?>

                                  
                </select>
                

                <label>*</label><label for="nombre">Horario de Inicio </label>
                <input type="time" class="form-control" id="horarioinicio" name="horarioinicio" style="text-align:center;" value="<?php echo utf8_encode($horainicio);?>">
                <label>*</label><label for="nombre">Horario de Cierre </label>
                <input type="time" class="form-control" id="horariocierre" name="horariocierre" style="text-align:center;" value="<?php echo utf8_encode($horacierre);?>">

                <label>*</label><label for="nombre">Entidad </label>
                <input type="text" class="form-control" id="entidad" name="entidad" style="text-align:center;" placeholder="Veracruz" disabled="">
                <label>*</label><label for="nombre">Dirección Actual </label>
                <input type="text" class="form-control" id="direccion" name="direccion" style="text-align:center;" value="<?php echo utf8_encode($direccion);?>">
                <label>*</label><label for="nombre">Configuración </label>
                <input type="text" class="form-control" id="configuracion" name="configuracion" style="text-align:center;"value="<?php echo utf8_encode($configuracion);?>">
                <label>*</label><label for="nombre">Total de equipos </label>
                <input type="text" class="form-control" id="totalequipos" name="totalequipos" style="text-align:center;" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  value="<?php echo utf8_encode($totalequipos);?>">

                <label>*</label><label for="nombre">Situación del Módulo</label>
                <select class="form-control" id="situacion" name="situacion">
                   <?php
                      $s1="Activo";
                      $s2="Inactivo";
                  
                    if($activo==0){
                      echo "<option value='0'>". $s1. "</option>";
                      echo "<option value='1'>". $s2. "</option>";
                    
                    }else {
                      echo "<option value='1'>". $s2. "</option>";
                      echo "<option value='0'>". $s1. "</option>";
                    

                    } 

                    ?>


                </select>
                
                <label>*</label><label for="nombre">Distrito Asignado </label>
                
                 <select class="form-control" id="distrito" name="distrito">
                   
                      <?php
                      
                        $sql4 =("select * from distrito where iddistrito=$iddistrito");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>
                        <?php
                         $sql =("select * from distrito WHERE iddistrito!=$iddistrito");
                         $query = $con->query($sql);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                          echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                   ?>

fd
                    
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


