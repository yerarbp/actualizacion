<?php session_start(); 
  include ("conexion.php");
  $idusuario=$_SESSION['usuario'][0]['id'];
  $nivelp=$_SESSION['nivelp'][0]['nivelp'];
 
    
    if(($idusuario!='') && ($nivelp==0)) {
    } 
    else{ 
    print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
    }

    
   
    
?>

 
	
<!DOCTYPE html>
<html>
<head>
  <title>CANTIDADES ACOMULADAS</title>
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

<?php include "menub.php";?> 

<form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

<h4 align="center" class="let"> ACOMULADOS DE REMESAS </h4>


<div style="border-style: ridge; margin: 5px; padding: 6px; border-color: #97729C;">
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
    </div>
     <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <label for="distrito">Año Anterior: </label>
      <input type="text" name="">
    </div>
    </div>

    <div class="row">
      <hr align="left" noshade="noshade" size="2" width="auto" />

      <div class="col-sm-4">
      <label for="distrito">Folio Inicial: </label>
      <input type="text" name="">
      </div>
      <div class="col-sm-4">
      <label for="distrito">Folio Final: </label>
      <input type="text" name="">
      </div>

      <div class="col-sm-4">
      <label for="distrito">Total de Folios: </label>
      <input type="text" name="">
      </div>

    </div>
   <br>
    <div class="row">
    <div class="col-sm-2">
    </div>
     <div class="col-sm-2">
    </div>

    <div class="col-sm-4">
      <label for="distrito">Año Actual: </label>
      <input type="text" name="">
       <hr align="left" noshade="noshade" size="2" width="auto" />
    </div>
    </div>


    <div class="row">
      <div class="col-sm-4">
      <label for="distrito">Folio Inicial: </label>
      <input type="text" name="">
      </div>
      <div class="col-sm-4">
      <label for="distrito">Folio Final: </label>
      <input type="text" name="">
      </div>

      <div class="col-sm-4">
      <label for="distrito">Total de Folios: </label>
      <input type="text" name="">
      </div>


  </div>




</div>

</div>

<?php

  setlocale(LC_ALL,"es_MX.UTF-8");
  $fechaH= date('Y-m-d');
  $sql3="select idremesa from remesa where fechainicio<='$fechaH' and fechafinal>='$fechaH';";
                  $query = $con->query($sql3);
                  $r=$query->fetch_array();
                  $remesaActual=$r["idremesa"];
                  $remesaAnterior=$remesaActual-1;

 $sql="select distrito_iddistrito,modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                  $query = $con->query($sql);
                  $r=$query->fetch_array();
                  $distritoactual=$r["distrito_iddistrito"];
                  $moduloactual=$r["modulo_idmodulo"];
///////////////////////////////////////////////////////////////////////////////
 $sql="select sum(totalfinal) as totalocupados, sum(folionocupados) as totalnoocupados,sum(inscripciones) as totalinscripciones,
