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
  <title>SIIRFE SEMANAL </title>
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
    $('#sirfe').DataTable( {
        dom: 'Bfrtip',
      
        buttons: [
            'copy',
            {
                extend: 'excel',
                messageTop: 'REPORTE SEMANAL'
            }
            
            
        ]
    } );
  
} );

  </script>
<body style="width: auto;">

<?php include "menud.php";
  $idusuario=$_SESSION['usuario'][0]['id'];
   $sql="select * from encargadorm where idencargadoRM=$idusuario;";

          $query = $con->query($sql);
          $r=$query->fetch_array();

          $iddistrito=$r["distrito_iddistrito"];
  
          ?> 

   <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

  <h3 align="center" class="let"> REPORTE DE SIRRFE SEMANAL </h3>

  
   
</div>
<br>


  <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">

        <thead>
            <tr style="color:#FFFFFF;">
               <th>Remesa</th>
                <th>Entidad</th>
                <th>Distrito</th>
                <th>Módulo</th>
                <th>Tipo de módulo</th>
                <th>Folio inicial</th>
                <th>Folio final</th>
                <th>Total de folios utilizados</th>
                <th>Folios no utilizados</th>
                <th>Inscripciones</th>
                <th>Correcciones</th>
                <th>Cambio de domicilio</th>
                <th>Reposición</th>
                <th>Cambio de datos dirección</th>
                <th>Reincorporación</th>
                <th>Reemplazo</th>
                <th>Cancelados</th>
                <th>Rechazados</th>
                <th>CURP</th>
                <th>Solicitud de Expedientes</th>
                <th>Solicitud de Rectificaciones</th>
                <th>Demanda de jución</th>
                <th>Total de tramites </th>
                <th>Credenciales iniciales del día</th>
                <th>Actualización </th>
                <th>Otros tipos </th>
                <th> Importadas </th>
                <th> Exportadas </th>
                <th> Entregadas </th>
                <th>Anexas </th>
                <th> Reimpresiones </th>
                <th> Robo o extravió </th>
                <th>Retiradas </th>
                <th>Credenciales disponibles</th>
                <th> Sobran </th>
                <th>Duplicados </th>
                <th> Reimpresiones </th>
                <th> Credencial DEV-TEV </th>
                <th> Credencial duplicada </th>
                <th> Credencial de canje </th>
                <th> Fichas entregadas </th>
                <th> Fichas atendidas </th>
                <th> Configuración </th>
                <th> Total de equipos </th>

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
           $hora=date("g");
           if($hora>11){
          
            $fechaf=date("Y-m-d",strtotime($fecha_actual."- 1 days")); 
          //resto 1 día
            $fechai=date("Y-m-d",strtotime($fecha_actual."- 7 days"));

            echo '<script language="javascript">alert("El horario limite para generar el reporte de la semana pasada, es antes de las 11:00 hrs");</script>';

           }else{

           
            $fechaf=date("Y-m-d",strtotime($fecha_actual."+ 6 days")); 
          //resto 1 día
            $fechai=$fechaH;
            }         
     

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


         //$sql="select * from reported where distrito_iddistrito=$iddistrito and  fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'"." and validado=1" .$criterio. " group by modulo_idmodulo;";

        $sql="select * from reported where fecha BETWEEN "."'".$fechai."'"." and " ."'".$fechaf. "'"." and validado=1" .$criterio. " group by modulo_idmodulo;";

          $mensaje= "REPORTE GENERADO DEL :".$fechai . " AL ". $fechaf;
          ?>
           
            <h3 align="center"> <?php 
            echo $mensaje;
            ?></h3>

          <?php 
          $rs = $con->query($sql);
          if($rs){
            $mo=0;$a=0;$b=0;$c=0;$d=0; $e=0; $f=0; $g=0; $h=0; $i=0; $j=0;  $k=0; $l=0; $m=0; $n=0; $o=0;$p=0; $q=0;$rr=0; $s=0;$t=0; $u=0; $v=0;$w=0; $x=0; $y=0; $z=0; $aa=0; $ab=0;  $ac=0; $ad=0;$ae=0; $af=0;$ag=0;$ah=0;$ai=0;

              while ($fila = $rs->fetch_object()){
              $id=$fila->idreported;
              $idremesa=$fila->remesa_idremesa;
              $idmodulo=$fila->modulo_idmodulo;
              $iddistrito=$fila->distrito_iddistrito;
              ////////////////////////////////////// COL1
             $sql="select * from reported where idreported=$id;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $remesa=$r["remesa_idremesa"];
                echo "<td>".$remesa."</td>";
                ///////////////////////////////////// COL2
                echo "<td>VERACRUZ </td>";
                  ///////////////////////////////////////// COL3
               $sql="select * from distrito where iddistrito=$iddistrito;";
                $query = $con->query($sql);
                 $r=$query->fetch_array();

                   $nombredistrito=$r["nombredistrito"];

                   echo "<td>".$nombredistrito."</td>";
                ////////////////////////////////////////////COL 4

               $sql2="select * from modulo where idmodulo=$idmodulo";
              $query = $con->query($sql2);
              $r=$query->fetch_array();
              $modulo=$r["idmodulo"];
              $tipomodulo=$r["tipomodulo"];
              echo "<td>".$modulo."</td>";
               $mo+=1;
              ///////////////////////////////////////////COL5
               echo "<td>".$tipomodulo."</td>";
               ////////////////////////////////////////col 6
            $sql="select min(folioinicial) as finicial from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $finicia=$r["finicial"];
              
              $finicialTemporal = substr("$finicia", -5);

              if ($finicialTemporal==0){
                $foliomenor=$finicia+1;
                 echo "<td>".$foliomenor."</td>";

              }else{
             
                $foliomenor=$finicia;

              echo "<td>".$finicia."</td>";
              }

              
              /////////////////////////////////////////////////col7
               $sql="select max(foliofinal) as ffinal from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $ffinal=$r["ffinal"];
              echo "<td>".$ffinal."</td>";
              ///////////////////////////////////////////////// col 8
             $sumafolios=($ffinal-$foliomenor)+1;
             echo "<td>".$sumafolios."</td>";  $a+= $sumafolios;
           
             /////////////////////////////////////////////// col 9
            $sql="select sum(folionocupados) as fno from reported where modulo_idmodulo=$idmodulo";
             $query = $con->query($sql);
              $r=$query->fetch_array();
              $folionocupados=$r["fno"];
              echo "<td>".$folionocupados."</td>";
              $b+= $folionocupados;
              ///////////////////////////////////////// col 10
              $sql="select sum(inscripciones) as insc from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $inscripciones=$r["insc"];
               $c+= $inscripciones;
            

              echo "<td>".$inscripciones."</td>";
              ////////////////////////////////////////// col 11
              $sql="select sum(correcion) as corr from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $corr=$r["corr"];
              $d+= $corr;
              echo "<td>".$corr."</td>";
              ////////////////////////////////////////// col 12
              $sql="select sum(cambiodom) as cambiod from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $cambiod=$r["cambiod"];
               $e+= $cambiod;

              echo "<td>".$cambiod."</td>";
              /////////////////////////////// col 13
              $sql="select sum(reposicion) as reposicion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $reposicion=$r["reposicion"];
              $f+= $reposicion;
              echo "<td>".$reposicion."</td>";
              //////////////////////////////////////// col 14
              $sql="select sum(coreccionddireccion) as coreccionddireccion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $coreccionddireccion=$r["coreccionddireccion"];
              $g+= $coreccionddireccion;
              echo "<td>".$coreccionddireccion."</td>";
              //////////////////////////////////////// col 15
              $sql="select sum(reincorporacion) as reincorporacion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $reincorporacion=$r["reincorporacion"];
              $h+= $reincorporacion;
              echo "<td>".$reincorporacion."</td>";
               //////////////////////////////////////// col 16
              $sql="select sum(reemplazo) as reemplazo from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $reemplazo=$r["reemplazo"];
              $i+= $reemplazo;
              echo "<td>".$reemplazo."</td>";
               //////////////////////////////////////// col 17
              $sql="select sum(cancelados) as cancelados from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $cancelados=$r["cancelados"];
              $j+= $cancelados;
              echo "<td>".$cancelados."</td>";
              //////////////////////////////////////// col 18
              $sql="select sum(rechazados) as rechazados from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $rechazados=$r["rechazados"];
              $k+= $rechazados;
              echo "<td>".$rechazados."</td>";
                //////////////////////////////////////// col 19
              $sql="select sum(curp) as curp from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $curp=$r["curp"];
               $l+= $curp;
              echo "<td>".$curp."</td>";
                //////////////////////////////////////// col 20
              $sql="select sum(solicitudexpedicion) as solicitudexpedicion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $solicitudexpedicion=$r["solicitudexpedicion"];
              $m+= $solicitudexpedicion;
              echo "<td>".$solicitudexpedicion."</td>";
               //////////////////////////////////////// col 21
              $sql="select sum(solicitudrectificacion) as solicitudrectificacion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $solicitudrectificacion=$r["solicitudrectificacion"];
              $n+= $solicitudrectificacion;
              echo "<td>".$solicitudrectificacion."</td>";
               //////////////////////////////////////// col 22
              $sql="select sum(demandajucion) as demandajucion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $demandajucion=$r["demandajucion"];
              $o+= $demandajucion;
              echo "<td>".$demandajucion."</td>";

              //////////////////////////////////////// col 23

              $sql="select sum(total) as total from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $total=$r["total"];
              $p+= $total;
              echo "<td>".$total."</td>";
              //////////////////////////////////////// col 24

              $sql="select sum(credencialinidia) as credencialinidia from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $credencialinidia=$r["credencialinidia"];
               $q+= $credencialinidia;
              echo "<td>".$credencialinidia."</td>";
              //////////////////////////////////////// col 25

              $sql="select sum(actualizacion) as actualizacion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $actualizacion=$r["actualizacion"];
              $rr+= $actualizacion;
              echo "<td>".$actualizacion."</td>";
                //////////////////////////////////////// col 26

              $sql="select sum(otrotipo) as otrotipo from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $otrotipo=$r["otrotipo"];
              $s+= $otrotipo;
              echo "<td>".$otrotipo."</td>";
              //////////////////////////////////////// col 27

              $sql="select sum(importadas) as importadas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $importadas=$r["importadas"];
              $t+= $importadas;
              echo "<td>".$importadas."</td>";
               //////////////////////////////////////// col 28

              $sql="select sum(exportadas) as exportadas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $exportadas=$r["exportadas"];
              $u+= $exportadas;
              echo "<td>".$exportadas."</td>";
                 //////////////////////////////////////// col 29

              $sql="select sum(entregadas) as entregadas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $entregadas=$r["entregadas"];
              $v+= $entregadas;
              echo "<td>".$entregadas."</td>";
               //////////////////////////////////////// col 30

              $sql="select sum(anexas) as anexas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $anexas=$r["anexas"];
              $w+= $anexas;
              echo "<td>".$anexas."</td>";
               //////////////////////////////////////// col 31

              $sql="select sum(reimpresiones) as reimpresiones from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $reimpresiones=$r["reimpresiones"];
              $x+= $reimpresiones;
              echo "<td>".$reimpresiones."</td>";
              //////////////////////////////////////// col 32

              $sql="select sum(robo) as robo from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $robo=$r["robo"];
              $y+= $robo;
              echo "<td>".$robo."</td>";
              //////////////////////////////////////// col 33

              $sql="select sum(retiradas) as retiradas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $retiradas=$r["retiradas"];
              $z+= $retiradas;
              echo "<td>".$retiradas."</td>";

               //////////////////////////////////////// col 34

              $sql="select sum(credencialdisponible) as credencialdisponible from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $credencialdisponible=$r["credencialdisponible"];
              $aa+= $credencialdisponible;
              echo "<td>".$credencialdisponible."</td>";
               //////////////////////////////////////// col 35


              $sql="select sum(sobran) as sobran from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $sobran=$r["sobran"];
              $ab+= $sobran;
              echo "<td>".$sobran."</td>";
               //////////////////////////////////////// col 36


              $sql="select sum(duplicadas) as duplicadas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $duplicadas=$r["duplicadas"];
              $ac+= $duplicadas;
              echo "<td>".$duplicadas."</td>";
              //////////////////////////////////////// col 37


              $sql="select sum(reimpresion) as reimpresion from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $reimpresion=$r["reimpresion"];
              $ad+= $reimpresion;
              echo "<td>".$reimpresion."</td>";
              //////////////////////////////////////// col 38


              $sql="select sum(credevte) as credevte from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $credevte=$r["credevte"];
              $ae+= $credevte;
              echo "<td>".$credevte."</td>";
              //////////////////////////////////////// col 39


              $sql="select sum(credencialduplicadas) as credencialduplicadas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $credencialduplicadas=$r["credencialduplicadas"];
              $af+= $credencialduplicadas;
              echo "<td>".$credencialduplicadas."</td>";

              //////////////////////////////////////// col 40


              $sql="select sum(credencialcanjeadables) as credencialcanjeadables from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $credencialcanjeadables=$r["credencialcanjeadables"];
              $ag+= $credencialcanjeadables;
              echo "<td>".$credencialcanjeadables."</td>";
              //////////////////////////////////////// col 41


              $sql="select sum(fichasentregadas) as fichasentregadas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $fichasentregadas=$r["fichasentregadas"];
              $ah+= $fichasentregadas;
              echo "<td>".$fichasentregadas."</td>";
              //////////////////////////////////////// col 42


              $sql="select sum(fichasatendidas) as fichasatendidas from reported where modulo_idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $fichasatendidas=$r["fichasatendidas"];
              $ai+= $fichasatendidas;

              echo "<td>".$fichasatendidas."</td>";
              ///////////////////////////////////////////////// col 43

        

              $sql="select *  from modulo where idmodulo=$idmodulo";
              $query = $con->query($sql);
              $r=$query->fetch_array();
              $configuracion=$r["configuracion"];
              $totalequipos=$r["totalequipos"];

              echo "<td>".$configuracion."</td>";
              ////////////////////////////////////// col 44
               echo "<td>".$totalequipos."</td>";

          ?>

                
          </tr>


              <?php }
              mysqli_free_result($rs);
            

              
          }

              ?>  
