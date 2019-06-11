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
    
     if( $_POST['nombre']!= ''){    
        $nombre=$_POST['nombre'];
        $finicio=$_POST['finicio'];
        $ffinal=$_POST['ffinal'];

        echo $sql3 =("INSERT INTO periodo (nombre,finicio,ffinal) 

                     VALUES ('$nombre','$finicio','$ffinal');");
                    
                    $query1 = $con -> query($sql3);

                    echo "<script>alert('Se ha registrado un nuevo periodo!');window.location='neleccion.php';</script>";


       

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
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

        <title>REGISTRO DE PROCESO ELECTORAL  </title>

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
       
        <h3 align="center">REGISTRO DE UN NUEVO PROCESO ELECTORAL </h3>
        <h6 align="center"> Ingrese el nuevo periodo a contabilizar </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                
                <label>*</label><label for="nombre"> Nombre </label>
                <input type="text" class="form-control" id="nombre" name="nombre" style="text-align:center;">
             
                <label>*</label><label for="nombre"> Fecha de Inicio </label>
                <input type="date" class="form-control" id="finicio" name="finicio" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo date("Y-m-d");?>" style="text-align:center;" >
                <label>*</label><label for="nombre"> Fecha de terminó </label>
                <input type="date" class="form-control" id="ffinal" name="ffinal" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo date("Y-m-d");?>" style="text-align:center;">
                       
                </div> 

           <input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
               
                                 
                 
            </form>

            <br> <br>


             <h3>PROCESO ELECTORAL REGISTRADOS </h3>


             
        <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">
        <thead>
            <tr style="color:#FFFFFF;">
                <th style="background: #A9A6A6; text-align: center;">Núm </th>
                <th style="background: #A9A6A6; text-align: center;">Proceso </th>
                <th style="background: #A9A6A6;text-align: center;"> Fechas que corresponde </th>
                <th style="background: #A9A6A6;text-align: center;">Eliminar Proceso </th>
            </tr>
        </thead>
        <tr>

        <?php
          include "conexion.php";
           

         $sql="select * from periodo;";

          $rs = $con->query($sql);
          if($rs){
              while ($fila = $rs->fetch_object()){
              $id=$fila->idperiodo;
              /////////////////col 1
           $sql="select * from periodo where idperiodo=$id;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $idp=$r["idperiodo"];
                $nombre=$r["nombre"];
                $fechai=$r["finicio"];
                $fechaf=$r["ffinal"];

                 echo "<td style=text-align:center>".utf8_encode($idp)."</td>";
                 echo "<td style=text-align:center>".utf8_encode ($nombre)."</td>";
                 echo "<td style=text-align:center>".utf8_encode ($fechai)." AL  ".$fechaf."</td>";
                 
                
          ?>
             
              <td style="text-align:center"><a href="eliminap.php?x=<?php echo $fila->idperiodo?>"><img src="img/eliminar.png" style="height: 30px;"></a></td>            
                
          </tr>

              <?php }
              mysqli_free_result($rs);
          }

              ?> 

    </table> 
       <a href="principal.php" class="btn btn-success" role="button">SALIR</a>
            

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>
