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
    
     if( ($_POST['nivelp']!='')  && ($_POST['nombre']!= '') && ($_POST['apaterno']!= '')){    
                
                    
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
        //$modulo=$_POST['modulo'];
       // $distrito=$_POST['distrito'];
        /////////////////////
     
                $sql3 =("INSERT INTO encargadoRM (nivelp, nombre,apaterno,amaterno,sexo,celular,correo,usuario,contrasena,grado_idgrado) 


                     VALUES ('$nivelp','$nombre','$apaterno','$amaterno','$sex', 
                     '$cel','$correo','$usuario','$contra','$grado');");
                    

                    $query1 = $con -> query($sql3);

                    echo "<script>alert('Se ha registrado a un nuevo usuario!');window.location='usuarios.php';</script>";


            
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
         <br>
        <h3 align="center">Registro de Encargados</h3>
        <h6 align="center"> Ingrese los datos correspondientes </h6>


        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
                  <label>*</label> <label for="nombre">Nivel de privilegios:</label>

                  <select name="nivelp" class="form-control" rows="5" style="text-align:center;">
                    <option> Seleccione:</option>

                     <option value="2"> Administrador </option>
                     <option value="3"> Vocal </option>
                     <option value="1">Técnico </option>
                     <option value="0">Encargado RM </option>

                  
                   </select>

                    <label>*</label> <label for="grado">Grado de Estudios</label>
                  <select name="grado" id="grado" class="form-control" rows="5">
                    <option value="0">Seleccione:</option>
                    
                    <?php
                       $sql4 =("select * from grado");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idgrado].'">'.$valores[grado].'</option>';

                            }
                        ?>

                   </select>
                

                <label>*</label><label for="nombre">Nombre o Nombres </label>
                <input type="text" class="form-control" id="nombre" name="nombre" style="text-align:center;">

                <label>*</label><label for="nombre">Apellido Paterno </label>
                <input type="text" class="form-control" id="apaterno" name="apaterno" style="text-align:center;">

                <label>*</label><label for="nombre">Apellido Materno </label>
                <input type="text" class="form-control" id="amaterno" name="amaterno" style="text-align:center;" >


                <label>*</label><label for="distrito">Sexo</label>
                <select name="sexo" class="form-control" rows="5" readonly="readonly">
                <option>Seleccione:</option>
                <option >Masculino </option>
                <option >Femenino </option>
                </select>

                <label>*</label><label for="nombre">Número de celular </label>
                <input type="text"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  class="form-control" id="cel" name="cel" style="text-align:center;">

                <label>*</label><label for="nombre">Correo electronico </label>
                <input type="email" placeholder="sophie@ine.mx" class="form-control" id="correo" name="correo" style="text-align:center;">


                <label>*</label><label for="nombre">Usuario para ingresar al sistema </label>

                <input type="text" class="form-control" id="usuario" name="usuario" style="text-align:center;">

                <label>*</label><label for="nombre">Ingrese contraseña </label>
                
                <input type="password" class="form-control" id="contraseña" name="contraseña" style="text-align:center;">

                <div class="col">
       
            <input  type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
          &nbsp;&nbsp;Mostrar Contraseña
           </div>
          




                       
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


