<?php session_start(); 
  include ("conexion.php");
  $idusuario=$_SESSION['usuario'][0]['id'];
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
 
    
    if(($idusuario!='') && ($nivelp==1)) {
    } 
    else{ 
    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
    }

    
?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title>INCIDENCIA SEMANAL </title>
  <link rel="icon"   type ="image/PNG" href="img/INE2.png">
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



    
    var table = $('#sirfe').DataTable();
 
    new $.fn.dataTable.Buttons( table, {
     
        buttons: [
            'copy',
            {
                extend: 'excel',
                

            }  


        ]

       
    } );
    
 
    table.buttons( 0, null ).container().prependTo(
        table.table().container()
    );
} );;



               
      

  </script>


      
       

<body style="width: auto;">

<?php include "menuc.php";
  $idusuario=$_SESSION['usuario'][0]['id'];
   $sql="select * from encargadorm where idencargadoRM=$idusuario;";

          $query = $con->query($sql);
          $r=$query->fetch_array();

          $iddistrito=$r["distrito_iddistrito"];
  
          ?> 

   <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

  <h3 align="center" class="let"> INFORME DE INCIDENCIAS PRESENTADAS EN EL FUNCIONAMIENTO DE LOS MAC </h3>
   
   <br>

    <div class="row">
      <div class="col-md-4">

      </div>
  
  </div>
</div>
<br>
  

  <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">


        <thead>

            <tr style="color:#FFFFFF;">
               <th>DISTRITO</th>
                <th>MÓDULO</th>
                <th>TÍPO</th>
                <th>CONFIGURACIÓN</th>
                <th>HABÍLITADO SI/NO</th>
                <th>TIPO DE INCIDENCIA</th>
                <th>DÍA O PERIODO DE LA INCIDENCIA</th>
                <th>CASO CAU</th>
                <th>DESCRIPCIÓN DE LA PROBLEMATICA</th>
                <th>SOLUCIÓN O SITUACIÓN ACTUAL</th>
                <th>CÓMO Y CUÁNDO SE SOLUCIONÓ LA INCIDENCIA</th>
                <th>TIEMPO EN QUE PARO EL MÓDULO</th>
                
            </tr>
        </thead>

        <tr>

        <?php
          include "conexion.php";
          $mes=date('m');
          $año=date('Y');
         $contador=1;
         $i=1;
         $datos = array();

        $sql= "select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario ";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
            
           $iddistrito=$fila->distrito_iddistrito;
           $datos[$i] = $iddistrito;
          
             $contador++;
             $i++;
           
    }   
   mysqli_free_result($rs);
  foreach ($datos as $dato);
  } 

 for ($i=1; $i<$contador;$i++){
  
    $iddistrito= $datos[$i];
   setlocale(LC_ALL,"es_MX.UTF-8");
           $fechaH= date('Y-m-d');
          $dias = array(" ","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
          
          $dial = $dias[date('N', strtotime($fechaH))];

          if($dial=="Lunes"){
           
             $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 6 days")); 
          //resto 1 día
            $fechai=$fechaH;         
     

          }elseif ($dial=="Martes") {
       
         $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 5 days")); 
          //resto 1 día
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 1 days")); 
         

          //echo $sql= "select * from reported ". $criterio. "where fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'"." ORDER BY fecha desc".";";

          }elseif ($dial=="Miércoles") {
         
         $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 4 days")); 
          //resto 1 día
         $fechai=date("Y-m-d",strtotime($fecha_actual."- 2 days")); 
   

          }elseif ($dial=="Jueves") {
           

          $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 3 days")); 
          //resto 1 día
         $fechai=date("Y-m-d",strtotime($fecha_actual."- 3 days")); 
       
          }elseif ($dial=="Viernes") {
          

            $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 2 days")); 
          //resto 1 día
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 4 days")); 
         

          }elseif ($dial=="Sábado") {
           
        $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 
          //resto 1 día
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 5 days")); 
       

          }elseif ($dial=="Domingo") {
          
          $fechaf=$fechaH; 
          //resto 1 día
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 6 days")); 
          
          }

          
   $iddistrito= $datos[$i];
 echo $sql="select * from reporteincidencias where distrito_iddistrito=$iddistrito and  fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'"." and validado=1" .$criterio; ECHO "<BR>";


    $rs = $con->query($sql);
          if($rs){

             while ($fila = $rs->fetch_object()){
               $id=$fila->idincidencias;
              $idremesa=$fila->remesa_idremesa;
              $idmodulo=$fila->modulo_idmodulo;
              $iddistrito=$fila->distrito_iddistrito;


$sql="select * from distrito where iddistrito=$iddistrito;";
                $query = $con->query($sql);
                 $r=$query->fetch_array();
                $nombredistrito=$r["nombredistrito"];
                 echo "<td>".$nombredistrito."</td>";
$sql2="select * from modulo where idmodulo=$idmodulo";
              
              $query = $con->query($sql2);
              $r=$query->fetch_array();
              $modulo=$r["idmodulo"];
              $tipomodulo=$r["tipomodulo"];
              $configuracion=$r["configuracion"];
              echo "<td>".$modulo."</td>";
               $mo+=1;
              echo "<td>".$tipomodulo."</td>";
              echo "<td>".$configuracion."</td>";

$sql="select * from reporteincidencias where idincidencias=$id;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $inhabilitado=$r["inhabilitado"];
                $incidencias_idincidencias=$r["incidencias_idincidencias"];
                $fecha=$r["fecha"];
                $cao=$r["cao"];
                $descripcion=$r["descripcion"];
                $solucion=$r["solucion"];
                $como=$r["como"];
                $tiempo=$r["tiempo"];
                $justifique=$r["justifique"];
              
if($inhabilitado==1){
     echo "<td>"."MÓDULO NO INHABILITADO". "</td>";
                      
}else{
    echo "<td>". "MÓDULO INHABILITADO"."</td>";
}

$sql="select * from incidencias where idincidencias=$incidencias_idincidencias;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $incidencias=$r["incidencias"];
                 echo "<td>".$incidencias."</td>";

 echo "<td>".$fecha."</td>";
 echo "<td>".$cao."</td>";
 echo "<td>".$descripcion."</td>";
 echo "<td>".$solucion."</td>"; 
 echo "<td>".$como."</td>";
 echo "<td>".$tiempo." ; ". $justifique. "</td>";   


  ?>

                
          </tr>


              <?php 
              }
              mysqli_free_result($rs);
            

              
          }

            

              
          

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