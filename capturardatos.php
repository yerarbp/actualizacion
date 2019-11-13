<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
    
		if($idusuario!=''){
		} 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}

           
if($_POST['guardar']){
    $ffinal=$_POST['ffinal'];
    $ttramites=$_POST['ttramites'];
     if(($_POST['remesa']>=1)&& ($_POST['ttramites']!= '')&& ($_POST['tcredenciales']!= '')){
                
               $fecha=$_POST['fecha'];
                echo "<bR>"; ECHO "EL folio incial es ";       
                ECHO $finicial=$_POST['finicial'];
                echo "<bR>";ECHO "EL folio final  es ";       
                ECHO $ffinal=$_POST['ffinal'];
                echo "<bR>";ECHO "f utizados ";       
                ECHO $futilizado=$_POST['futilizado'];
                echo "<bR>";ECHO "f no utizados ";       
                ECHO $fnutilizado=$_POST['fnutilizado'];
                echo "<bR>"; ECHO "las inscripciones es  ";       
                echo $inscripciones=$_POST['inscripciones'];
                echo "<bR>";ECHO "las corecciones  ";   
                echo $corre=$_POST['correcciones'];    
              
                echo "<bR>"; ECHO "el cambio de D ";       
                echo $cambiod=$_POST['cambiod'];

                echo "<bR>";ECHO "el valor de reposicion ";       
                echo $reposicion=$_POST['reposicion'];

               echo "<bR>"; ECHO "las corecciones D son ";       
                echo $corecciondatosd=$_POST['corecciondatosd'];

                echo "<bR>";ECHO "las reincorporaciones  ";       
                echo $reincorporacion=$_POST['reincorporacion'];

                 echo "<bR>";ECHO "los remplazos ";       
                echo $reemplazo=$_POST['reemplazo'];

                echo "<bR>";ECHO "los tramites son ";      
                echo $ttramit=$_POST['ttramites'];

                 echo "<bR>"; ECHO "los cancelados son";      
                echo $cancelados=$_POST['cancelados'];

                 echo "<bR>";  ECHO "los rechazados ";     
                echo $rechazados=$_POST['rechazados'];

                echo "<bR>"; ECHO "las curps ";       
                echo $curp=$_POST['curp'];

                echo "<bR>"; ECHO "expedientes ";       
                echo $solicitudexpedientes=$_POST['solicitudexpedientes'];

                echo "<bR>"; ECHO "ratificaciones  ";       
                echo $solicitudrectificacion=$_POST['solicitudrectificacion'];

                 echo "<bR>";ECHO "las demandas son ";       
                echo $demanda=$_POST['demanda'];
                echo "<bR>";
                echo "credenciales iniciales son ";  
                echo $credencialesiniciales=0;
                echo "<bR>";

                echo "DISPONIBLES DEL DÍA X";
                echo $disponible=$_POST['disponible'];
                echo "<bR>";echo "DISPONIBLES DE ACTUALIZACION";
                echo $actualizacion=$_POST['actualizacion'];
                echo "<bR>"; echo "DISPONIBLES DE OTRO TIPO";
                echo $otrotipo=$_POST['otrotipo'];
                echo "<bR>";echo "IMPORTADAS";
                echo $importadas=$_POST['importadas'];
                echo "<bR>";echo "Exportadas";
                echo $exportadas=$_POST['exportadas'];
                echo "<bR>";echo "entregadas";
                echo $entregadas=$_POST['entregadas'];
                echo "<bR>";echo "anexas";
                echo $anexas=$_POST['anexas'];
                echo "<bR>";echo "reimpresiones";
                echo $reimpresiones=$_POST['reimpresiones'];
                echo "<bR>";echo "robo";
                echo $robo=$_POST['robo'];
                echo "<bR>";echo "retiradas";
                echo $retiradas=$_POST['retiradas'];
                echo "<bR>";echo "CREDENCIALES DISPONIBLES";
                echo $tcredenciales=$_POST['tcredenciales'];
                echo "<bR>";echo "sobran";
                echo $sobran=$_POST['sobran'];
                echo "<bR>";echo "duplicados";
                echo $duplicados=$_POST['duplicados'];
                echo "<bR>";echo "reimpresiones";
                echo $reimpreso=$_POST['reimpreso'];
                echo "<bR>";echo "DEVTEC";
                echo $devtec=$_POST['devtec'];
                echo "<bR>";echo "vreduc";
                echo $credup=$_POST['credup'];
                echo "<bR>";echo "ccanjeable";
                echo $ccanjeable=$_POST['ccanjeable'];
                echo "<bR>"; echo "<bR>";echo "DIAS Laborable"; 
                echo $dialaborable=1;
                echo "<bR>";echo "fichasentregadas";
                echo $fichasentregadas=$_POST['fichasentregadas'];
                echo "<bR>";echo "fichasatendidas";
                echo $fichasatendidas=$_POST['fichasatendidas'];
                echo "<bR>";echo "descripcion";
                echo $descripcion=$_POST['descripcion'];
               ECHO "EL ID DEL USUARIO ES";       echo "<bR>";
               ECHO  $idusuario=$_SESSION['usuario'][0]['id'];
               echo "el id de modulo es: ";
               echo $idmodulo=$_POST['tipomodulo'];
                echo "el id de la REMESA ES :";
                echo $remesa=$_POST['remesa'];  
                
                // datos para la incidencia

                echo "el ID de situacion del modulo";
                echo $inhabilitado=$_POST['inhabilitado'];  
                ECHO "<BR>";echo "el registro cau";
                echo $cau=$_POST['cau']; 
                ECHO "<BR>";echo "descripcion";
                echo $descripcion=$_POST['descripcion']; 
                ECHO "<BR>";echo "solucion";
                echo $solucion=$_POST['solucion']; 
                ECHO "<BR>";echo "como";
                echo $como=$_POST['como']; 
                ECHO "<BR>";echo "tiempo";
                echo $tiempo=$_POST['tiempo'];

         
                 echo $justifique=$_POST['Justifique'];

                ECHO "<BR>";echo "tipo de incidencia";
                echo $tipoincidencia=$_POST['tipoincidencia']; 

                //Los combos extras de laborable y incidencias
                echo "LABORABLE ES:"; ECHO "<BR>";
                echo $laborable=$_POST['laborable'];
                 echo "INCIDENCIAS SES:"; ECHO "<BR>";
                 ECHO "<BR>";
                echo $incidencias=$_POST['incidencias'];
                echo "registrar SES:"; ECHO "<BR>";
                 ECHO "<BR>";
                echo $registrar=$_POST['registrar'];
                 echo $iddistrito=$_POST['distrito'];


  


                  $sql3="SELECT MAX(idperiodo) AS idperiodo FROM periodo;";
                  $query = $con->query($sql3);
                  $r=$query->fetch_array();
                  $periodo=$r["idperiodo"];

///saber si ya esta esa fecha registrada 
                 echo $sql3="SELECT idreported  FROM reported where fecha='$fecha'  and modulo_idmodulo=$idmodulo and remesa_idremesa=$remesa and encargadoRM_idencargadoRM=$idusuario;";
                  $query = $con->query($sql3);
                  $r=$query->fetch_array();
                  $idrecuperado=$r["idreported"];
///////////////////////////////


                  if($idrecuperado>1){
                    echo "<script>alert('Ya se ha ingreso reporte para este día, intente con otra fecha');</script>";

                  }  else{

                      if ($laborable==2){
                     $sql3 =("INSERT INTO reporteincidencias (fecha, inhabilitado, cao, descripcion, solucion,como, tiempo,justifique,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,incidencias_idincidencias,distrito_iddistrito,validado,periodo_idperiodo) 


                     VALUES ('$fecha','$inhabilitado','$cau','$descripcion','$solucion','$como', 
                     '$tiempo','$justifique','$idusuario','$idusuario','$idmodulo', '$remesa', '$tipoincidencia','$iddistrito',2,'$periodo');");
                     echo $sql3; 

                    $query1 = $con -> query($sql3);

                    echo "<script>alert('El registro de incidencia se guardo correctamente!');window.location='listareported.php';</script>";


                }else{
                    if ($incidencias==2) {
                    
                   ECHO $sql3 =("INSERT INTO reported (entidad,fecha,folioinicial,foliofinal, 
                   totalfinal, folionocupados, inscripciones, correcion, cambiodom, reposicion, coreccionddireccion, reincorporacion, reemplazo, total, cancelados, rechazados, curp, solicitudexpedicion, solicitudrectificacion, demandajucion, credencialinicial, credencialinidia, actualizacion, otrotipo, importadas, exportadas, entregadas, anexas, reimpresiones, robo, retiradas, sobran, duplicadas, reimpresion, credevte, credencialduplicadas, credencialcanjeadables, dialaborable, fichasentregadas, fichasatendidas, credencialdisponible,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,distrito_iddistrito,validado,periodo_idperiodo) 

                    VALUES (30,'$fecha','$finicial','$ffinal', '$futilizado', '$fnutilizado','$inscripciones','$corre', '$cambiod', '$reposicion', '$corecciondatosd', '$reincorporacion', '$reemplazo', '$ttramit', '$cancelados','$rechazados', '$curp', '$solicitudexpedientes', '$solicitudrectificacion', '$demanda', 0, '$disponible', '$actualizacion', '$otrotipo', '$importadas', '$exportadas', '$entregadas', '$anexas', '$reimpresiones', '$robo', '$retiradas', '$sobran', '$duplicados', '$reimpreso', '$devtec', '$credup', '$ccanjeable',1, '$fichasentregadas', '$fichasatendidas', '$tcredenciales','$idusuario','$idusuario', '$idmodulo', '$remesa','$iddistrito',2,'$periodo');");

                $query1 = $con -> query($sql3);
                echo "<script>alert('El registro del día se guardo con éxito!');window.location='listareported.php';</script>";
                }
                else{
                    if ($registrar==1){

                        $sql3 =("INSERT INTO reporteincidencias (fecha, inhabilitado, cao, descripcion, solucion,como, tiempo,justifique,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,incidencias_idincidencias,distrito_iddistrito,validado,periodo_idperiodo) 


                     VALUES ('$fecha','$inhabilitado','$cau','$descripcion','$solucion','$como', 
                     '$tiempo','$justifique','$idusuario','$idusuario','$idmodulo', '$remesa', '$tipoincidencia','$iddistrito',2,'$periodo');");
                     echo $sql3; 

                    $query1 = $con -> query($sql3);

                  $sql =("INSERT INTO reported (entidad,fecha,folioinicial,foliofinal, 
                   totalfinal, folionocupados, inscripciones, correcion, cambiodom, reposicion, coreccionddireccion, reincorporacion, reemplazo, total, cancelados, rechazados, curp, solicitudexpedicion, solicitudrectificacion, demandajucion, credencialinicial, credencialinidia, actualizacion, otrotipo, importadas, exportadas, entregadas, anexas, reimpresiones, robo, retiradas, sobran, duplicadas, reimpresion, credevte, credencialduplicadas, credencialcanjeadables, dialaborable, fichasentregadas, fichasatendidas, credencialdisponible,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,distrito_iddistrito,validado,periodo_idperiodo) 

                    VALUES (30,'$fecha','$finicial','$ffinal', '$futilizado', '$fnutilizado','$inscripciones','$corre', '$cambiod', '$reposicion', '$corecciondatosd', '$reincorporacion', '$reemplazo', '$ttramit', '$cancelados','$rechazados', '$curp', '$solicitudexpedientes', '$solicitudrectificacion', '$demanda', 0, '$disponible', '$actualizacion', '$otrotipo', '$importadas', '$exportadas', '$entregadas', '$anexas', '$reimpresiones', '$robo', '$retiradas', '$sobran', '$duplicados', '$reimpreso', '$devtec', '$credup', '$ccanjeable',1, '$fichasentregadas', '$fichasatendidas', '$tcredenciales','$idusuario','$idusuario', '$idmodulo', '$remesa','$iddistrito',2,'$periodo');");

                        $query1 = $con -> query($sql);

                        echo "<script>alert('Se registro el reporte SIIRFE y el de incidencias exitosamente !');window.location='listareported.php';</script>";
                    } else{
                         if ($registrar>=2){
                             $sql3 =("INSERT INTO reporteincidencias (fecha, inhabilitado, cao, descripcion, solucion,como, tiempo,justifique,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,incidencias_idincidencias,distrito_iddistrito,validado,periodo_idperiodo) 


                     VALUES ('$fecha','$inhabilitado','$cau','$descripcion','$solucion','$como', 
                     '$tiempo','$justifique','$idusuario','$idusuario','$idmodulo', '$remesa', '$tipoincidencia','$iddistrito',2,'$periodo');");
                  

                    $query1 = $con -> query($sql3);

                     $sql =("INSERT INTO reported (entidad,fecha,folioinicial,foliofinal, 
                   totalfinal, folionocupados, inscripciones, correcion, cambiodom, reposicion, coreccionddireccion, reincorporacion, reemplazo, total, cancelados, rechazados, curp, solicitudexpedicion, solicitudrectificacion, demandajucion, credencialinicial, credencialinidia, actualizacion, otrotipo, importadas, exportadas, entregadas, anexas, reimpresiones, robo, retiradas, sobran, duplicadas, reimpresion, credevte, credencialduplicadas, credencialcanjeadables, dialaborable, fichasentregadas, fichasatendidas, credencialdisponible,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,distrito_iddistrito,validado,periodo_idperiodo) 

                    VALUES (30,'$fecha','$finicial','$ffinal', '$futilizado', '$fnutilizado','$inscripciones','$corre', '$cambiod', '$reposicion', '$corecciondatosd', '$reincorporacion', '$reemplazo', '$ttramit', '$cancelados','$rechazados', '$curp', '$solicitudexpedientes', '$solicitudrectificacion', '$demanda', 0, '$disponible', '$actualizacion', '$otrotipo', '$importadas', '$exportadas', '$entregadas', '$anexas', '$reimpresiones', '$robo', '$retiradas', '$sobran', '$duplicados', '$reimpreso', '$devtec', '$credup', '$ccanjeable',1, '$fichasentregadas', '$fichasatendidas', '$tcredenciales','$idusuario','$idusuario', '$idmodulo', '$remesa','$iddistrito',2,'´$periodo');");

                        $query1 = $con -> query($sql);

                        echo "<script>alert('Se registro el reporte SIIRFE y el de incidencias exitosamente !');window.location='capturarincidencias.php';</script>";

                         }
                       }

                    }

                }
            }
              
            
            }else{
             echo "<script>alert('No se ha selecionado la remesa y/o activado las operaciones');</script>";
            }
 }
    ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.png">

        <title>Registro SIIRTE</title>

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
    form select:required {
    border:2px solid red;
 /* otras propiedades */
}
 form input:required {
    border:2px solid red;
 /* otras propiedades */
}
form label:required {
    border:2px solid red;
 /* otras propiedades */
}
    </style>
    <body>
         <?php include "menub.php"; ?>
         <br>
        <h3 align="center">Registro de SIIRFE Diario</h3>
        
       <center> <label align="center" required style="border:2px solid red; font-size: 12px;"> Requeridos para el funcionamiento </label></center>


        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
                  <label>*</label> <label for="nombre">Remesa:</label>
                  <select name="remesa" class="form-control" rows="5" required>
                    <option value="0">Seleccione:</option>
                    <?php

                    
          setlocale(LC_ALL,"es_MX.UTF-8");
          $fechaH= date('Y-m-d');
          echo $año=date ('Y');
          echo $fechaf=$año . '-'.'12'.'-'.'31';

          $dias = array(" ","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
          
          $dial = $dias[date('N', strtotime($fechaH))];

          if($dial=="Lunes"){
            $fechai=$fechaH;
          }elseif ($dial=="Martes")
          {
       
          $fechai=date("Y-m-d",strtotime($fecha_actual."- 1 days")); 
        
          }elseif ($dial=="Miércoles") {
         
         echo $fechai=date("Y-m-d",strtotime($fecha_actual."- 2 days")); 
   

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
                

                 <label>*</label><label for="entidad">Entidad:</label>
                    <input type="text" class="form-control" id="entidad" name="entidad" placeholder="VERACRUZ" readonly="readonly" >
                    <label>*</label><label for="distrito">Distrito :</label>

                    <select name="distrito" class="form-control" rows="5" readonly="readonly"> 
                        <?php
                        //$sql3="select distrito_iddistrito from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el id que pertenece el distrito
                        $idusuario=$_SESSION['usuario'][0]['id'];

                        $sql3="select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        $id=$r["distrito_iddistrito"];

                         $sql3 =("select * from distrito where remesas.distrito.iddistrito=$id");
                        $query = $con -> query($sql3);
                       
                            while ($valores = mysqli_fetch_array($query)) {
                             echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>
                    </select>

                     <label>*</label><label for="tipomodulo"> Módulo:</label>

                     <select id="modulo" name="modulo" class="form-control" rows="5" readonly="readonly">
                      <?php
                        $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);

                        $r=$query->fetch_array();
                      $idmodulo=$r["modulo_idmodulo"];

                        $sql4 =("select * from modulo where modulo.idmodulo=$idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[idmodulo].'</option>';

                            }
                        ?>

                        </select>

                     <label>*</label><label for="tipomodulo">Tipo de Módulo:</label>

                     <select id="tipomodulo" name="tipomodulo" class="form-control" rows="5" readonly="readonly">
                      <?php
                         $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);

                        $r=$query->fetch_array();
                      $idmodulo=$r["modulo_idmodulo"];

                       $sql4 =("select * from modulo where idmodulo=$idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[tipomodulo].'</option>';

                            }
                        ?>

                        </select>


                     <label>*</label><label for="tipomodulo">Configuración:</label>
                     <?php
                       $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        $idmodulo=$r["modulo_idmodulo"];

                        $sql4 =("select * from modulo where modulo.idmodulo=$idmodulo");
                                      
                         $query = $con -> query($sql4);
                        $r=$query->fetch_array();

                        $configuracionmodulo=$r["configuracion"];
                            

                       ?>                  
                      
                       <input type="text" class="form-control" rows="5" id="configuracionmodulo" name="clave" readonly="readonly" value="<?php print $configuracionmodulo ?>" style="text-align:center;"> 

                        </select>

                         <label>*</label><label for="tipomodulo">Total de equipos configurados:</label>
                          <?php

                        $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        $idmodulo=$r["modulo_idmodulo"];

                        $sql4 =("select * from modulo where modulo.idmodulo=$idmodulo");
                                      
                         $query = $con -> query($sql4);
                        $r=$query->fetch_array();
                      $totalequipos=$r["totalequipos"];

                       ?>

                    
                           <input type="text" class="form-control" id="equipos" rows="5"  name="clave" readonly="readonly" value="<?php print $totalequipos ?>" style="text-align:center;" > 




                        <label>*</label> <label for="cargo">Fecha del reporte </label>
                

                    <input type="date" class="form-control" name="fecha" id="fecha" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo date("Y-m-d");?>" style="text-align:center;">

                     <br>                  
                    <hr style="border-color: black" />

                    <ul class="nav nav-tabs" name="myTabs">
                    <li class="active"><a data-toggle="tab" href="#home" onclick="valida2();"> FOLIOS </a></li>
                    <li><a data-toggle="tab" href="#menu1" onclick=""> TRAMITES </a></li>
                    <li><a data-toggle="tab" href="#menu2" onclick="vsuma();bandera2();"> CREDENCIALES </a></li>
                    <li><a data-toggle="tab" href="#menu3"> OTROS </a></li>
                    <li><a data-toggle="tab" href="#menu4"> INCIDENCIAS </a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <label></label><label for="foliou">Folio de Inicio:</label> 
                            <?php 
                            // buscar el ultimo id registro de los reportes para despues ocuparlo para sacar el ultimofolio regis
                            $sql3="SELECT MAX(idreported) AS idreported FROM reported where encargadoRM_idencargadoRM=$idusuario;";
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();

                            $ultimoidreporte=$r["idreported"];
                            ///////////////////////////////
                            //echo "la fecha actual es:";
                          $fechaactual=date("Y-m-d"); echo "<BR>";
                            //ECHO $fechaactual="2019-01-01";

                            //echo $fechaactual=$_GET["fecha"];
                        
                          $anio=date("Y");
                          $a=$anio."-01-01";
                          $b=$anio."-01-31";
                            
                            
                            $bandera=false;
                        

                            if(( $a<= $fechaactual)&& ( $b>=$fechaactual)){
                             // ECHO "ESTA DENTRO DEL MES y la bandera es:";
                             $bandera=true;
                              //echo "<br>";
                            }else{
                              
                               $bandera=false;
                               //echo "<br>";
                            }

                            //echo $fechaactual=date('Y-m-d');
                          
                           $fechacomparar=$anio."-01"; 


                        $sql3="SELECT * FROM reported where encargadoRM_idencargadoRM=$idusuario;";
                          
                            $rs = $con->query($sql3);
                            if($rs){
                                 while ($fila = $rs->fetch_object()){
                                   $fec=$fila->fecha;  
                                  $separa = explode("-",$fec); 
                                  $año = $separa[0];
                                  $mes = $separa[1];
                                 $fecha1=$año."-".$mes; 
                                  if($fecha1==$fechacomparar){
                                   
                                    $bandera=false;
                                    break;  
                                  

                                  }else{

                                    //echo "No hay de enero";
                                    $bandera=true;

                                  }
                            
                                }
                                 mysqli_free_result($rs);
                              }
                          
                              //echo "el valor con que llego la bandera es:";
                              $bandera;
                             // echo "<br>";

                            if(($ultimoidreporte==0) || ($bandera==true)){
                              
                            ////// PARA SACAR EL FOLIO INICIAL CON LA ESTRUCTURA 13 DIG
                            //////////sacar  el distrito////////////////////
                            $sql3="select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                                $query = $con->query($sql3);
                                $r=$query->fetch_array();
                                //$id=$r["distrito_iddistrito"];
                                 $iddistrito=$r["distrito_iddistrito"];

                            ///////////////////////////////////////////////// sacar módulo
                            
                               $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                                $query = $con->query($sql3);
                                $r=$query->fetch_array();
                                $idmodulo=$r["modulo_idmodulo"];
                                $modulonumero = substr("$idmodulo", -2);
                            ///////////////////////////////////////////////////////////

                              if($iddistrito<=9){
                                $distritonumero="0"."$iddistrito";
                                 $ultimofolio=date("y")."30"."$distritonumero"."$modulonumero"."00001";

                              }else{
                              $ultimofolio=date("y")."30"."$iddistrito"."$modulonumero"."00001";
                              }
                            
                            } else{


                            $sql3="select foliofinal from reported where reported.encargadoRM_idencargadoRM=".$idusuario." and reported.idreported=".$ultimoidreporte;
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                          
                             $ultimofolio=$r["foliofinal"] + 1;
                         }
                            ?>

                            <input type="text" class="form-control" id="finicial" name="finicial" readonly="readonly"
                            value="<?php print $ultimofolio ?>" style="text-align:center;">
                            <script type="text/javascript">
                                // va a tomar los valores de los folios inicio y final para sumarlos con el del registro pasado.
                            function PasarValor(){
                            
                               var x=document.getElementById("futilizado").value;
                               var z=document.getElementById("finicial").value;   
                               document.getElementById("ffinal").value= z;
                               var suma= (parseInt(z)+ parseInt(x))-1;
                               var fn=parseInt(x);

                               if(fn<1){
                              var sumax =parseInt(z);
                              document.getElementById("ffinal").value  = sumaX;

                            }else{

                            document.getElementById("ffinal").value  = suma;
                            }

                            }

                             </script>
                             <label></label><label for="foliofin">Folio Final:</label>
                                <input type="text" class="form-control" id="ffinal" name="ffinal" readonly="readonly" style="text-align:center;" >
                                 <br>

                                <label></label><label for="foliou">Num. de Folios Utilizados:</label>
                                <input type="number" id="futilizado" name="futilizado" min="0"  placeholder="ingrese una cantidad" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor(); validar();" onkeyup="PasarValor(); validar();"  style="text-align:center;"> <br>

    

                            <label></label><label for="folion">Num. de Folios NO Utilizados:</label>
                             <input type="number" id="fnutilizado" name="fnutilizado" min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/         placeholder="Ingrese una cantidad" onclick ="PasarValor();" onkeyup="PasarValor();"  style="text-align:center;"> <br>

                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <br>
                         <h5>Asigne los valores correspondientes a cada elemento </h5> <br>

                         <form>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Inscripciones  :  </label>
    
                             <input type="number" id="inscripciones" name="inscripciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();" value="0" style="text-align:center;">

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Correcciones:</label>
                             <input type="number" id="correcciones" name="correcciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Cambio de Domicilio  :  </label>
                             <input type="number" id="cambiod" name="cambiod"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();"value="0" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Reposición:</label>
                            <input type="number" id="reposicion" name="reposicion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();"value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Corrección de Datos Dirección:  </label>
                             <input type="number" id="corecciondatosd" name="corecciondatosd"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="0" style="text-align:center;" >

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Reincorporación:</label>
                            <input type="number" id="reincorporacion" name="reincorporacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reemplazo:  </label>
                            <input type="number" id="reemplazo" name="reemplazo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="0" style="text-align:center;">

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Cancelados:</label>
                            <input type="number" id="cancelados" name="cancelados" value="0" min="0"   onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" max="5550" step="1" value="0" min="0" max="5550" step="1" value="0" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control"> Rechazados:  </label>
                            <input type="number"  id="rechazados" name="rechazados" value="0" min="0" max="5550" step="1" value="0" min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"  max="5550" step="1" value="0" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  CURP:</label>
                            <input type="number" id="curp" name="curp" value="0" min="0"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"  max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Solicitud de Expedientes:  </label>
                            <input type="number" id="solicitudexpedientes" name="solicitudexpedientes" value="0" min="0"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"  max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Solicitud de Rectificación:</label>
                            <input type="number" id="solicitudrectificacion" name="solicitudrectificacion" value="0" min="0" max="5550"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" step="1" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control"> Demanda de jución:  </label>
                            <input type="number" id="demanda" name="demanda" value="0" min="0"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"  max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  TOTAL DE TRAMITES:</label>
                            <script type="text/javascript">
                                // tomar los valores de los tramites para sumarlos automaticamente 
                            function PasarValor2()
                            {
                            
                            var a = document.getElementById("inscripciones").value;
                            var b = document.getElementById("correcciones").value;
                            var c = document.getElementById("cambiod").value;
                            var d = document.getElementById("reposicion").value;
                            var e = document.getElementById("corecciondatosd").value;
                            var f = document.getElementById("reincorporacion").value;
                            var g = document.getElementById("reemplazo").value;
                            var h = document.getElementById("cancelados").value;
                            var i = document.getElementById("solicitudexpedientes").value;
                            var j = document.getElementById("solicitudrectificacion").value;
                            var k = document.getElementById("demanda").value;

                            var sumatramites=0;
                            sumatramites = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g)+ parseInt(h)+ parseInt(i)+ parseInt(j)+ parseInt(k);
                        //document.getElementById("ttramites").value =a;
                            document.getElementById("ttramites").value =sumatramites;
                        }

                         function valida2(){

                               //var idmodulo=($("#modulo").val());

                              var x=document.getElementById("futilizado").value;
                              var y=document.getElementById("fnutilizado").value;
                              var folio=document.getElementById("finicial").value;
                              var utilizados = parseInt(x);
                              var noutilizados=parseInt(y);
                              var fo=parseInt(folio);

                          
                            if((utilizados==0) && (noutilizados==0)){
                              
                              // alert(fo);
                               document.getElementById("finicial").value  = fo+ 1;

                            }
                        }


                            </script>
                                <input type="text" class="form-control" id="ttramites" name="ttramites" readonly="readonly" style="text-align:center;"> 
                                </div>
                                </div>
                         </form>
                        </div>

                        <div id="menu2" class="tab-pane fade">

                        <script type="text/javascript">
                            function vsuma(){
                                var x=document.getElementById("futilizado").value;
                                var y=document.getElementById("fnutilizado").value;
                              
                               var suma = parseInt(x);

                            var a = document.getElementById("inscripciones").value;
                            var b = document.getElementById("correcciones").value;
                            var c = document.getElementById("cambiod").value;
                            var d = document.getElementById("reposicion").value;
                            var e = document.getElementById("corecciondatosd").value;
                            var f = document.getElementById("reincorporacion").value;
                            var g = document.getElementById("reemplazo").value;
                             var h = document.getElementById("cancelados").value;
                             var i = document.getElementById("solicitudexpedientes").value;
                             var j = document.getElementById("solicitudrectificacion").value;
                             var k = document.getElementById("demanda").value;
                             //var l = document.getElementById("rechazados").value;
                             //var m = document.getElementById("curp").value;
                         
                             var ttramites= document.getElementById("ttramites").value;


                            var sumatramites = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g)+ parseInt(h)+ parseInt(i)+ parseInt(j)+ parseInt(k)+parseInt(y);
                         

                            if(sumatramites != suma){
                                alert("Los valores registrados en folios y en tramites no son iguales, verifique por favor");
                               var bandera=1;
                               document.getElementById("bandera").value =bandera;
                               //$('#someTab').tab('show')
                               hidden.bs.tab('show')
                          


                            }

                          if ((ttramites==0) && (suma==0)){

                            var foantes = document.getElementById("ffinal").value;
                            var folioantes=parseInt(foantes)-1;
                          
                            document.getElementById("ffinal").value= folioantes;
                            document.getElementById("finicial").value= folioantes;   


                          }

                          }

                            
                        </script>


                        <br>
                        <h5>Asigne los valores correspondientes a cada elemento </h5> <br>
                        <script type="text/javascript">
                          
                          function bandera2(){
                            var ban= document.getElementById("bandera").value;
                            alert ("alerta");

                          }
                        </script>

                        <div>
                            
                            <input type="" id="bandera" name="bandera" style="text-align:center;"> 
                            <label for="inscr" class="form-control"> Credenciales iniciales del día:</label>

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

                             $sql="select credencialdisponible from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idusuario." and remesas.reported.idreported=".$ultimoidreporte." ";
                           
                            $query = $con->query($sql);
                            $r=$query->fetch_array();
                          $credencialdisponible=$r["credencialdisponible"] ;


                           }

                            ?>
                            <input type="number" id="disponible" name="disponible"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  readonly="readonly"
                             value="<?php print $credencialdisponible?>" style="text-align:center;">

                             <br>
                             <br>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Actualización  :  </label>
                            <input type="number" id="actualizacion" name="actualizacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;" >

                        
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Otros tipos :</label>
                           <input type="number" id="otrotipo" name="otrotipo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>


                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inscr" class="form-control">  Importadas  :  </label>
                            <input type="number" id="importadas" name="importadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Exportadas :</label>
                            <input type="number" id="exportadas" name="exportadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Entregadas  :  </label>
                            <input type="number" id="entregadas" name="entregadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"value="0" style="text-align:center;">
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Anexas :</label>
                            <input type="number" id="anexas" name="anexas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reimpresiones :  </label>
                            <input type="number" id="reimpresiones" name="reimpresiones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Robo o Extravió :</label>
                            <input type="number" id="robo" name="robo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Retiradas :  </label>
                         <input type="number" id="retiradas" name="retiradas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="0" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> CREDECIALES DISPONIBLES :</label>

                       <script type="text/javascript">
                            // tomar los valores de los tramites para sumarlos automaticamente 
                        function PasarValor3()
                        {


                        var credencialesactuales,a,b,c,d,e,f,g,h,i,suma,resta, sumacredenciales=0;

                        credencialesactuales=document.getElementById("disponible").value;
                        a = document.getElementById("actualizacion").value;
                        b = document.getElementById("otrotipo").value;
                        c = document.getElementById("importadas").value;
                          //---para restar
                        d = document.getElementById("exportadas").value;
                      
                        e = document.getElementById("entregadas").value;
                        f = document.getElementById("anexas").value;
                        g = document.getElementById("reimpresiones").value;
                        h = document.getElementById("robo").value;
                        i = document.getElementById("retiradas").value;

                        suma = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt (credencialesactuales);
                        //sumacredenciales = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d);
                        resta=  parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g)+ parseInt(h)+ parseInt(i);
                        sumacredenciales=suma-resta;
                       document.getElementById("tcredenciales").value= sumacredenciales;
                        //document.getElementById("tcredenciales").value =credencialesactuales;


                    }

                        </script>


                            <input type="text" class="form-control" id="tcredenciales" name="tcredenciales" readonly="readonly"  style="text-align:center;"> 
                            </div>
                            </div>

                           
                    </button>
                        </div>
                        </div>

                        <div id="menu3" class="tab-pane fade">

                        <br>
                          
       <center> <label align="center" required style="border:2px solid red; font-size: 12px;"> Requeridos para el funcionamiento </label></center> <br>

   
                        <div>

                            

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            
                            <label for="inscr" class="form-control">  Sobrantes  :  </label>
                            <input type="number" id="sobran" name="sobran" value="0" min="0" max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Duplicados:</label>
                            <input type="number" id="duplicados" name="duplicados" value="0" min="0" max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reimpresiones  :  </label>
                            <input type="number"  id="reimpreso" name="reimpreso" value="0" min="0" max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Credencial DEV-TE:</label>
                            <input type="number" id="devtec" name="devtec" value="0" min="0" max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Credencial Duplicada  :  </label>
                            <input type="number" id="credup" name="credup" value="0" min="0" max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Credenciales de Canjes:</label>
                            <input type="number" id="ccanjeable"  name="ccanjeable" value="0" min="0" max="5550" step="1" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"  required > <abbr title="Este campo es obligatorio">*</abbr> Dia Laborable :</label>
                            <select id="laborable" name="laborable" required  >
                            <option value="0">Seleccione:</option>
                            <option value="1">SI </option> 
                              <option value="2">NO </option>
                            </select>

                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control" onmouseenter="avisar();" required >Incidencias registradas en el día :</label>
                            <select id="incidencias" name="incidencias" onmouseover="avisar();"required >
                            <option value="0">Seleccione:</option>
                            <option value="1">SI </option> 
                              <option value="2">NO </option>
                            </select>

                            <script type="text/javascript">

                            function avisar(){
                              alert("Recuerde activar la opción de día laborable para poder utilizar esta función");
                            }
                            </script>

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Fichas entregadas :</label>
                            <input type="number"  id="fichasentregadas" name="fichasentregadas" value="0" min="0" max="5550" step="1"  style="text-align:center;" onkeyup="validarvv();">

                        
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Fichas atendidas:</label>
                            <input type="number" id="fichasatendidas" name="fichasatendidas" value="0" min="0" max="5550" step="1" style="text-align:center;" onclick="validarv();avisar();" onkeyup="validarv();"> 

                            <script type="text/javascript">
                                function validarv(){
                                x=document.getElementById("fichasentregadas").value;
                               y=document.getElementById("fichasatendidas").value;

                               if(y>x){

                                alert("No puedes tener más fichas atendidas que las repartidas, verifiqué el dato");
                               }
                               
                               }
                            </script>
                             <script type="text/javascript">
                                function validarvv(){
                                x=document.getElementById("fichasentregadas").value;
                               y=document.getElementById("fichasatendidas").value;

                               if(y>x){

                                alert("No puedes tener más fichas repartidas que las entregadas, verifiqué el dato");
                               }
                               
                               }
                            </script>
                            </div>
                            </div>

                           

                        </div>

                    </div>
                    <div id="menu4" class="tab-pane fade">

                            <h5>Ingrese los datos correspondientes </h5> <br>

                     <div class="form-row">
                     <div class="form-group col-md-12">
                      <label for="tipomodulo">Num. de incidencias a registrar: </label>
                      <input type="number" id="registrar" name="registrar" min="1"  placeholder="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="fs();" onkeyup="fs();" value="1" style="text-align:center;"> 
                     
                       <script type="text/javascript">
                         function fs(){
                         var x=document.getElementById("registrar").value;
                        if(x>=2){
                        document.getElementById('guardart').disabled=true;
                         document.getElementById('guardar').disabled=false;
                        }else{
                              document.getElementById('guardart').disabled=true;
                        }
            
                    }

           </script>

                    </div>
                    </div>
                           
                    <div class="form-row">
                     <div class="form-group col-md-12">
                      <label for="tipomodulo">Situación del Módulo</label>
                      <select id="inhabilitado" name="inhabilitado" class="form-control"    rows="5" readonly="readonly">
                      <option value="0">Seleccione:</option>
                      <option value="1">Módulo NO Inhabilitado </option> 
                      <option value="2">Módulo  Inhabilitado </option>
                    </select>
                    </div>
                    </div>


                    <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="tipomodulo">Tipo de Incidencia:</label>

                     <select id="tipoincidencia" name="tipoincidencia" class="form-control" rows="5" readonly="readonly" onchange="myFunction()";>
                       <option value="0">Seleccione:</option>
                      <?php

                       $sql3="SELECT idincidencias,incidencias FROM remesas.incidencias"; // encontrar el tipo de modulo
                        $query = $con -> query($sql3);
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idincidencias].'">'.utf8_encode($valores[incidencias]).'</option>';
               
                            }
                        ?>
                        </select>
                    </div>
                    </div>
                    <br>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Núm de caso CAU:</label>
                            <input type="text" id="cau" name="cau" style="text-align:center;"> 
                            </div>
                            </div>



                     <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Descripción del problema:</label>
                            <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>

                        </DIV>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Solución o Situación actual:</label>
                            <textarea class="form-control" rows="5" id="solucion" name="solucion"></textarea>

                        </DIV>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> ¿Cómo y cuándo se solucionó?:</label>
                            <textarea class="form-control" rows="5" id="como" name="como"></textarea>

                        </DIV>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Tiempo en horas que paro el módulo :</label>
                            <input type="text" id="tiempo" name="tiempo" value="0"  style="text-align:center;"> HRS
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Justifique el rango ocurrido  :</label>
                            <input type="text" class="form-control" id="Justifique" name="Justifique"  style="text-align:center;" >
                            </div>
                        </div>  

               
                </div> 
    <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <a class="btn btn-warning btnNext" > SIGUIENTE APARTADO </a>
    </div>
    <div class="tab-pane" id="menu2">
        <a class="btn btn-primary btnNext" >Next</a>
        <a class="btn btn-primary btnPrevious" >Previous</a>
    </div>
    <div class="tab-pane" id="tab3">
        <a class="btn btn-primary btnPrevious" >Previous</a>
    </div>