sum(correcion) as totalcorrecion, sum(cambiodom) as totalcambiodom,sum(reposicion) as totalreposicion,
sum(coreccionddireccion) as totalcoreccionddireccion, sum(reincorporacion) as totalreincorporacion,sum(reemplazo) as totalreemplazo,
sum(cancelados) as totalcancelados, sum(rechazados) as totalrechazados,sum(curp) as totalcurp,
sum(solicitudexpedicion) as totalsolicitudexpedicion, sum(solicitudrectificacion) as totalsolicitudrectificacion,sum(demandajucion) as totaldemandajucion, sum(total) as totaltramites,
sum(actualizacion) as totalactualizacion, sum(otrotipo) as totalotrotipo,sum(importadas) as totalimportadas, sum(exportadas) as totalexportadas,
sum(entregadas) as totalentregadas, sum(anexas) as totalanexas,sum(reimpresiones) as totalreimpresiones, sum(robo) as totalrobo,
sum(retiradas) as totalretiradas, sum(sobran) as totalsobran,sum(duplicadas) as totalduplicadas, sum(reimpresion) as totalreimpresion,
sum(credevte) as totalcredevte, sum(credencialduplicadas) as totalcredencialduplicadas,sum(credencialcanjeadables) as totalcredencialcanjeadables
from reported where YEAR(NOW()) and distrito_iddistrito=$distritoactual and modulo_idmodulo=$moduloactual and $remesaAnterior<=$remesaActual";
                  $query = $con->query($sql);
                  $r=$query->fetch_array();
                  $totalocupados=$r["totalocupados"];
                  $totalnoocupados=$r["totalnoocupados"];
                  $totalinscripciones=$r["totalinscripciones"];
                  $totalcorrecions=$r["totalcorrecion"];
                  $totalcambiodom=$r["totalcambiodom"];
                  $totalreposicion=$r["totalreposicion"];
                  $totalcoreccionddireccion=$r["totalcoreccionddireccion"];
                  $totalreincorporacion=$r["totalreincorporacion"];
                  $totalreemplazo=$r["totalreemplazo"];
                  $totalcancelados=$r["totalcancelados"];
                  $totalrechazados=$r["totalrechazados"];
                  $totalcurp=$r["totalcurp"];
                  $totalsolicitudexpedicion=$r["totalsolicitudexpedicion"];
                  $totalsolicitudrectificacion=$r["totalsolicitudrectificacion"];
                  $totaldemandajucion=$r["totaldemandajucion"];
                  $totaltramites=$r["totaltramites"];
                  $totalactualizacion=$r["totalactualizacion"];
                  $totalotrotipos=$r["totalotrotipo"];
                  $totalimportadas=$r["totalimportadas"];
                  $totalexportadas=$r["totalexportadas"];
                  $totalentregadas=$r["totalentregadas"];
                  $totalanexas=$r["totalanexas"];
                  $totalreimpresiones=$r["totalreimpresiones"];
                  $totalrobo =$r["totalrobo"];
                  $totalretiradas =$r["totalretiradas"];
                  $totalsobran=$r["totalsobran"];
                  $totalduplicadas =$r["totalduplicadas"];
                  $totalreimpresion =$r["totalreimpresion"];
                  $totalcredevte =$r["totalcredevte"];
                  $totalcredencialduplicadas =$r["totalcredencialduplicadas"];
                  $totalcredencialcanjeadables =$r["totalcredencialcanjeadables"];


