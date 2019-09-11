<?php session_start(); 
  include ("conexion.php");
  $idusuario=$_SESSION['usuario'][0]['id'];
    
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
 
    if(($idusuario!='') && ($nivelp==1)) {
    } 
    else{ 
    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
    }

    if($_POST['buscar']){
           $iddistrito=$_POST['distrito'];
          $idmodulo=$_POST['modulo'];
          $validado=$_POST['validado'];

      if($iddistrito==0){
            if($idmodulo==0){

                if($validado==0){
                 
                }

            }


      }else{
          if($iddistrito>0)
             $criterio=" and distrito_iddistrito='$iddistrito'";
             $criterio2=" and distrito_iddistrito='$iddistrito'"; 


      }
      if($idmodulo>0){
            		$criterio3=" and modulo_idmodulo='$idmodulo'";
            		$criterio4=" and modulo_idmodulo='$idmodulo'";
            	}

       if($validado>0){
            		$criterio5=" and validado='$validado'";
            		$criterio6=" and validado='$validado'";
            	}

    }
   
    
?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title>REPORTE DE AVANCE Y VALIDACIÓN DE REPORTES </title>
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

<?php include "menuc.php";
  $idusuario=$_SESSION['usuario'][0]['id'];
  
          ?> 
   <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

  <h6 align="center" class="let"> REGISTRO DE AVANCES Y VALIDACIÓN DE REPORTES </h6>
    <!-- BUSCADOR
        <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
        -->
  
  <div class="row" style="padding: 1px; margin: 3px;">
  <div class="col-md-4">
    <label>*</label> <label for="nombre">Distrito: </label>
    <select id="distrito" name="distrito" class="form-control" rows="1">
     <option value="0">Seleccione </option>
        <?php

           $sql3="SELECT *  FROM distrito INNER JOIN distrito_encargado WHERE distrito.iddistrito = distrito_encargado.distrito_iddistrito and  encargadoRM_idencargadoRM=$idusuario;";

                          $query = $con -> query($sql3);
                       
                            while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
  ?>
  </select>
  </div>

  <div class="col-md-4">
    <label>*</label> <label for="nombre">Módulo:</label>
     <select id="modulo" name="modulo" class="form-control" rows="5">
      <option value="0">Seleccione:</option>
                                                
      </select>

       <script>
      
        $("document").ready(function(){

                  $("#distrito").change(function(){
                        var iddistrito=($("#distrito").val());
                        ///alert ($("#distrito").val());

                         $.get("mod.php",{parametro_id:iddistrito})
                                      .done(function(data){
                                        $("#modulo").html(data);

                                      })

                             })
                })
      </script>
    
    
  </div>

  <div class="col-md-4">
    <label>*</label> <label for="nombre">Validados:</label>
    <select name="validado" class="form-control" rows="1">
    <option value="0">Todos</option>
    <option value="1">Si</option>
    <option value="2">No</option>

  </select>

  </div>
</div>
 
  <div class="row" style="margin: 0px; padding: 0px;">
    <br>
  <div class="col-sm-12 sidenav" align="center">
      
     <input type="submit" class="btn btn-success btn-lg"  name="buscar" id="buscar" value="BUSCAR">
      
         
       <input type="submit" name="restaurar" class="btn btn-success btn-lg"  value="RESTAURAR"> 

  </div>
