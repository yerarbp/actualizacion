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
     if(($_POST['remesa']>=1)){    
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
                 echo $iddistrito=$_POST['distrito']; 
                
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

                 $sql3="SELECT MAX(idperiodo) AS idperiodo FROM periodo;";
                  $query = $con->query($sql3);
                  $r=$query->fetch_array();
                  $periodo=$r["idperiodo"];


                ECHO $sql3 =("INSERT INTO reporteincidencias (fecha, inhabilitado, cao, descripcion, solucion,como, tiempo,justifique,idllenado, encargadoRM_idencargadoRM, modulo_idmodulo, remesa_idremesa,incidencias_idincidencias,distrito_iddistrito,validado,periodo_idperiodo) 


                     VALUES ('$fecha','$inhabilitado','$cau','$descripcion','$solucion','$como', 
                     '$tiempo','$justifique','$idusuario','$idusuario','$idmodulo', '$remesa', '$tipoincidencia','$iddistrito',2,'$periodo');");
                   

                    $query1 = $con -> query($sql3);

                  
                        echo "<script>alert('El registro de incidencia se guardo correctamente!');window.location='capturarincidencias.php';</script>";
 
            
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

        <title>Registro Incidencias </title>

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
        <h3 align="center">Registro de Incidencias </h3>
        <h6 align="center"> Ingrese las incidencias correspondientes </h6>


        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
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
                

                 <label>*</label><label for="entidad">Entidad:</label>
                    <input type="text" class="form-control" id="entidad" name="entidad" placeholder="VERACRUZ" readonly="readonly" >
                    <label>*</label><label for="distrito">Distrito :</label>

                    <select name="distrito" class="form-control" rows="5" readonly="readonly"> 
                        <?php
                        //$sql3="select distrito_iddistrito from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el id que pertenece el distrito
                        $idusuario=$_SESSION['usuario'][0]['id'];

                        $sql3="select distrito_iddistrito from encargadoRM where idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        //$id=$r["distrito_iddistrito"];
                         $id=$r["distrito_iddistrito"];
                         $sql3 =("select * from remesas.distrito where remesas.distrito.iddistrito=$id");
                        $query = $con -> query($sql3);
                       
                            while ($valores = mysqli_fetch_array($query)) {
                             echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>
                    </select>

                     <label>*</label><label for="tipomodulo"> Módulo:</label>

                     <select id="modulo" name="modulo" class="form-control" rows="5" readonly="readonly">
                      <?php
                        $sql3="select modulo_idmodulo from encargadoRM where idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);

                        $r=$query->fetch_array();
                      $idmodulo=$r["modulo_idmodulo"];

                        $sql4 =("select * from remesas.modulo where remesas.modulo.idmodulo=$idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[idmodulo].'</option>';

                            }
                        ?>

                        </select>

                     <label>*</label><label for="tipomodulo">Tipo de Módulo:</label>

                     <select id="tipomodulo" name="tipomodulo" class="form-control" rows="5" readonly="readonly">
                      <?php
                         $sql3="select modulo_idmodulo from encargadoRM where idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);

                        $r=$query->fetch_array();
                       $idmodulo=$r["modulo_idmodulo"];

                       $sql4 =("select * from remesas.modulo where remesas.modulo.idmodulo=$idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[tipomodulo].'</option>';

                            }
                        ?>

                        </select>
                        <label>*</label> <label for="cargo">Fecha del reporte </label>
                

                    <input type="date" class="form-control" name="fecha" id="fecha" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo date("Y-m-d");?>" style="text-align:center;">

                     <br>                  
                    <hr style="border-color: black" />

                    <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home"> INCIDENCIAS </a></li>
                  
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h5>Ingrese los datos correspondientes </h5> <br>

                                           
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
                            <input type="text id="tiempo" name="tiempo" style="text-align:center;"> HRS
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Justifique el rango ocurrido  :</label>
                            <input type="text" class="form-control" id="Justifique" name="Justifique"  style="text-align:center;" >
                            </div>
                        </div>                   
               
                </div> 
             <BUTTON><input type="submit" class="btn btn-primary"   id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                    <a href="listareported.php" class="btn btn-success" role="button">SALIR </a>


            </form>
                      
          

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


