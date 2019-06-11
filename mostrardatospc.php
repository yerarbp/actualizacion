<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
    
		if($idusuario!=''){
		} 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}      
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon"   type ="image/PNG" href="img/INE2.PNG">

        <title>Mostrar datos del reporte SIIRFE</title>

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
         <?php include "menuc.php";
        
     $idreported=$_GET['id'];

     if ($idreported==1){
        
        
          
      }else{
        
       $idreported=$_GET['id'];
       ////////////////////////////////////////////////////
       $sql="select * from reported where idreported=$idreported;";
       $query = $con->query($sql);
        $r=$query->fetch_array();
      $idusuario=$r["encargadoRM_idencargadoRM"];
        ///////////////////////////////////////////////
        // saber el id máximo y minimo de los registros de dicho id de usuario
     
        $sql="select max(idreported) as maximo from reported where encargadoRM_idencargadoRM=$idusuario;";
        $query = $con->query($sql);
        $r=$query->fetch_array();
       $idmaximo=$r["maximo"];
        ///////////////////////////////////////
        $sql="select min(idreported) as minimo from reported where encargadoRM_idencargadoRM=$idusuario;";
        $query = $con->query($sql);
        $r=$query->fetch_array();
         $idminimo=$r["minimo"];
        ////////////////////////////////////


        if($idminimo!=$idmaximo){
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
   $valorinicialv=$datos[1];
   $indice=$total-1;
  



    if($valorinicialv==$idreported){
     

    }else{

      $indiceb=1;

      for ($i =1; $i <= $total; $i++) {
              if($datos[$i]==$idreported){
                   $posicion=$i-1;

                }
}

$valor=$datos[$posicion];

       $sql3="select foliofinal from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idusuario." and remesas.reported.idreported=$valor;"; ECHO "<BR>";
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                            
                            $ultimofolio=$r["foliofinal"];
                         $foliocortado = substr("$ultimofolio", -5);

              if($foliocortado==0){
                        


              }else{
           // ________________________________________________________
            //actualizo el valor del folio 
            //echo $ultimofolio1=$ultimofolio + 1;
            $sql=" UPDATE reported set folioinicial=$ultimofolio+1  where idreported=$idreported";
              $query1 = $con -> query($sql);
            }

            //_________________________________________________________________________

               $sql="SELECT * FROM reported where idreported=$idreported";
          $rs = $con->query($sql);
          if($rs){
             while ($fila = $rs->fetch_object()){
        
                $folioinicial=$fila->folioinicial;
                $totalfinal=$fila->totalfinal;
                $folionocupados=$fila->folionocupados;
               $totalfolios= $folioinicial+ $totalfinal+ $folionocupados-1;
            $sql=" UPDATE reported set foliofinal=$totalfolios where idreported=$idreported";
              $query1 = $con -> query($sql);

              }
            }
          //////////////////////////////////////////////

            
          $sql3="select credencialdisponible from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idusuario." and remesas.reported.idreported=$valor;";
         

              $query = $con->query($sql3);
                            $r=$query->fetch_array();
                           $credencialinidia=$r["credencialdisponible"];
                             

          $sql=" UPDATE reported set credencialinidia=$credencialinidia where idreported=$idreported";
              $query1 = $con -> query($sql);
              //______________________
          



    }
  

          

        }else{

        // No hace nada del if 64

        }
    
          

             $sql="SELECT * FROM reported where idreported=$idreported";
                $rs = $con->query($sql);
                if($rs){
                while ($fila = $rs->fetch_object()){
                
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
                

                $totalcredenciales=($credencialinidia+ $actualizacion+$otrotipo+$importadas)-($exportadas+$entregadas+$anexas+ $reimpresiones+$robo+$retiradas);

                 $sql=" UPDATE reported set credencialdisponible=$totalcredenciales where idreported=$idreported";
                  $query1 = $con -> query($sql);


                }
              }

      }
       
        
        
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
        <h3 align="center"> Reporte de SIIRFE Diario</h3>
     

        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

                <br><br>
                <div class="form-group" style="width: 50%;">
                  <label>*</label> <label for="nombre">Remesa:</label>
                  <select name="remesa" class="form-control" rows="5" readonly="readonly">
                    <?php
                    $sql3 =("select * from remesa where idremesa=$remesa_idremesa");
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
                                               
                         $sql3="select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";

                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
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
                       <!-- <input type="text" name="fecha" id="fecha" class="form-control"  readonly="readonly" value="<?php 
                    
                   


                  
                  $dialetra=$dia;
                  //El separa el campo fecha en las tres varibles respectivas ($ano,$mes,$dia);

                    echo ($dia)." de ".$meses[$mes-1]. " del ".date('Y') ;?> " style="text-align:center;"--> 
                    <?php
                     $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                  $dial = $dias[date('N', strtotime($fecha))];
                  $dial;
                  list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);




                    ?>

                     <input type="text" class="form-control" name="fecha" id="fecha" step="1" min="2000-01-01"  max="20000-01-01" value="<?php echo $dial.",". ($dia)." de ".$meses[$mes-1]. " del ".$ano ;?>" style="text-align:center;" readonly="readonly">

                     <br>                  
                    <hr style="border-color: black" />

                    <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home"> FOLIOS </a></li>
                    <li><a data-toggle="tab" href="#menu1"> TRAMITES </a></li>
                    <li><a data-toggle="tab" href="#menu2"> CREDENCIALES </a></li>
                    <li><a data-toggle="tab" href="#menu3"> OTROS </a></li>
                    <li><a data-toggle="tab" href="#menu4"> INCIDENCIAS </a></li>
              
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
                                <input type="text" class="form-control" id="ffinal" name="ffinal" readonly="readonly"  value="<?php print $foliofinal?>" style="text-align:center;">
                                 <br>

                                <label></label><label for="foliou">Num. de Folios Utilizados:</label>
                                <input type="number" id="futilizado" name="futilizado" min="0"  placeholder="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor(); validar();" onkeyup="PasarValor(); validar();" readonly="readonly" value="<?php print $totalfinal?>" style="text-align:center;"> <br>

    

                            <label></label><label for="folion">Num. de Folios NO Utilizados:</label>
                             <input type="number" id="fnutilizado" name="fnutilizado" min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/         placeholder="9" onclick ="PasarValor();" onkeyup="PasarValor();" readonly="readonly" value="<?php print $folionocupados?>" style="text-align:center;"> <br>

                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <br>
                         <h5>Los datos solo son de consulta </h5> <br>

                         <form>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Inscripciones  :  </label>
    
                             <input type="number" id="inscripciones" name="inscripciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();"  readonly="readonly" value="<?php print $inscripciones?>" style="text-align:center;">

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Correcciones:</label>
                             <input type="number" id="correcciones" name="correcciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" readonly="readonly" value="<?php print $correcion?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Cambio de Domicilio  :  </label>
                             <input type="number" id="cambiod" name="cambiod"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();"readonly="readonly" value="<?php print $cambiodom?>" style="text-align:center;" >
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Reposición:</label>
                            <input type="number" id="reposicion" name="reposicion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2();validar();"readonly="readonly" value="<?php print $reposicion?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Corrección de Datos Dirección:  </label>
                             <input type="number" id="corecciondatosd" name="corecciondatosd"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" readonly="readonly" value="<?php print $coreccionddireccion?>" style="text-align:center;">

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Reincorporación:</label>
                            <input type="number" id="reincorporacion" name="reincorporacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" readonly="readonly" value="<?php print $reincorporacion?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reemplazo:  </label>
                            <input type="number" id="reemplazo" name="reemplazo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2(); validar();" onkeyup="PasarValor2(); validar();" readonly="readonly" value="<?php print $reemplazo?>" style="text-align:center;" >

                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Cancelados:</label>
                            <input type="number" id="cancelados" name="cancelados" value="0" min="0" max="5550" step="1" value="0" min="0" max="5550" step="1" readonly="readonly" value="<?php print $cancelados?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control"> Rechazados:  </label>
                            <input type="number"  id="rechazados" name="rechazados" value="0" min="0" max="5550" step="1" value="0" min="0" max="5550" step="1" readonly="readonly" value="<?php print $rechazados?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  CURP:</label>
                            <input type="number" id="curp" name="curp" value="0" min="0" max="5550" step="1" readonly="readonly" value="<?php print $curp?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Solicitud de Expedientes:  </label>
                            <input type="number" id="solicitudexpedientes" name="solicitudexpedientes" value="0" min="0" max="5550" step="1" readonly="readonly" value="<?php print $solicitudexpedicion?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  Solicitud de Rectificación:</label>
                            <input type="number" id="solicitudrectificacion" name="solicitudrectificacion" value="0" min="0" max="5550" step="1" readonly="readonly" value="<?php print $solicitudrectificacion?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control"> Demanda de jución:  </label>
                            <input type="number" id="demanda" name="demanda" value="0" min="0" max="5550" step="1" readonly="readonly" value="<?php print $demandajucion?>" style="text-align:center;"> 
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control">  TOTAL DE TRAMITES:</label>
                            <script type="text/javascript" style="text-align:center;">
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
                            var sumatramites=0;
                            sumatramites = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g);
                        //document.getElementById("ttramites").value =a;
                            document.getElementById("ttramites").value =sumatramites;
                        }

                            </script>
                                <input type="text" class="form-control" id="ttramites" name="ttramites" readonly="readonly"  value="<?php print $total?>" style="text-align:center;"> 
                                </div>
                                </div>
                         </form>
                        </div>

                        <div id="menu2" class="tab-pane fade">
                        <br>
                        <h5>Los datos solo son de consulta </h5> <br>

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

                                           $sql="select * from reported where idreported=$idreported;";
                                               
                                                $query = $con->query($sql);
                                                $r=$query->fetch_array();
                                             $credencialdisponible=$r["credencialinidia"] ;


                                               }

                                  ?>

                            <input type="number" id="disponible" name="disponible"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  readonly="readonly"
                             value="<?php print $credencialdisponible?>" style="text-align:center;">

                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Actualización  :  </label>
                            <input type="number" id="actualizacion" name="actualizacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  readonly="readonly"
                             value="<?php print $actualizacion?>" style="text-align:center;">

                        
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Otros tipos :</label>
                           <input type="number" id="otrotipo" name="otrotipo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onkeyup="PasarValor3(); validar();" readonly="readonly"
                             value="<?php print $otrotipo?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inscr" class="form-control">  Importadas  :  </label>
                            <input type="number" id="importadas" name="importadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/   readonly="readonly"
                             value="<?php print $importadas?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Exportadas :</label>
                            <input type="number" id="exportadas" name="exportadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/   readonly="readonly"
                             value="<?php print $exportadas?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Entregadas  :  </label>
                            <input type="number" id="entregadas" name="entregadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  readonly="readonly"
                             value="<?php print $entregadas?>" style="text-align:center;">
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Anexas :</label>
                            <input type="number" id="anexas" name="anexas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/   readonly="readonly"
                             value="<?php print $anexas?>" style="text-align:center;">
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reimpresiones :  </label>
                            <input type="number" id="reimpresiones" name="reimpresiones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/   readonly="readonly"
                             value="<?php print $reimpresiones?>" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Robo o Extravió :</label>
                            <input type="number" id="robo" name="robo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/    readonly="readonly"
                             value="<?php print $robo?>" style="text-align:center;">
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Retiradas :  </label>
                         <input type="number" id="retiradas" name="retiradas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/   readonly="readonly"
                             value="<?php print $retiradas?>" style="text-align:center;">
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
                          <?php

                      $sql="SELECT * FROM reported where idreported=$idreported";
                      $rs = $con->query($sql);
                      if($rs){
                         while ($fila = $rs->fetch_object()){
                            
                           $credencialdisponiblex=$fila->credencialdisponible;
                          }
                      }
                      ?>


                            <input type="text" class="form-control" id="tcredenciales" name="" readonly="readonly" 
                             value="<?php print $credencialdisponiblex?>" style="text-align:center;"> 
                            </div>
                            </div>     
                    </button>
                        </div>
                        </div>

                        <div id="menu3" class="tab-pane fade">

                        <br>
                         <h5>Los datos presentados solo son de consulta </h5> <br>
   
                        <div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            
                            <label for="inscr" class="form-control">  Sobrantes  :  </label>
                            <input type="number"  id="sobran" name="sobran"readonly="readonly" 
                             value="<?php print $sobran?>" style="text-align:center;"> 

                             
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Duplicados:</label>
                            <input type="number"  id="duplicados" name="duplicados" readonly="readonly" 
                             value="<?php print $duplicadas?>" style="text-align:center;"> 
                            </div>
                            </div>

                             <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Reimpresiones  :  </label>

                            <input type="number"  id="reimpreso" name="reimpreso" readonly="readonly" 
                             value="<?php print $reimpresion?>" style="text-align:center;"> 

                          
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Credencial DEV-TE:</label>
                            <input type="number"  id="devtec" name="devtec" readonly="readonly" 
                             value="<?php print $credevte?>" style="text-align:center;"> 
                            
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inscr" class="form-control">  Credencial Duplicada  :  </label>
                            <input type="number"  id="credup" name="credup" readonly="readonly" 
                             value="<?php print $credencialduplicadas?>" style="text-align:center;"> 

                          
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Credenciales de Canje:</label>
                             <input type="number"  id="ccanjeable"  name="ccanjeable" readonly="readonly" 
                             value="<?php print $credencialcanjeadables?>" style="text-align:center;"> 

                          
                            </div>
                            </div>

                        
                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Fichas entregadas :</label>

                            <input type="number"  id="fichasentregadas" name="fichasentregadas" readonly="readonly" 
                             value="<?php print $fichasentregadas?>" style="text-align:center;"> 
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="correc" class="form-control"> Fichas atendidas:</label>

                             <input type="number"  id="fichasatendidas" name="fichasatendidas" readonly="readonly" 
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

                        $sql4 =("select * from modulo where modulo.idmodulo=$idmodulo");
                                      
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

                         <div id="menu4" class="tab-pane fade">

                            <h5> Incidencias registradas en el mismo día del reporte descrito </h5> <br>

                            <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="azul" width="35%">FECHA REGISTRADA </th>
                              
                              <th class="azul" width="25%">REMESA </th>
                              <th class="azul" width="25%">PROBLEMA </th>

                            </tr>
                          </thead>
                           <tr>

                        <?php
                        include "conexion.php";
                        

                         $sql= "SELECT * FROM remesas.reporteincidencias where fecha ='$fecha' and encargadoRM_idencargadoRM=$idencargado;";
                        $rs = $con->query($sql);
                        if($rs){
                           while ($fila = $rs->fetch_object()){
                             $fec=$fila->fecha;
                                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
                                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                 $dial = $dias[date('N', strtotime($fec))];
                                 list( $ano, $mes, $dia ) = split( '[/.-]', $fec);

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
                          </tr>  
                        <?php }
                        mysqli_free_result($rs);
                        }

                       

                        ?> 
                    </table>

                    <h6> Para más información: Consulta la liga </h6>
                    <a href="listaincidenciasc.php">Lista de incidencias</a>


                        </div>


                  </div>
                    
             <BUTTON>
                <a href="editardatospc.php?id=<?php echo $idreported?>" class="btn btn-warning" role="button"> EDITAR  </a>
              </button>

                    <a href="listareportedc.php" class="btn btn-success" role="button">REGRESAR</a>
            </form>

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


