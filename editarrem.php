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
   $idremesa=$_GET['x'];   
   $con->set_charset('utf8');
      
        $remesa=$_POST['remesa'];
        $fechainicio=$_POST['fechainicio'];
        $fechafinal=$_POST['fechafinal'];
        $dias=$_POST['dias'];

       $sql3="UPDATE remesa SET idremesa = '$remesa', fechainicio = '$fechainicio',fechafinal = '$fechafinal', totaldias = '$dias' WHERE (idremesa = '$idremesa');";

         mysqli_set_charset($con,'utf8'); // para que acepte los acentos al momento de actualizar :)
        $query1 = $con -> query($sql3);
         echo "<script>alert('Los datos se han actualizado correctamente');window.location='remesas.php';</script>";

     

}


    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

        <title>REGISTRO DE REMESAS </title>

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
         <?php include "menud.php"; 
         $idremesa=$_GET['x'];
         $sql="SELECT * FROM remesa where idremesa=$idremesa";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
              $remesa=$fila->idremesa;
              $fechainicio=$fila->fechainicio;
              $fechafinal=$fila->fechafinal;
              $totaldias=$fila->totaldias;
                                        
              }
          }
         ?>
       
        <h3 align="center">Registro de Remesas </h3>
        <h6 align="center"> Ingrese los datos correspondientes </h6>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
  
                
                <label>*</label><label for="nombre">Número de Remesa </label>
                <input type="text" class="form-control" id="remesa" name="remesa" style="text-align:center;"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ value="<?php echo utf8_encode($remesa);?>">
                <label>*</label><label for="nombre">Fecha de inicio </label>
                <input type="date" class="form-control" name="fechainicio" id="fechainicio" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo $fechainicio;?>" style="text-align:center;">
                <label>*</label><label for="nombre">Fecha de Cierre </label>
                <input type="date" class="form-control" name="fechafinal" id="fechafinal" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo $fechafinal;?>" style="text-align:center;" onclick="fecha();"  onkeyup="fecha();">
                <label>*</label><label for="nombre">Días comprendidos </label>

                <script type="text/javascript">
                  function fecha(){
                    
                  var fecha1 = new Date(document.getElementById("fechainicio").value);
                  var fecha2 = new Date(document.getElementById("fechafinal").value);
                  //var c = fecha2 - fecha1;
                  var days = (fecha2 - fecha1)/(60 * 60 * 24 * 1000)+1; 
                 
                   document.getElementById("dias").value  = days;

                }
                  

                </script>
                <input type="text" class="form-control" id="dias" name="dias" style="text-align:center;"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ readonly="readonly" style="text-align:center;" value="<?php echo utf8_encode($totaldias);?>" >

                       
                </div> 

             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                                    
                    <a href="remesas.php" class="btn btn-success" role="button">CANCELAR</a>


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