</div>

<br>
<script>
   $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</script>
             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR" onmouseover="siguardo();">
                    </button>
                                    
                    <a href="listareported.php" class="btn btn-success" role="button">CANCELAR</a>


            </form>
            <script type="text/javascript">
                function myFunction() {
                var x = document.getElementById("tipoincidencia").value;
              
                document.getElementById('guardar').disabled=false;         
        }


           </script>
           
                       <script type="text/javascript">

$("document").ready(function(){
                document.getElementById('guardar').disabled=true;
                document.getElementById('inhabilitado').disabled=true;
                document.getElementById('tipoincidencia').disabled=true;
                document.getElementById('cau').disabled=true;
                document.getElementById('descripcion').disabled=true;
                document.getElementById('solucion').disabled=true;
                document.getElementById('como').disabled=true;
                document.getElementById('tiempo').disabled=true;
                document.getElementById('Justifique').disabled=true;
                document.getElementById('registrar').disabled=true;
                document.getElementById('incidencias').disabled=true;
   

         $("#laborable").change(function(){
                                      var id=($("#laborable").val());
                                     // alert (id);
                                      if(id==1){
                                        //alert ("Es un día laborable");
                                        //desahilitados
                                           document.getElementById('inhabilitado').disabled=true;
                                            document.getElementById('tipoincidencia').disabled=true;
                                            document.getElementById('cau').disabled=true;
                                            document.getElementById('descripcion').disabled=true;
                                            document.getElementById('solucion').disabled=true;
                                            document.getElementById('como').disabled=true;
                                            document.getElementById('tiempo').disabled=true;
                                            document.getElementById('Justifique').disabled=true;
                                            document.getElementById('registrar').disabled=true;
                                            document.getElementById('guardar').disabled=true;
                                            //habilitados
                                            document.getElementById('incidencias').disabled=false;
                                           document.getElementById('fichasatendidas').disabled=false;
                                          document.getElementById('fichasentregadas').disabled=false;
                                          document.getElementById('sobran').disabled=false;
                                         document.getElementById('duplicados').disabled=false;
                                          document.getElementById('reimpreso').disabled=false;
                                         document.getElementById('devtec').disabled=false;
                                          document.getElementById('credup').disabled=false;
                                         document.getElementById('ccanjeable').disabled=false;
                                         document.getElementById('incidencias').disabled=false;
                                       
  
                                      }else{
                                        //alert("fue un día no laborable");
                                        document.getElementById('inhabilitado').disabled=false;
                                            document.getElementById('tipoincidencia').disabled=false;
                                            document.getElementById('cau').disabled=false;
                                            document.getElementById('descripcion').disabled=false;
                                            document.getElementById('solucion').disabled=false;
                                            document.getElementById('como').disabled=false;
                                            document.getElementById('tiempo').disabled=false;
                                            document.getElementById('Justifique').disabled=false;
                                            document.getElementById('registrar').disabled=true;
                                            document.getElementById('guardar').disabled=true;
                                            //habilitados
                                            document.getElementById('incidencias').disabled=true;
                                           document.getElementById('fichasatendidas').disabled=true;
                                          document.getElementById('fichasentregadas').disabled=true;
                                          document.getElementById('sobran').disabled=true;
                                         document.getElementById('duplicados').disabled=true;
                                          document.getElementById('reimpreso').disabled=true;
                                         document.getElementById('devtec').disabled=true;
                                          document.getElementById('credup').disabled=true;
                                         document.getElementById('ccanjeable').disabled=true;
                                         validarexistencia();
   

                                         $('#incidencias').prop('selectedIndex',0); 

                                        }

             })

                                
               $("#incidencias").change(function(){

                    var id2=($("#incidencias").val());
                     //alert (id2);
                     if(id2==1){

                         document.getElementById('inhabilitado').disabled=false;
                          document.getElementById('tipoincidencia').disabled=false;
                          document.getElementById('cau').disabled=false;
                      document.getElementById('descripcion').disabled=false;
                          document.getElementById('solucion').disabled=false;
                          document.getElementById('como').disabled=false;
                          document.getElementById('tiempo').disabled=false;
                         document.getElementById('Justifique').disabled=false;
                         document.getElementById('registrar').disabled=false;
                          document.getElementById('guardar').disabled=true;


                     }else{
                            document.getElementById('guardar').disabled=false;
                         document.getElementById('inhabilitado').disabled=true;
                         document.getElementById('tipoincidencia').disabled=true;
                          document.getElementById('cau').disabled=true;
                          document.getElementById('descripcion').disabled=true;
                       document.getElementById('solucion').disabled=true;
                          document.getElementById('como').disabled=true;
                       document.getElementById('tiempo').disabled=true;
                       document.getElementById('Justifique').disabled=true;
                       document.getElementById('registrar').disabled=true;

                     }


               })

})
       function validarexistencia(){
      
        var x=0;
        var y=0;
        var suma=0;
        x=document.getElementById("futilizado").value;
        y=document.getElementById("fnutilizado").value;
        suma = parseInt(x)+ parseInt(y);
      
        //________________________________________//

        var a = document.getElementById("inscripciones").value;
        var b = document.getElementById("correcciones").value;
        var c = document.getElementById("cambiod").value;
        var d = document.getElementById("reposicion").value;
        var e = document.getElementById("corecciondatosd").value;
        var f = document.getElementById("reincorporacion").value;
        var g = document.getElementById("reemplazo").value;
        var h = document.getElementById("cancelados").value;
        var i = document.getElementById("solicitudexpedientes").value;
        var j = document.getElementById("solicitudrectificacion").value;
        var k = document.getElementById("demanda").value;
        var sumatramites=0;
        sumatramites = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g)+ parseInt(h)+ parseInt(i)+ parseInt(j)+ parseInt(k);
  

        //_____________________________________________________//


        var credencialesactuales=document.getElementById("disponible").value;
        var tcredenciales=document.getElementById("tcredenciales").value;

         if((suma>0) ||(sumatramites>0)|| (credencialesactuales<tcredenciales)){
            alert("Ha ingreso datos en el formulario anterior, verifiqué si el día en verdad no es laborado.");
         }
                     

}


function siguardo(){
  alert ("NO ESTAS PREPARADO PARA GUARDAR");
}
       
            </script>

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>
