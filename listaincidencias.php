<?php  session_start();
include "conexion.php";

		$idusuario=$_SESSION['usuario'][0]['id'];
		if($idusuario!=''){
		?>
    <?php
      	} 

		else{
		    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
	
		}

  
		?>

 
<!DOCTYPE html>
<html>
<head>
  <title>Lista de Incidencias </title>
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
<body>

<?php include "menub.php";
$bandera=false;?> 
<div class="container">
  <h3 align="center" class="let"> REGISTRO DE LAS INCIDENCIAS OCURRIDAS </h3><br><br>
    <!-- BUSCADOR-->
  <div class="container-fluid" >

      <div class="col-lg-4 sidenav">
      <div class="input-group">
        <form method="get" action="">
              
      </form>
              
      </div>
      </div>                     	
      </div>
      </div>
  </div>

   <div class="col-sm-12 sidenav" align="right">
      <a href="capturarincidenc.php"><button type="button"  class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-file"></span> Nuevo
      </button></a> 
  </div>
  <br><br>

  
  </div><br>
  
  
  <div align="center">
  <form id="pagina" name="pagina" method="get" action="">
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="azul" width="35%">FECHA REGISTRADA </th>
          
          <th class="azul" width="25%">REMESA </th>
          <th class="azul" width="25%">PROBLEMA </th>

          <th class="azul" width="10%">VISTA PREVIA</th>
        </tr>
      </thead>
      <tr>

      <?php
      include "conexion.php";
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


          $sql= "select * from reporteincidencias where fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'"." AND encargadoRM_idencargadoRM=$idusuario ORDER BY fecha desc".";";
      $rs = $con->query($sql);
      if($rs){
         while ($fila = $rs->fetch_object()){
           $fec=$fila->fecha;
              $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
              $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
               $dial = $dias[date('N', strtotime($fec))];
               //list( $ano, $mes, $dia ) = split( '[/.-]', $fec);
               list($ano, $mes, $dia ) = preg_split('[-]', $fec);  

              echo "<td>". $dial.",". ($dia)." de ".$meses[$mes-1]. " del ".$ano . "</td>";

          $id=$fila->idincidencias;
          $id2=$fila->incidencias_idincidencias;
          $idremesa=$fila->remesa_idremesa;

         $sql3="select * from remesa where idremesa=$idremesa;";

          $query = $con->query($sql3);
          $r=$query->fetch_array();
          $nombreremesa=$r["idremesa"];

        echo "<td>".$nombreremesa."</td>";


        $sql2="select incidencias from remesas.incidencias inner join remesas.reporteincidencias
on remesas.incidencias.idincidencias=$id2;";

          $query = $con->query($sql2);
          $r=$query->fetch_array();
          $incidencias=$r["incidencias"];
        echo "<td>". utf8_encode ($incidencias)."</td>";

      
  
      ?>

        <td><a href="mostrarincidencias.php?id=<?php echo $fila->idincidencias?>"><img src="img/vp.png" height="30" width="30"></a></td>


        </tr>  
      <?php }
      mysqli_free_result($rs);
      }

     

      ?> 
  </table>

      

    
  <div class="col-sm-0"></div>
    </div>

  <br>   
  
  <?php include "piepagina.php"; ?>
  
  
</body>
</html>