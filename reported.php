<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
    
		if($idusuario!=''){
		} 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}
    if($_POST['buscar']){

       "la remesa es :";
        $remesa=$_POST['remesa'];

       $sql3="select count(*) as valor from reported where remesa_idremesa=$remesa and encargadoRM_idencargadoRM=$idusuario;"; 
            $query = $con->query($sql3);
            $r=$query->fetch_array();
             $reported=$r["valor"];
     
        $sql2="select count(*) as valor from  reporteincidencias where remesa_idremesa=$remesa and encargadoRM_idencargadoRM=$idusuario;";
        $query = $con->query($sql2);
            $r=$query->fetch_array();
           $reporteincidencias=$r["valor"];

    }

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

        <title>Reporte semanal</title>

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
         <?php include "menub.php"; ?>
         <br>
        <h3 align="center"> REPORTE DE MOVIMIENTO REALIZADOS POR REMESA </h3>


        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <div class="form-group" style="width: 50%;">
                  <label>*</label> <label for="nombre">Remesa:</label>
                  <select name="remesa" class="form-control" rows="5">
                    <option value="0">Seleccione:</option>
                    <?php

                    
                  setlocale(LC_ALL,"es_MX.UTF-8");
          $fechaH= date('Y-m-d');
          $año=date ('Y');
          $fechaf=$año . '-'.'12'.'-'.'31';

          $dias = array(" ","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
          
          $dial = $dias[date('N', strtotime($fechaH))];

          if($dial=="Lunes"){
            $fechai=$fechaH;
          }elseif ($dial=="Martes")
          {
       
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 1 days")); 
        
          }elseif ($dial=="Miércoles") {
         
         $fechai=date("Y-m-d",strtotime($fecha_actual."- 2 days")); 
   

          }elseif ($dial=="Jueves") {
           
         $fechai=date("Y-m-d",strtotime($fecha_actual."- 3 days")); 
       
          }elseif ($dial=="Viernes") {
          
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 4 days")); 
         
          }elseif ($dial=="Sábado") {
          
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 5 days")); 
       

          }elseif ($dial=="Domingo") {
          
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 6 days")); 
          
          }

        
                    echo $sql3 =("select * from remesa where fechainicio BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'".";");
                    $query = $con -> query($sql3);
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idremesa].'">'.$valores[idremesa].'</option>';
                        }
                    ?>
                   </select>
                   <BR><BR>

                   <BUTTON><input type="submit" class="btn btn-primary" id="buscar" name="buscar"  value="BUSCAR">
                    </button>
                    <a href="listareported.php" class="btn btn-success" role="button">REGRESAR</a>

                   <BR>  <BR><BR>
                
                
                
                   <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home"> REGISTRO DE MOVIMIENTOS POR REMESA </a></li>
                
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">

                     <label for="entidad">Total de reportes SIIRFE </label>
                             <input type="text" class="form-control" id="registro" name="registro"  readonly="readonly"  value="<?php print $reported?>" style="text-align:center;">

                     <label for="entidad">Total de Incidentes </label>
                             <input type="text" class="form-control" id="registro" name="registro"  readonly="readonly" value="<?php print $reporteincidencias?>" style="text-align:center;">


                        </div>
                               
       
        </div> 
            

            </form>

        
        

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


