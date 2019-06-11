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
    $idusuario=$_GET['x'];
    $idunion=$_GET['y'];      
                    
        $nivelp=$_POST['nivelp'];
        $grado=$_POST['grado'];
       $nombre=$_POST['nombre'];
        $apaterno=$_POST['apaterno'];
        $amaterno=$_POST['amaterno'];
        $sexo=$_POST['sexo'];
       if ($sexo=="Masculino"){
        $sex='M';

       }else{
        $sex='F';
       }

       
        $cel=$_POST['cel'];
        $correo=$_POST['correo'];
       $usuario=$_POST['usuario'];
       
   $contra=$_POST['contraseña'];
   
       $modulo=$_POST['modulo'];
       $distrito=$_POST['distrito'];

       $sql3= ("UPDATE  encargadorm  set nivelp = '$nivelp', nombre = '$nombre', apaterno = '$apaterno', amaterno = '$amaterno', sexo = '$sex', celular = '$cel', correo = '$correo', usuario = '$usuario', contrasena = '$contra', grado_idgrado = '$grado' WHERE (idencargadoRM = '$idusuario');");

                  mysqli_set_charset($con,'utf8'); // para que acepte los acentos al momento de actualizar :)

                    $query1 = $con -> query($sql3);
              if($idunion==null){
                //No hacer nada..

              }else{
                $sql3=("UPDATE distrito_encargado SET distrito_iddistrito='$distrito',modulo_idmodulo='$modulo' WHERE (id='$idunion')");
                mysqli_set_charset($con,'utf8'); // para que acepte los acentos al momento de actualizar :)
                $query1 = $con -> query($sql3);

              }

                    echo "<script>alert('Los datos se han actualizado correctamente');window.location='usuarios.php';</script>";

            
            
 }
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="conten-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

        <title>EDITAR DATOS DE ENCARGADOS </title>

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
        
        <?php include "menub.php";
         $idusuario=$_GET['x'];
         $idunion=$_GET['y'];

          $sql="SELECT * FROM encargadoRM where idencargadoRM=$idusuario";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
                $nivelp=$fila->nivelp;
                $nombre=$fila->nombre;
                $apaterno=$fila->apaterno;
                $amaterno=$fila->amaterno;
               $sexo=$fila->sexo;
                $celular=$fila->celular;
                $correo=$fila->correo;
                $usuario=$fila->usuario;
                $contraseña=$fila->contrasena;
                $modulo=$fila->modulo_idmodulo;
                $distrito=$fila->distrito_iddistrito;
                $grado=$fila->grado_idgrado;
              }
          }


         ?>
        
        <h3 align="center">Actualización de los datos de los encargados</h3>
        <h6 align="center"> Ingrese los datos correspondientes </h6>


        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
                  <label>*</label> <label for="nombre">Nivel de privilegios:</label>

                  <select name="nivelp"  name="nivelp" class="form-control" rows="5" style="text-align:center;" ondblclick="Mostrart();">
                     <?php
                     $s3="Vocal";
                      $s2="Administrador";
                      $s1="Encargado Distrital";
                      $s="Encargado RM";
                      if ($nivelp==3) {

                           echo "<option value='3'>". $s3. "</option>";
                      echo "<option value='2'>". $s2. "</option>";
                      echo "<option value='1'>". $s1. "</option>";
                      echo "<option value='0'>". $s. "</option>";

                   }elseif($nivelp==2){


                      echo "<option value='2'>". $s2. "</option>";
                      echo "<option value='3'>". $s3. "</option>";
                      echo "<option value='1'>". $s1. "</option>";
                      echo "<option value='0'>". $s. "</option>";

                      //echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                    }elseif ($nivelp==1) {
                    
                      echo "<option value='1'>". $s1. "</option>";
                      echo "<option value='2'>". $s2. "</option>";
                       echo "<option value='3'>". $s3. "</option>";
                      echo "<option value='0'>". $s. "</option>";

                    } else{
                    
                      echo "<option value='0'>". $s. "</option>";
                      echo "<option value='2'>". $s2. "</option>";
                      echo "<option value='3'>". $s3. "</option>";
                      echo "<option value='1'>". $s1. "</option>";
                    }
                    ?>

                   
                    
                   </select>

                   
                    <label>*</label> <label for="nombre">Grado de Estudios</label>
                  <select name="grado" class="form-control" rows="5">
                   <?php
                    $sql =("select * from grado where idgrado=$grado");
                         $query = $con->query($sql);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idgrado].'">'.utf8_encode($valores[grado]).'</option>';

                            }
                   ?>
                    <?php
                    $sql =("select * from grado WHERE idgrado!=$grado");
                         $query = $con->query($sql);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idgrado].'">'.utf8_encode($valores[grado]).'</option>';

                            }
                   ?>

                    
                   </select>
                

                <label>*</label><label for="nombre">Nombre o Nombres </label>
                <input type="text" class="form-control" id="nombre" name="nombre" style="text-align:center;" value="<?php echo utf8_encode($nombre);?>">

                <label>*</label><label for="nombre">Apellido Paterno </label>
                <input type="text" class="form-control" id="apaterno" name="apaterno" style="text-align:center;" value="<?php echo utf8_encode($apaterno);?>">

                <label>*</label><label for="nombre">Apellido Materno </label>
                <input type="text" class="form-control" id="amaterno" name="amaterno" style="text-align:center;" value="<?php echo utf8_encode($amaterno);?>">


                <label>*</label><label for="distrito">Sexo</label>
                
                <select name="sexo" class="form-control" rows="5">
                <?php

                if($sexo=="M"){
                  $valor="Masculino";
                  $valor2="Femenimo";
                  echo "<option>" .$valor. "</option>";
                  echo "<option>" .$valor2. "</option>";

                }else{
                  $valor="Femenimo";
                  $valor2="Masculino";
                  echo "<option>" .$valor. "</option>";

                  
                }
                ?>
                

                </select>

                <label>*</label><label for="nombre">Número de celular </label>
                <input type="text"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  class="form-control" id="cel" name="cel" style="text-align:center;" value="<?php echo $celular;?>">

                <label>*</label><label for="nombre">Correo electronico </label>
                <input type="email" placeholder="sophie@ine.mx" class="form-control" id="correo" name="correo" style="text-align:center;" value="<?php echo utf8_encode($correo);?>">


                <label>*</label><label for="nombre">Usuario para ingresar al sistema </label>

                <input type="text" class="form-control" id="usuario" name="usuario" style="text-align:center;" value="<?php echo utf8_encode($usuario);?>">

                <label>*</label><label for="nombre">Ingrese contraseña </label>
                
                <input type="password" class="form-control" id="contraseña" name="contraseña" style="text-align:center;" value="<?php echo utf8_encode($contraseña);?>">

                <div class="col">
       
            <input  type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
          &nbsp;&nbsp;Mostrar Contraseña
           </div>
          <?php
          if($idunion==null){
              print "<script>alert('No ha asignado Distrito y/o Módulo, solo se muestran algunos datos');</script>";

          }else{  ?>
            <label>*</label><label for="tipomodulo">Distrito Asignado </label>

                     <select id="distrito" name="distrito" class="form-control" rows="5" style="text-align:center;">
                      <?php

                      $sql="select * from distrito_encargado where id=$idunion";
                      $query = $con->query($sql);
                      $r=$query->fetch_array();
                     $distrito=$r["distrito_iddistrito"];
                     $modulo=$r["modulo_idmodulo"];


                    $sql4 =("select * from distrito where iddistrito=$distrito");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[iddistrito].'">'.utf8_encode($valores[nombredistrito]).'</option>';

                            }
                        ?>

                        <?php
                      
                        $sql4 =("select * from distrito where iddistrito!=$distrito");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[iddistrito].'">'.utf8_encode($valores[nombredistrito]).'</option>';

                            }
                        ?>

                        </select>

                         <label>*</label><label for="tipomodulo"> Módulo Asignado </label>
                    
                     <select id="modulo" name="modulo" class="form-control" rows="5" readonly="readonly">
                      
                       <?php
                       if($modulo==0){
                        $s="NO APLICA MÓDULO";
                         echo "<option value='0'>". $s. "</option>";

                       }else{

                       $sql4 =("select * from modulo where idmodulo=$modulo");
                       $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.utf8_encode($valores[idmodulo]).'</option>';

                            }                        
                       
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

          <?php
          }

          ?>
   
                       
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


