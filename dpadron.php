<?php session_start(); 
  include ("conexion.php");
  $idusuario=$_SESSION['usuario'][0]['id'];
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
 
    
    if(($idusuario!='') && ($nivelp==2) || ($idusuario==38)) {
    } 
    else{ 
    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
    }

    if($_POST['buscar']){
            $mes=$_POST['mes'];
            setlocale(LC_ALL,"es_MX.UTF-8");
          $año= date('Y');
           $fechai=$año."-".$mes."-"."01";
           $fechaf=$año."-".$mes."-"."28";
           $criterio=" where fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf."'";
            $criterio2=" and fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf."'";
                    

    }

    
?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title>Registro de la descarga y acuses del padrón</title>
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
            'pdf', 'print'
        ]
    } );
} );

  </script>
<body style="width: auto;">

<?php if($idusuario==38){
  include "menue.php";
}else{
  include "menud.php";
}
 
 ?> 

   <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">



  <h3 align="center" class="let"> Descarga del Padrón y Acuses </h3>
   <h5 align="center"></h5>
   <br>
<div class="row" style="padding: 1px; margin: 3px;">
  <div class="col-md-5">
    <label>*</label> <label for="nombre">Mes: </label>
    <select id="mes" name="mes" class="form-control" rows="1">
     <option value="0">Seleccione </option>
     <option value="01">Enero </option>
     <option value="02">Febrero </option>
     <option value="03">Marzo </option>
       <option value="04">Abril </option>
     <option value="05">Mayo</option>
     <option value="06">Junio</option>
     <option value="07">Julio </option>
     <option value="08">Agosto </option>
     <option value="09">Septiembre </option>
       <option value="10">Octubre </option>
     <option value="11">Noviembre</option>
     <option value="12">Diciembre</option>

   </select>
  </div>
</div>

   <div class="col-sm-8 sidenav" align="center">
      
     <input type="submit" class="btn btn-success btn-lg"  name="buscar" id="buscar" value="BUSCAR">
      
         
       <input type="submit" name="restaurar" class="btn btn-success btn-lg"  value="RESTAURAR"> 

  </div>
 </div>
</div>

    <div class="row">
      <div class="col-md-4">

      </div>
  
  </div>
</div>
<br>
  

  <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">


        <thead>
            <tr style="color:#FFFFFF;">
                <th>Fecha de descarga</th>
                <th>NUM</th>
                <th>Distrito</th>
                <th>Acuse de Descarga del Padrón </th>
                <th>Padrón Descargado </th>
                <th>Fecha de carga de acuses</th>
                <th> Actualización del Padrón</th>
                <th> Borrado de Memorias</th>
            </tr>
        </thead>
        <tr>

        <?php
          include "conexion.php";

     $sql= "select * from padron".$criterio;
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){

              $idusuario=$fila->encargadoRM_idencargadoRM;
              $reporte1=$fila->ruta1;
              $dpadron=$fila->dpadron;
              $fecha=$fila->fecha;


            $sql="select distrito_iddistrito from distrito_encargado where encargadorm_idencargadorm=$idusuario;";
                $query = $con->query($sql);
                 $r=$query->fetch_array();
                
                $iddistrito=$r["distrito_iddistrito"];
             
             $sql="select * from distrito where iddistrito=$iddistrito;";
                $query = $con->query($sql);
                 $r=$query->fetch_array();
                 $nombredistrito=$r["nombredistrito"];

              echo "<td>".$fecha."</td>";
              echo "<td>".$iddistrito."</td>";
              echo "<td>".$nombredistrito."</td>";
            ////////////////////////////////////////////////////////////////////////////////////////////////////
              if($reporte1!=''){ 
                ?>

                <td> SI</td>
           
             <?php
             }else{
              ?>
              <td> NO </td>
           

              <?php

              }


               if($dpadron==1){ 
                ?>

                <td> SI</td>
           
             <?php
             }else{
              ?>
              <td> NO </td>
           

              <?php

              }



           $sql= "select * from padronf where encargadoRM_idencargadoRM=$idusuario". $criterio2;
                  $query = $con->query($sql);
                 $r=$query->fetch_array();
                 $reporte2=$r["ruta1"];
                 $reporte3=$r["ruta2"];
                 $fecha1=$r["fecha"];
                 $fecha2="SIN REGISTRO";
                 if($fecha1!=''){
                   echo "<td>".$fecha1."</td>"; 
                 }else{
                      echo "<td>".$fecha2."</td>";
                 }
            
                 if($reporte2!=''){
                   ?>

                <td> SI</td>
               
             <?php
             }else{
              ?>
              <td> NO </td>
           

              <?php
             }


             if($reporte3!=''){
                   ?>

                <td> SI</td>
               
             <?php
             }else{
              ?>
              <td> NO </td>
           

              <?php
             }
           
           
    ?>

                
          </tr>
              <?php }
              mysqli_free_result($rs);
            

              
          }

              ?> 

  
</table>
</form>  
<br>
  
 <footer style="background-color: black;
  position:relative;
  bottom: 0;
  width: 100%;
  height: 40px;
  background-color:#ECF0F1; color:#17202A">
  
  <?php include "piepagina.php"; ?>
 </footer> 


</body>
</html>