?>
<div style="border-style: ridge; margin: 5px; padding: 6px; border-color: #676362; background-color:#D7DBDD" ;>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <center><label for="distrito">Acomulado de la remesa pasada: </label> </center>
     <center> <input type="text" name="" value="<?php print $remesaAnterior?>" readonly="readonly" style="text-align:center"; ></center>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Módulo Activo :</label>
      <input type="text" name="" value="<?php print $moduloactual?>" readonly="readonly" style="text-align:center"; >
    </div>
     <div class="col-sm-2">
      <label for="distrito">Total Folios Ocupados :</label>
      <input type="text" name="" value="<?php print $totalocupados?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Total Folios No Ocupados :</label>
      <input type="text" name="" value="<?php print $totalnoocupados?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Inscripciones :</label>
      <input type="text" name="" value="<?php print $totalinscripciones?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Correcciones :</label>
      <input type="text" name="" value="<?php print $totalcorrecions?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Cambió Domicilio :</label>
      <input type="text" name="" value="<?php print $totalcambiodom?>" readonly="readonly" style="text-align:center";>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Reposición :</label> 
       <input type="text" name="" value="<?php print $totalreposicion?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Corrección de  Dirección:</label> 
       <input type="text" name="" value="<?php print $totalcoreccionddireccion ?>" readonly="readonly" style="text-align:center";>
    </div>

    <div class="col-sm-2">
      <label for="distrito">Reincorporación :</label>
       <input type="text" name="" value="<?php print $totalreincorporacion ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Reemplazo :</label>
      <input type="text" name="" value="<?php print $totalreemplazo ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Cancelados :</label>
      <input type="text" name="" value="<?php print $totalcancelados ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Rechazados :</label>
      <input type="text" name="" value="<?php print $totalrechazados ?>" readonly="readonly" style="text-align:center";>
    </div>
    
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">CURP :</label> <br>
      <input type="text" name="" value="<?php print $totalcurp ?>" readonly="readonly" style="text-align:center";>
    </div>
  
    <div class="col-sm-2">
      <label for="distrito">Solicitud de Expedientes :</label>
      <input type="text" name=""  value="<?php print $totalsolicitudexpedicion ?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Solicitud Rectificaciones:</label>
      <input type="text" name=""  value="<?php print  $totalsolicitudrectificacion ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Demanda de jución:</label>
      <input type="text" name=""  value="<?php print $totaldemandajucion?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Total de tramites :</label>
      <input type="text" name=""  value="<?php print $totaltramites?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credenciales iniciales día :</label>
      <?php
      $datos = array();
         $i=1;
          $sql="select count(*) as total from reported where encargadoRM_idencargadoRM=$idusuario";
          $query = $con->query($sql);
          $r=$query->fetch_array();
          $total=$r["total"];// SABER EL TOTAL DE REGISTROS QUE TIENE ASIGNADO ESE USUARIO

          $sql="SELECT * FROM reported where encargadoRM_idencargadoRM=$idusuario";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
               $id=$fila->idreported; // LOS VALORES DE LA CONSULTA, LOS GUAROD EN UN ARRRAY
           
            $datos[$i] = $id;
                
          //echo "valor tomado es: ".$datos[$i];
          $i++;
    }
    foreach ($datos as $dato);
    
  }
   $indice=$total-1;
   $reporteantes=$datos[$indice];
  

      ?>



                             <?php 
                            // buscar el ultimo id registro de los reportes para despues ocuparlo para sacar el total de credenciales disn
                            $sql3="SELECT MAX(idreported) AS idreported FROM reported where encargadoRM_idencargadoRM=$idusuario;";
                     
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                             $ultimoidreporte=$r["idreported"];
                            if($ultimoidreporte==null){
                              $ultimoidreporte=0;

                            }
                            ///////////////////////////////////////////
                        $sql3="SELECT * FROM reported where encargadoRM_idencargadoRM=$idusuario and idreported=$ultimoidreporte;";
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                           $periodoAntes=$r["periodo_idperiodo"];
    

                         $sql3="SELECT MAX(idperiodo) AS idperiodo FROM periodo;";
                              $query = $con->query($sql3);
                              $r=$query->fetch_array();
                             $periodoActual=$r["idperiodo"];
                              //echo "<br>";




                             if(($ultimoidreporte==0) || ($periodoAntes!= $periodoActual)){
                                $credencialdisponible=0;
                            } else 
                           { 

                             $sql="select credencialinidia, credencialdisponible from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idusuario." and remesas.reported.idreported=".$reporteantes." ";
                           
                            $query = $con->query($sql);
                            $r=$query->fetch_array();

                          $credencialinidia=$r["credencialinidia"] ;
                          $credencialdisponible=$r["credencialdisponible"] ;


                           }

                            ?>

      <input type="text" name="" value="<?php print $credencialinidia?>" readonly="readonly" style="text-align:center";>
    </div>
   
  </div>


  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Actualización :</label>
      <input type="text" name="" value="<?php print $totalactualizacion ?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Otros tipos:</label>
      <input type="text" name="" value="<?php print  $totalotrotipos ?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Importadas :</label>
      <input type="text" name="" value="<?php print  $totalimportadas ?>" readonly="readonly" style="text-align:center";>
    </div>

  
     <div class="col-sm-2">
      <label for="distrito">Exportadas:</label>
      <input type="text" name="" value="<?php print  $totalexportadas ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Entregadas :</label>
      <input type="text" name="" value="<?php print  $totalentregadas ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Anexas :</label>
      <input type="text" name="" value="<?php print  $totalanexas ?>" readonly="readonly" style="text-align:center";>
    </div>
   
  </div>
   <div class="row">
     <div class="col-sm-2">
      <label for="distrito">Reimpresiones:</label>
      <input type="text" name="" value="<?php print $totalreimpresiones ?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Robo o extravió:</label>
      <input type="text" name="" value="<?php print   $totalrobo ?>" readonly="readonly" style="text-align:center";>
    </div>

   
    <div class="col-sm-2">
      <label for="distrito">Retiradas :</label>
      <input type="text" name=""  value="<?php print  $totalretiradas ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credenciales disponibles:</label>
      
      <input type="text" name=""   value="<?php print  $credencialdisponible ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Sobran :</label>
      <input type="text" name=""  value="<?php print  $totalsobran ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Duplicados :</label>
      <input type="text" name=""  value="<?php print   $totalduplicadas ?>" readonly="readonly" style="text-align:center";>
    </div>
   
  </div>
  <div class="row">
    <div class="col-sm-2"></div>
     <div class="col-sm-2">
      <label for="distrito">Reimpresiones:</label>
      <input type="text" name=""  value="<?php print  $totalreimpresion ?>" readonly="readonly" style="text-align:center";>
    </div>

    <div class="col-sm-2">
      <label for="distrito">Credencial DEV-TEV:</label>
      <input type="text" name="" value="<?php print  $totalcredevte ?>" readonly="readonly" style="text-align:center";>
    </div>

    <div class="col-sm-2">
      <label for="distrito">Credencial duplicada :</label>
      <input type="text" name="" value="<?php print  $totalcredencialduplicadas ?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credencial de canje:</label>
      <input type="text" name="" value="<?php print   $totalcredencialcanjeadables ?>" readonly="readonly" style="text-align:center";>
    </div>
  </div>

