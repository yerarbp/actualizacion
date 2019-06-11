<?php session_start(); 
  include ("conexion.php");
  $idusuario=$_SESSION['usuario'][0]['id'];
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
 
    
    if(($idusuario!='') && ($nivelp==2)) {
    } 
    else{ 
    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
    }

    
   
    
?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title>MÓDULOS REGISTRADOS</title>
  <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        


</head>
<style type="text/css">
  .letra{
    font-size: 18px;
    text-align: left;
  }
  .let{
    font-size: 30px;
    font: italic; 
  }
  </style>
  <script >
  $(document).ready(function() {
    $('#sirfe').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'excel', 'print'
        ]
    } );
} );

  </script>
<body style="width: auto;">

<?php include "menud.php";
 
          ?> 

   <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

  <h3 align="center" class="let"> MÓDULOS REGISTRADOS </h3>

    <div class="col-sm-12 sidenav" align="right">
      <a href="capturarmodulo.php"><button type="button"  class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-file"></span> Nuevo
      </button></a> 
  </div>

    <div class="row">
      <div class="col-md-4">

      </div>
  <!--<div class="col-md-4">
    <div style="text-align: center;"> *REMESA </DIV>
     <select name="remesa" class="form-control" rows="1">
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

        
                  $sql3 =("select * from remesa where fechainicio BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'".";");
                    $query = $con -> query($sql3);
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idremesa].'">'.$valores[idremesa].'</option>';
                        }
                    ?>
  </select>
  </div>

  <div class="col-md-4">
    <br>
    <input type="submit" class="btn btn-success btn-default"  name="buscar" id="buscar" value="GENERAR REPORTE">-->
    
  </div>
</div>
<br>
  


  <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">
        <thead>
            <tr style="color:#FFFFFF;">
                <th>Módulo </th>
                <th>Distrito </th>
                <th >Tipo de Módulo </th>
                <th>Horario de Atención </th>
                <th>Entidad </th>
                <th>Dirección </th>
                <th >Configuración </th>
                <th>Situación del Módulo</th>
                <th>Total de Equipos </th> 
                <th>Actualizar Módulo </th>
                <th>Eliminar Módulo</th>

               
            </tr>
        </thead>
        <tr>

        <?php
          include "conexion.php";
           

         $sql="select * from modulo;";

          $rs = $con->query($sql);
          if($rs){
              while ($fila = $rs->fetch_object()){
              $idmodulo=$fila->idmodulo;
              /////////////////col 1
              $sql="select * from modulo where idmodulo=$idmodulo;";
                $query = $con->query($sql);
                $r=$query->fetch_array();

                $idmodulo=$r["idmodulo"];
                $tipomodulo=$r["tipomodulo"];
                $horarioinicio=$r["horainicio"];
                $horariocierre=$r["horacierre"];
                $entidad=$r["entidad"];
                $direccion=$r["direccion"];
                $configuracion=$r["configuracion"];
                $act=$r["activo"];
                if($act==0){
                  $activo="Activo";

                }else{
                  $activo="No Activo";
                }

                ////////////////////////////////////////////////
                $equipos=$r["totalequipos"];
                $iddistrito=$r["distrito_iddistrito"];

                $sql3="select * from distrito where iddistrito=$iddistrito;";
                $query = $con->query($sql3);
                 $r=$query->fetch_array();
                 $distrito=$r["nombredistrito"];
                 ///////////////////////////////////////


                 echo "<td>".utf8_encode($idmodulo)."</td>";
                 echo "<td>".utf8_encode($distrito)."</td>";


                 echo "<td>".utf8_encode ($tipomodulo)."</td>";
                 echo "<td>".utf8_encode($horarioinicio)." a "."$horariocierre"."</td>";
                 echo "<td>".utf8_encode ($entidad)."</td>";
                echo "<td>".utf8_encode ($direccion)."</td>";
                 echo "<td>".utf8_encode($configuracion)."</td>";
                 echo "<td>".utf8_encode ($activo)."</td>";
                 echo "<td>".utf8_encode ($equipos)."</td>";
                 
                
          ?>
              <td> <a href="editarmod.php?x=<?php echo $fila->idmodulo?>"> <img src="img/actualizar.png" style="height: 30px;"></a> </td>
              <td><a href="eliminarmod.php?x=<?php echo $fila->idmodulo?>"><img src="img/eliminar.png" style="height: 30px;"></a></td>            
                
          </tr>

              <?php }
              mysqli_free_result($rs);
          }

              ?> 

    </table>
   <div class="row">
    <div class="col-md-3 col-md-offset-6">
                                     
                  
    
    </div>
    </div>

  </form>  
<br>
  
  <?php include "piepagina.php"; ?>


</body>
</html>