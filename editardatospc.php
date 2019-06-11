<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
    
		if($idusuario!=''){
		} 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}

           
	if($_POST['guardar']){
     if(($_POST['remesa']>=1)){ 
              $idreported=$_GET['id'];
                ECHO $fecha=$_POST['fecha'];
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
               echo $idmodulo=$_POST['modulo'];
               echo "<br>";
                echo "el id de la REMESA ES :";
                echo $remesa=$_POST['remesa'];  
              echo "<br>";


                //BUSCAR EL ID AL QUE CORRESPONDA EL MÓDULO PARA LLENARLE A SU CONTEO 
              

                 $sql="select idencargadoRM from remesas.encargadorm where encargadorm.modulo_idmodulo=$idmodulo;";
                    $query = $con->query($sql);
                    $r=$query->fetch_array();
                  
                  $idencargadoRM=$r["idencargadoRM"];
                
            
                 $sql3 =("UPDATE reported  set entidad=30, fecha='$fecha',folioinicial='$finicial',
                    foliofinal='$ffinal', totalfinal='$futilizado', folionocupados='$fnutilizado', inscripciones='$inscripciones', correcion='$corre', cambiodom='$cambiod', reposicion='$reposicion', coreccionddireccion='$corecciondatosd',
                     reincorporacion='$reincorporacion', reemplazo='$reemplazo', total='$ttramit', cancelados='$cancelados', rechazados='$rechazados', curp='$curp', solicitudexpedicion='$solicitudexpedientes', solicitudrectificacion='$solicitudrectificacion', demandajucion='$demanda', credencialinicial=0, credencialinidia='$disponible', actualizacion='$actualizacion', otrotipo='$otrotipo', importadas='$importadas', exportadas='$exportadas', entregadas='$entregadas', anexas='$anexas', reimpresiones='$reimpresiones', robo='$robo', retiradas='$tcredenciales', sobran= '$sobran', 
                     duplicadas='$duplicados', reimpresion='$reimpreso', credevte='$devtec', credencialduplicadas= '$credup', credencialcanjeadables='$ccanjeable', dialaborable=1, fichasentregadas='$fichasentregadas', fichasatendidas='$fichasatendidas', credencialdisponible='$tcredenciales', idllenado='$idusuario', encargadoRM_idencargadoRM='$idencargadoRM', modulo_idmodulo='$idmodulo', remesa_idremesa='$remesa' where idreported='$idreported';"); 

                 echo $sql3;


                $query1 = $con -> query($sql3);
                echo "<script>alert('El registro del día se actualizo con éxito!');window.location='listareported.php';</script>";

    

               
    }else{
       echo "<script>alert('No ha seleccionado la remesa, intente nuevamente');</script>";
      }
        
  }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

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
    </style>
    <body>
         <?php include "menub.php";
         $idreported=$_GET['id'];

         $sql="SELECT * FROM reported where idreported=$idreported";
          $rs = $con->query($sql);
          if($rs){
            while ($fila = $rs->fetch_object()){
              $fecha=$fila->fecha;
              $folioinicial=$fila->folioinicial;
              $foliofinal=$fila->foliofinal;
              $totalfinal=$fila->totalfinal;
              $folionocupados=$fila->folionocupados;
              $inscripciones=$fila->inscripciones;
              $correcion=$fila->correcion;
              $cambiodom=$fila->cambiodom;
              $reposicion=$fila->reposicion;
              $coreccionddireccion=$fila->coreccionddireccion;
              $reincorporacion=$fila->reincorporacion;
              $reemplazo=$fila->reemplazo;
              $total=$fila->total;
              $cancelados=$fila->cancelados;
              $rechazados=$fila->rechazados;
              $curp=$fila->curp;
              $solicitudexpedicion=$fila->solicitudexpedicion;
              $solicitudrectificacion=$fila->solicitudrectificacion;
              $demandajucion=$fila->demandajucion;
              $credencialinicial=$fila->credencialinicial;
              $credencialinidia=$fila->credencialinidia;
              $actualizacion=$fila->actualizacion;
              $otrotipo=$fila->otrotipo;
              $importadas=$fila->importadas;
              $exportadas=$fila->exportadas;
              $entregadas=$fila->entregadas;
              $anexas=$fila->anexas;
              $reimpresiones=$fila->reimpresiones;
              $robo=$fila->robo;
              $retiradas=$fila->retiradas;
              $sobran=$fila->sobran;
              $duplicadas=$fila->duplicadas;
              $reimpresion=$fila->reimpresion;
              $credevte=$fila->credevte;
              $credencialduplicadas=$fila->credencialduplicadas;
              $credencialcanjeadables=$fila->credencialcanjeadables;
              $dialaborable=$fila->dialaborable;
              $fichasentregadas=$fila->fichasentregadas;
              $fichasatendidas=$fila->fichasatendidas;
              $credencialdisponible=$fila->credencialdisponible;
             $idllenado=$fila->idllenado;
             $idencargado=$fila->encargadoRM_idencargadoRM;

              $modulo_idmodulo=$fila->modulo_idmodulo;
              $remesa_idremesa=$fila->remesa_idremesa;

            }
        }
          ?>
         <br>
        <h3 align="center">Registro de SIIRFE Diario</h3>
        <h6 align="center"> Modifique los campos necesarios </h6>


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
                         echo '<option value="'.$valores[idremesa].'">'.$valores[remesa].'</option>';
                        }
                    ?>
                   </select>
                

                 <label>*</label><label for="entidad">Entidad:</label>
                    <input type="text" class="form-control" id="entidad" name="entidad" placeholder="VERACRUZ" readonly="readonly" >
                    <label>*</label><label for="distrito">Distrito :</label>

                    <select name="distrito" class="form-control" rows="5" readonly="readonly"> 
                         <?php
                        
                        $idusuario=$_SESSION['usuario'][0]['id'];

                       $sql3="select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        //$id=$r["distrito_iddistrito"];
                        $id=$r["distrito_iddistrito"];

                        $sql3 =("select * from distrito where distrito.iddistrito=$id");
                        $query = $con -> query($sql3);
                       
                            while ($valores = mysqli_fetch_array($query)) {
                             echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>
                    </select>

                     <label>*</label><label for="tipomodulo">Módulo:</label>

                     <select id="modulo" name="modulo" class="form-control" rows="5" readonly="readonly">
                        <?php
                       $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idencargado;";
                        $query = $con->query($sql3);

                        $r=$query->fetch_array();
                        //$id=$r["distrito_iddistrito"];
                       $id=$r["modulo_idmodulo"];

                      $sql4 =("select * from modulo where modulo.idmodulo=$id");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[idmodulo].'</option>';

                            }
                        ?>
                        </select>


                     <label>*</label><label for="tipomodulo">Tipo de Módulo:</label>

                     <select id="tipomodulo" name="tipomodulo" class="form-control" rows="5" readonly="readonly">

                      <?php
                         $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idencargado;";
                        $query = $con->query($sql3);

                        $r=$query->fetch_array();
                       $idmodulo=$r["modulo_idmodulo"];

                       $sql4 =("select * from modulo where modulo.idmodulo=$idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[tipomodulo].'</option>';

                            }
                        ?>

                        </select>
                        <label>*</label> <label for="cargo">Fecha del reporte </label>
                       
                     <input type="date" class="form-control" name="fecha" id="fecha" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo $fecha?>" style="text-align:center;">

                     <br>                  
                    <hr style="border-color: black" />

                    <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home"> FOLIOS </a></li>
                    <li><a data-toggle="tab" href="#menu1"> TRAMITES </a></li>
                   <li><a data-toggle="tab" href="#menu2" onclick="vsuma();"> CREDENCIALES </a></li>
                    <li><a data-toggle="tab" href="#menu3"> OTROS </a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <label></label><label for="foliou">Folio de Inicio:</label> 
                           
                            <input type="text" class="form-control" id="finicial" name="finicial" readonly="readonly"
                            value="<?php print $folioinicial?>" style="text-align:center;">
                            <script type="text/javascript">
                                // va a tomar los valores de los folios inicio y final para sumarlos con el del registro pasado.
                            function PasarValor(){
                             
                               var x=0;
                               var y=0;
                               var z=0;
                               var suma=0;
                           
                               x=document.getElementById("futilizado").value;
                               y=document.getElementById("fnutilizado").value;
                               z=document.getElementById("finicial").value; // el valor del folio inicial del otro registro
                               suma = parseInt(x)+ parseInt(y) + parseInt(z);


                                document.getElementById("ffinal").value  = suma;


                            }

                             </script>
                             <label></label><label for="foliofin">Folio Final:</label>
                                <input type="text" class="form-control" id="ffinal" name="ffinal" readonly="readonly" value="<?php print $foliofinal?>" style="text-align:center;">
                                 <br>

                                <label></label><label for="foliou">Num. de Folios Utilizados:</label>
                                <input type="number" id="futilizado" name="futilizado" min="0"  placeholder="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor(); validar();" onkeyup="PasarValor(); validar();" value="<?php print $totalfinal?>" style="text-align:center;">   <br>

    

                            <label></label><label for="folion">Num. de Folios NO Utilizados:</label>
                             <input type="number" id="fnutilizado" name="fnutilizado" min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/         placeholder="9" onclick ="PasarValor();" onkeyup="PasarValor();" value="<?php print $folionocupados?>" style="text-align:center;"> <br>

                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <br>
                         <h5>Modifique los campos necesarios </h5> <br>

                         <form>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Inscripciones  :  </label>
    
                             <input type="number" id="inscripciones" name="inscripciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();" value="<?php print $inscripciones?>" style="text-align:center;">

                             

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Correcciones:</label>
                             <input type="number" id="correcciones" name="correcciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="<?php print $correcion?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Cambio de Domicilio  :  </label>
                             <input type="number" id="cambiod" name="cambiod"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();"value="<?php print $cambiodom?>" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Reposición:</label>
                            <input type="number" id="reposicion" name="reposicion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();" value="<?php print $reposicion?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Corrección de Datos Dirección:  </label>
                             <input type="number" id="corecciondatosd" name="corecciondatosd"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"value="<?php print $coreccionddireccion?>" style="text-align:center;">

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Reincorporación:</label>
                            <input type="number" id="reincorporacion" name="reincorporacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"value="<?php print $reincorporacion?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reemplazo:  </label>
                            <input type="number" id="reemplazo" name="reemplazo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();"value="<?php print $reemplazo?>" style="text-align:center;">

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Cancelados:</label>
                            <input type="number" id="cancelados" name="cancelados" value="0" min="0" max="5550" step="1" value="0" min="0" max="5550" step="1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="<?php print $cancelados?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control"> Rechazados:  </label>
                            <input type="number"  id="rechazados" name="rechazados" value="0" min="0" max="5550" step="1" value="0" min="0" max="5550" step="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="<?php print $rechazados?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  CURP:</label>
                            <input type="number" id="curp" name="curp" value="0" min="0" max="5550" step="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="<?php print $curp?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Solicitud de Expedientes:  </label>
                            <input type="number" id="solicitudexpedientes" name="solicitudexpedientes" value="0" min="0" max="5550" step="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="<?php print $solicitudexpedientes?>" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Solicitud de Rectificación:</label>
                            <input type="number" id="solicitudrectificacion" name="solicitudrectificacion" value="0" min="0" max="5550" step="1"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" value="<?php print $solicitudrectificacion?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control"> Demanda de jución:  </label>
                            <input type="number" id="demanda" name="demanda" value="0" min="0" max="5550"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" step="1" value="<?php print $demandajucion?>" style="text-align:center;"> 
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

                            </script>
                                <input type="text" class="form-control" id="ttramites" name="ttramites" readonly="readonly" value="<?php print $total?>" style="text-align:center;">
                                </div>
                                </div>
                         </form>
                        </div>

                         <script type="text/javascript">
                            function vsuma(){
                                var x=document.getElementById("futilizado").value;
                               var y=document.getElementById("fnutilizado").value;
                              
                               var suma = parseInt(x)+ parseInt(y);

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
                             var l = document.getElementById("rechazados").value;
                             var m = document.getElementById("curp").value;


                            var sumatramites = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g)+ parseInt(h)+ parseInt(i)+ parseInt(j)+ parseInt(k)+ parseInt(l)+ parseInt(m);
                            

                            if(sumatramites != suma){
                                alert("Los valores registrados en folios y en tramites no son iguales, verifique por favor");

                            }
                            }
                            
                        </script>

                        <div id="menu2" class="tab-pane fade">
                        <br>
                        <h5>Modifique los campos necesarios </h5> <br>

                        <div>
                           
                             <div class="form-row">
                            <div class="form-group col-md-12">
            

                            <label for="inscr" class="form-control"> Credenciales iniciales del día:</label>

                             <?php 
                            // buscar el ultimo id registro de los reportes para despues ocuparlo para sacar el total de credenciales disn
                           $sql3="SELECT MAX(idreported) AS idreported FROM reported";
                     
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                         $ultimoidreporte=$r["idreported"];

                             if($ultimoidreporte==0){
                                $credencialdisponible=0;
                            }

                           else 
                           { 

                       $sql="select credencialdisponible from reported where reported.encargadoRM_idencargadoRM=".$idencargado." and reported.idreported=".$idreported." ;";
                           
                            $query = $con->query($sql);
                            $r=$query->fetch_array();
                         $credencialdisponible=$r["credencialdisponible"] ;


                           }

                            ?>
                            <input type="number" id="disponible" name="disponible"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  readonly="readonly"
                             value="<?php print $credencialdisponible?>" style="text-align:center;">

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Actualización  :  </label>
                            <input type="number" id="actualizacion" name="actualizacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"  value="<?php print $actualizacion?>" style="text-align:center;">

                        
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Otros tipos :</label>
                           <input type="number" id="otrotipo" name="otrotipo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"  value="<?php print $otrotipo?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inscr" class="form-control">  Importadas  :  </label>
                            <input type="number" id="importadas" name="importadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"  value="<?php print $importadas?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Exportadas :</label>
                            <input type="number" id="exportadas" name="exportadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"  value="<?php print $exportadas?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Entregadas  :  </label>
                            <input type="number" id="entregadas" name="entregadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="<?php print $entregadas?>" style="text-align:center;">
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Anexas :</label>
                            <input type="number" id="anexas" name="anexas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="<?php print $anexas?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reimpresiones :  </label>
                            <input type="number" id="reimpresiones" name="reimpresiones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"  value="<?php print $reimpresiones?>" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Robo o Extravió :</label>
                            <input type="number" id="robo" name="robo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();"  value="<?php print $robo?>" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Retiradas :  </label>
                         <input type="number" id="retiradas" name="retiradas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3(); validar();" onkeyup="PasarValor3(); validar();" value="<?php print $retiradas?>" style="text-align:center;">
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


                            <input type="text" class="form-control" id="tcredenciales" name="tcredenciales" readonly="readonly"  value="<?php print $credencialdisponible?>" style="text-align:center;">  
                            </div>
                            </div>

                           
                    </button>
                        </div>
                        </div>

                        <div id="menu3" class="tab-pane fade">

                        <br>
                         <h5>Modifique los campos necesarios </h5> <br>
   
                        <div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            
                            <label for="inscr" class="form-control">  Sobrantes  :  </label>
                             <input type="number"  id="sobran" name="sobran" min="0" 
                             value="<?php print $sobran?>" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Duplicados:</label>
                            <input type="number"  id="duplicados" name="duplicados" min="0"
                             value="<?php print $duplicadas?>" style="text-align:center;">
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reimpresiones  :  </label>
                            <input type="number"  id="reimpreso" name="reimpreso" min="0"
                             value="<?php print $reimpresion?>" style="text-align:center;">  
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Credencial DEV-TE:</label>
                             <input type="number"  id="devtec" name="devtec" min="0"
                             value="<?php print $credevte?>" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Credencial Duplicada  :  </label>
                            <input type="number"  id="credup" name="credup" min="0" 
                             value="<?php print $credencialduplicadas?>" style="text-align:center;">  
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Credenciales de Canjes:</label>
                           <input type="number"  id="ccanjeable"  name="ccanjeable" min="0" 
                             value="<?php print $credencialcanjeadables?>" style="text-align:center;"> 
                            </div>
                            </div>

                          
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Fichas entregadas :</label>
                            <input type="number"  id="fichasentregadas" name="fichasentregadas" min="0" 
                             value="<?php print $fichasentregadas?>" style="text-align:center;">

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Fichas atendidas:</label>
                            <input type="number"  id="fichasatendidas" name="fichasatendidas" min="0" 
                             value="<?php print $fichasatendidas?>" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                             <label for="correc" class="form-control"> Configuración :</label>
                                  <?php
                              $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idencargado;";
                              $query = $con->query($sql3);

                              $r=$query->fetch_array();
                             $idmodulo=$r["modulo_idmodulo"];

                              $sql4 =("select * from modulo where idmodulo=$idmodulo");         
                               $query = $con -> query($sql4);
                              $r=$query->fetch_array();

                              $configuracionmodulo=$r["configuracion"];
                                  
                             ?>

                    <input type="text" class="form-control" id="configuracionmodulo" name="clave" readonly="readonly" value="<?php print $configuracionmodulo ?>" style="text-align:center;"> 
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Total de equipos configurados:</label>
                               <?php

                              $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idencargado;";
                              $query = $con->query($sql3);

                              $r=$query->fetch_array();
                             $idmodulo=$r["modulo_idmodulo"];

                              $sql4 =("select * from modulo where modulo.idmodulo=$idmodulo");
                                            
                               $query = $con -> query($sql4);
                              $r=$query->fetch_array();
                            $totalequipos=$r["totalequipos"];

                             ?>

                    
                           <input type="text" class="form-control" id="equipos" name="clave" readonly="readonly" value="<?php print $totalequipos ?>" style="text-align:center;" > 

                            </div>
                            </div>

                        
                        <bR>

                        </div>

                    </div>
                    
             <BUTTON><input type="submit" class="btn btn-primary" id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                
                    <a href="listareportedc.php" class="btn btn-success" role="button">CANCELAR</a>


            </form>




        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


