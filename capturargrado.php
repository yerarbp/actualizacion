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
    
     if( $_POST['grado']!= ''){    
        $grado1=$_POST['grado'];
        $sql="select count(*) as minimo from grado";
        $query = $con->query($sql);
        $r=$query->fetch_array();
         $idminimo=$r["minimo"];

        if($idminimo==0){

        }else{

        $sql =("select * from grado");
          $ban=0;
          $igual=0;
                     $rs = $con->query($sql);
                      if($rs){
                      while ($fila = $rs->fetch_object()){
                      $grado=$fila->grado;
                      if($grado==$grado1){
                    
                                $igual++;
                                
                            }
            
                    }
                  }

                

               if($igual>=1){
                
                 echo "<script>alert('El Grado que intenta registrar ya se encuentra capturado');window.location='grado.php';</script>";

               }else{
                
              

           $sql3 =("INSERT INTO grado (grado)  VALUES ('$grado1');");

                    $query1 = $con -> query($sql3);

                    echo "<script>alert('Se ha registrado un nuevo Grado!');window.location='grado.php';</script>";

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

        <title>REGISTRO DE UN GRADO DE ESTUDIOS </title>

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
       
        <h3 align="center">Registro grado de estudios </h3>
        <h6 align="center">  </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                
                <label>*</label><label for="nombre">Grado de Estudios</label>
                <input type="text" class="form-control" id="grado" name="grado" style="text-align:center;">

                
                       
                </div> 

             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="grado.php" class="btn btn-success" role="button">CANCELAR</a>

            </form>

        </div>
        <?php include "piepagina.php"; ?> 

 </body>
</html>