<tr>
          <th style="background:#FEFCFC; border: hidden;" ></th>
          <th style="background:#FEFCFC; border: hidden;" ></th>
          <th style="background:#D8CACA; border: hidden;" >NÚM DE MÓDULOS</th>
          <?php
          echo "<th style=background:#D8CACA>". $mo. "</th>";
          ?>
         
          <th style="background:#D8CACA; border: hidden;" > </th>
          <th style="background:#D8CACA; border: hidden;" ></th>
          <th style="background:#D8CACA; border: hidden;" > TOTALES </th>
          <?php 
          echo "<th style=background:#D8CACA>". $a. "</th>";
          echo "<th style=background:#D8CACA>". $b. "</th>";
          echo "<th style=background:#D8CACA>". $c. "</th>";
          echo "<th style=background:#D8CACA>". $d. "</th>";
          echo "<th style=background:#D8CACA>". $e. "</th>";
          echo "<th style=background:#D8CACA>". $f. "</th>";
          echo "<th style=background:#D8CACA>". $g. "</th>";
          echo "<th style=background:#D8CACA>". $h. "</th>";
          echo "<th style=background:#D8CACA>". $i. "</th>";
          echo "<th style=background:#D8CACA>". $j. "</th>";
          echo "<th style=background:#D8CACA>". $k. "</th>";
          echo "<th style=background:#D8CACA>". $l. "</th>";
          echo "<th style=background:#D8CACA>". $m. "</th>";
          echo "<th style=background:#D8CACA>". $n. "</th>";
          echo "<th style=background:#D8CACA>". $o. "</th>";
          echo "<th style=background:#D8CACA>". $p. "</th>";
          echo "<th style=background:#D8CACA>". $q. "</th>";
          echo "<th style=background:#D8CACA>". $rr. "</th>";
          echo "<th style=background:#D8CACA>". $s. "</th>";
          echo "<th style=background:#D8CACA>". $t. "</th>";
          echo "<th style=background:#D8CACA>". $u. "</th>";
          echo "<th style=background:#D8CACA>". $v. "</th>";
          echo "<th style=background:#D8CACA>". $w. "</th>";
          echo "<th style=background:#D8CACA>". $x. "</th>";
          echo "<th style=background:#D8CACA>". $y. "</th>";
          echo "<th style=background:#D8CACA>". $z. "</th>";
          echo "<th style=background:#D8CACA>". $aa. "</th>";
          echo "<th style=background:#D8CACA>". $ab. "</th>";
          echo "<th style=background:#D8CACA>". $ac. "</th>";
          echo "<th style=background:#D8CACA>". $ad. "</th>";
          echo "<th style=background:#D8CACA>". $ae. "</th>";
          echo "<th style=background:#D8CACA>". $af. "</th>";
          echo "<th style=background:#D8CACA>". $ag. "</th>";
          echo "<th style=background:#D8CACA>". $ah. "</th>";
          echo "<th style=background:#D8CACA>". $ai. "</th>";


           ?>
          
         
          <th style="background:#FEFCFC; border: hidden;" ></th>
          <th style="background:#FEFCFC; border: hidden;" ></th>
          <th style="background:#FEFCFC; border: hidden;" ></th>


        </tr>

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