</div>
  
</div>


<div style="border-style: ridge; margin: 5px; padding: 6px; border-color: #A44BA0;background-color:#D7BDE2">
<div class="container-fluid">
  <div class="row">


    <?php


 $sql="select distrito_iddistrito,modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                  $query = $con->query($sql);
                  $r=$query->fetch_array();
                  $distritoactual=$r["distrito_iddistrito"];
                  $moduloactual=$r["modulo_idmodulo"];
///////////////////////////////////////////////////////////////////////////////
 $sql="select sum(totalfinal) as totalocupados, sum(folionocupados) as totalnoocupados,sum(inscripciones) as totalinscripciones,
sum(correcion) as totalcorrecion, sum(cambiodom) as totalcambiodom,sum(reposicion) as totalreposicion,
sum(coreccionddireccion) as totalcoreccionddireccion, sum(reincorporacion) as totalreincorporacion,sum(reemplazo) as totalreemplazo,
sum(cancelados) as totalcancelados, sum(rechazados) as totalrechazados,sum(curp) as totalcurp,
sum(solicitudexpedicion) as totalsolicitudexpedicion, sum(solicitudrectificacion) as totalsolicitudrectificacion,sum(demandajucion) as totaldemandajucion, sum(total) as totaltramites,
sum(actualizacion) as totalactualizacion, sum(otrotipo) as totalotrotipo,sum(importadas) as totalimportadas, sum(exportadas) as totalexportadas,
sum(entregadas) as totalentregadas, sum(anexas) as totalanexas,sum(reimpresiones) as totalreimpresiones, sum(robo) as totalrobo,
sum(retiradas) as totalretiradas, sum(sobran) as totalsobran,sum(duplicadas) as totalduplicadas, sum(reimpresion) as totalreimpresion,
sum(credevte) as totalcredevte, sum(credencialduplicadas) as totalcredencialduplicadas,sum(credencialcanjeadables) as totalcredencialcanjeadables
from reported where YEAR(NOW()) and distrito_iddistrito=$distritoactual and modulo_idmodulo=$moduloactual and remesa_idremesa<=$remesaActual";
                  $query = $con->query($sql);
                  $r=$query->fetch_array();
                  $totalocupados=$r["totalocupados"];
                  $totalnoocupados=$r["totalnoocupados"];
                  $totalinscripciones=$r["totalinscripciones"];
                  $totalcorrecions=$r["totalcorrecion"];
                  $totalcambiodom=$r["totalcambiodom"];
                  $totalreposicion=$r["totalreposicion"];
                  $totalcoreccionddireccion=$r["totalcoreccionddireccion"];
                  $totalreincorporacion=$r["totalreincorporacion"];
                  $totalreemplazo=$r["totalreemplazo"];
                  $totalcancelados=$r["totalcancelados"];
                  $totalrechazados=$r["totalrechazados"];
                  $totalcurp=$r["totalcurp"];
                  $totalsolicitudexpedicion=$r["totalsolicitudexpedicion"];
                  $totalsolicitudrectificacion=$r["totalsolicitudrectificacion"];
                  $totaldemandajucion=$r["totaldemandajucion"];
                  $totaltramites=$r["totaltramites"];
                  $totalactualizacion=$r["totalactualizacion"];
                  $totalotrotipos=$r["totalotrotipo"];
                  $totalimportadas=$r["totalimportadas"];
                  $totalexportadas=$r["totalexportadas"];
                  $totalentregadas=$r["totalentregadas"];
                  $totalanexas=$r["totalanexas"];
                  $totalreimpresiones=$r["totalreimpresiones"];
                  $totalrobo =$r["totalrobo"];
                  $totalretiradas =$r["totalretiradas"];
                  $totalsobran=$r["totalsobran"];
                  $totalduplicadas =$r["totalduplicadas"];
                  $totalreimpresion =$r["totalreimpresion"];
                  $totalcredevte =$r["totalcredevte"];
                  $totalcredencialduplicadas =$r["totalcredencialduplicadas"];
                  $totalcredencialcanjeadables =$r["totalcredencialcanjeadables"];