</div>
</form>
    <table class="table table-striped" style="margin: 5px;">
      <thead>
        <tr>
          <th class="azul" width="10%">FECHA REGISTRADA </th>
          <th class="azul" width="10%">DISTRITO </th>
          <th class="azul" width="5%">MÓDULO </th>
          <th class="azul" width="5%">REMESA </th>
          <th class="azul" width="10%">ENCARGADO DE MÓDULO </th>
          <th class="azul" width="9%">TIPO DE REPORTE </th>
          <th class="azul" width="9%">VALIDADO </th>
          <th class="azul" width="9%">VISTA PREVIA</th>
        </tr>
      </thead>
      <br>
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

         $contador=1;
         $i=1;
         $datos = array();

        $sql= "select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario ";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
              echo "<BR>";
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
    $sql= "select * from reported where distrito_iddistrito=$iddistrito". $criterio.$criterio3.$criterio5." and fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'"." order by modulo_idmodulo ASC, fecha asc  ;";
    $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
              $fec=$fila->fecha;
              $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
              $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
               $dial = $dias[date('N', strtotime($fec))];
               list( $ano, $mes, $dia ) = split( '[/.-]', $fec);

              echo "<td>". $dial.",". ($dia)." de ".$meses[$mes-1]. " del ".$ano . "</td>";

               $id=$fila->idreported;
               $distrito=$fila->distrito_iddistrito;
          $idremesa=$fila->remesa_idremesa;
          $idmodulo=$fila->modulo_idmodulo;
          $validar=$fila->validado;
          $nombre=$fila->encargadoRM_idencargadoRM;
          

           $sql="select *  from distrito where iddistrito=$distrito;";
         
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $dis=$r["nombredistrito"]; 
              echo "<td>".$dis."</td>";

           $sql="select *  from modulo where idmodulo=$idmodulo;";
         
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $idm=$r["idmodulo"]; 
              echo "<td>".$idm."</td>";

             $sql3="select idremesa from remesas.remesa inner join remesas.reported on remesas.reported.idreported=".$id."". " and idremesa=".$idremesa.";";
         
              $query = $con->query($sql3);
              $r=$query->fetch_array();
              $nombreremesa=$r["idremesa"]; 
              echo "<td>".$nombreremesa."</td>";


               $sql3="select * from remesas.encargadoRM where idencargadoRM=$nombre;";
               $query = $con->query($sql3);
                $r=$query->fetch_array();
                $nombre=$r["nombre"];
                $apellidop=$r["apaterno"];
                $apellidom=$r["amaterno"];
                echo "<td>".utf8_encode($nombre)." ".utf8_encode ($apellidop)." ".utf8_encode($apellidom)."</td>";



              ?>
              <td>REPORTE SIIRFE</td>
              <?php
                if ($validar==1){ ?>

                  <td><img src="img/bien.png" style="height: 30px;"></td>
              <?php
              }else{?>
                <td><img src="img/mal.png" style="height: 30px;"></td>
              <?php

                }

               ?>


        <td><a href="mostrarevidenciayreporte.php?id=<?php echo $fila->idreported?>"><img src="img/vp.png" height="30" width="30"></a></td>
</tr>  

    <?php

        }
        mysqli_free_result($rs);
      }
    




  }

    
?> 
 <tr>
         <?php
         for ($i=1; $i<$contador;$i++){
    $iddistrito= $datos[$i];

   $sql2= "select * from reporteincidencias where distrito_iddistrito=$iddistrito". $criterio2.$criterio4.$criterio6." and fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'".";";
    $rs = $con->query($sql);
      $rs = $con->query($sql2);
          if($rs){
             while ($fila = $rs->fetch_object()){
              $fec=$fila->fecha;
              $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
              $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
               $dial = $dias[date('N', strtotime($fec))];
               list( $ano, $mes, $dia ) = split( '[/.-]', $fec);

              echo "<td>". $dial.",". ($dia)." de ".$meses[$mes-1]. " del ".$ano . "</td>";
              //echo "ID REPORTE   :";
           $id=$fila->idincidencias;
            $distrito=$fila->distrito_iddistrito;
          $idremesa=$fila->remesa_idremesa;
          $idmodulo=$fila->modulo_idmodulo;
          $validar=$fila->validado;
           $nombre=$fila->encargadoRM_idencargadoRM;

 $sql="select *  from distrito where iddistrito=$distrito;";
         
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $dis=$r["nombredistrito"]; 
              echo "<td>".$dis."</td>";

           $sql="select *  from modulo where idmodulo=$idmodulo;";
         
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $idm=$r["idmodulo"]; 
              echo "<td>".$idm."</td>";

          $sql3="select * from remesa where idremesa=$idremesa";
         
              $query = $con->query($sql3);
              $r=$query->fetch_array();
              $nombreremesa=$r["idremesa"];

              echo "<td>".$nombreremesa."</td>";

            
              $sql3="select * from remesas.encargadoRM where idencargadoRM=$nombre;";
               $query = $con->query($sql3);
                $r=$query->fetch_array();
                $nombre=$r["nombre"];
                $apellidop=$r["apaterno"];
                $apellidom=$r["amaterno"];
                echo "<td>".utf8_encode($nombre)." ".utf8_encode($apellidop)." ".utf8_encode($apellidom)."</td>";
                  ?>

              <td>REPORTE INCIDENCIAS </td>
              <?php
                if ($validar==1){ ?>

                  <td><img src="img/bien.png" style="height: 30px;"></td>
              <?php
              }else{?>
                <td><img src="img/mal.png" style="height: 30px;"></td>
              <?php

                }

               ?>


        <td><a href="mostrarevidenciayreporte2.php?id=<?php echo $fila->idincidencias?>"><img src="img/vp.png" height="30" width="30"></a></td>


        </tr> 

      <?php }
      mysqli_free_result($rs);
      }
    

  }

    ?> 

   

   

  </table>
    </div>

  <br>   

  
  <?php include "piepagina.php"; ?>


</body>
</html>