?>

    <div class="col-sm-2">
      <label for="distrito">Remesa Actual: </label>
      <input type="text" name="" value="<?php print $remesaActual?>" readonly="readonly" style="text-align:center";>
    </div>
     <div class="col-sm-2">
      <label for="distrito">Entidad: </label>
       <input type="text" value="VERACRUZ" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Distrito: </label>
      <input type="text" name="" value="<?php print $distritoactual?>" readonly="readonly" style="text-align:center";>
    </div>

    <div class="col-sm-2">
      <label for="distrito">Módulo: </label>
      <input type="text" name="" value="<?php print $moduloactual?>" readonly="readonly" style="text-align:center";>
    </div>
    <div class="col-sm-2">
      <label for="distrito">Típo Módulo: </label>
      <input type="text" name="">
    </div>

      <div class="col-sm-2">
      <label for="distrito">Total Folios Ocupados :</label>
      <input type="text" name="">
    </div>

  </div>

  <div class="row">
   
     <div class="col-sm-2">
      <label for="distrito">Total Folios No Ocupados :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Inscripciones :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Correcciones :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Cambió Domicilio :</label>
      <input type="text" name="">
    </div>

    <div class="col-sm-2">
      <label for="distrito">Reincorporación :</label>
      <input type="text" name="">
    </div>

    <div class="col-sm-2">
      <label for="distrito">Reemplazo :</label>
      <input type="text" name="">
    </div>

  </div>

  <div class="row">
    
     
     <div class="col-sm-2">
      <label for="distrito">Cancelados :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Rechazados :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">CURP :</label> <br>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Solicitud de Expedientes :</label>
      <input type="text" name="">
    </div>

     <div class="col-sm-2">
      <label for="distrito">Solicitud Rectificaciones:</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Demanda de jución:</label>
      <input type="text" name="">
    </div>
  </div>

  <div class="row">
   
     <div class="col-sm-2">
      <label for="distrito">Total de tramites :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credenciales iniciales día :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Actualización :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Otros tipos:</label>
      <input type="text" name="">
    </div>

    <div class="col-sm-2">
      <label for="distrito">Importadas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Exportadas:</label>
      <input type="text" name="">
    </div>
  </div>

  <div class="row">
    
     <div class="col-sm-2">
      <label for="distrito">Entregadas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Anexas :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Reimpresiones:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Robo o extravió:</label>
      <input type="text" name="">
    </div>

    <div class="col-sm-2">
      <label for="distrito">Retiradas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credenciales disponibles:</label>
      <input type="text" name="">
    </div>

  </div>

   <div class="row">
    
     <div class="col-sm-2">
      <label for="distrito">Sobran :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Duplicados :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Reimpresiones:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Credencial DEV-TEV:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Credencial duplicada :</label>
      <input type="text" name="">
      </div>
     <div class="col-sm-2">
      <label for="distrito">Credencial de canje:</label>
      <input type="text" name="">
    </div>
  </div>

  <div class="row">
      
    <div class="col-sm-2">
      <label for="distrito">Días Laborados :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Configuración</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Total de Equipo:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Disponibles:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Fichas Entregadas:</label>
      <input type="text" name="">
    </div>

     <div class="col-sm-2">
      <label for="distrito">Fichas Atendidas:</label>
      <input type="text" name="">
    </div>

  </div> 





</div>
</div>





  </form>  
  <br>
  <?php include "piepagina.php"; ?>


</body>
</html>