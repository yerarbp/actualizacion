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
              $idincidencias=$_GET['id'];
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
                ECHO "<BR>";echo "tipo de incidencia";
                echo $tipoincidencia=$_POST['tipoincidencia']; 
                



               ECHO "EL ID DEL USUARIO ES";       echo "<bR>";
               ECHO  $idusuario=$_SESSION['usuario'][0]['id'];
               echo "el id de modulo es: ";
               echo $idmodulo=$_POST['modulo'];
                echo "el id de la REMESA ES :";
                echo $remesa=$_POST['remesa'];  
              echo "<br>";
                
            
                 $sql3 ="UPDATE reporteincidencias  set fecha='$fecha',inhabilitado='$inhabilitado', cao='$cau', descripcion='$descripcion', solucion='$solucion',como='$como', tiempo='$tiempo', idllenado='$idusuario', encargadoRM_idencargadoRM='$idusuario', modulo_idmodulo='$idmodulo', remesa_idremesa='$remesa',incidencias_idincidencias='$tipoincidencia' WHERE idincidencias='$idincidencias';";
                 mysqli_set_charset($con,'utf8');

                 echo $sql3;
                 
                $query1 = $con -> query($sql3);
                echo "<script>alert('El registro del día se actualizo con éxito!');window.location='listaincidencias.php';</script>";

    

               
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

        <title>Editar datos de Incidencias</title>

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
         $idincidencias=$_GET['id'];
        
        
		  $sql="SELECT * FROM reporteincidencias where idincidencias=$idincidencias";
		  $rs = $con->query($sql);
          if($rs){
            while ($fila = $rs->fetch_object()){
              $fecha=$fila->fecha;

              $folioinicial=$fila->folioinicial;
              $inhabilitado=$fila->inhabilitado;
              $cao=$fila->cao;
               $descripcion=$fila->descripcion;
              $solucion=$fila->solucion;
              $como=$fila->como;
              $tiempo=$fila->tiempo;
              $encargadoRM_idencargadoRM=$fila->encargadoRM_idencargadoRM;
              $modulo_idmodulo=$fila->modulo_idmodulo;
              $remesa_idremesa=$fila->remesa_idremesa;
              $incidencias_idincidencias=$fila->incidencias_idincidencias;

            }
        }



         ?>

         <br>
        <h3 align="center"> Incidencias presentadas </h3>
     

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
                        //$id=$r["distrito_iddistrito"];
                         $id=$r["modulo_idmodulo"];

                       $sql4 =("select * from remesas.modulo where remesas.modulo.idmodulo=$id");
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
                        <input type="date" class="form-control" name="fecha" id="fecha" step="1" min="2000-01-01" max="20000-01-01" value="<?php echo $fecha?>" style="text-align:center;">

                     <br>                  
                    <hr style="border-color: black" />

                    <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#home"> INCIDENCIAS  </a></li>
                    
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="form-row">
                     <div class="form-group col-md-12">
                      <label for="tipomodulo">Situación del Módulo</label>
                      <select id="inhabilitado" name="inhabilitado" class="form-control" rows="5" onDblclick="smodulo();" onclick="alerta()">
                      <script type="text/javascript">
                        function alerta(){
                          alert("Para editar este campo, dar doble clic");


                        }
                        
                      </script>

                        <script type="text/javascript">
                        function smodulo() {
                            var smodulo=1;
                          
                            window.location.href = window.location.href + "&s=" + smodulo; 
                        }
                        </script>
                        <?php

                      $smodulo=$_GET['s'];
                      if ($smodulo==1){
                        //SI TIENE 1, ES QUE LO ACTIVO EN EL METD DE JVSCR Y ES QUE EL USUARIO QUIERE VER TODOS
                        //ABRO Y CIERRO EQUITA DE PHP PORQUE LO QUE DEBE MOSTRAR ES HTML Y ES EN IF 

                      ?>

                      <option value="0">Seleccione:</option>
                      <option value="1">Módulo NO Inhabilitado </option> 
                      <option value="2">Módulo  Inhabilitado </option>

                      <?php
                      } else{
                        // LE VA CARGAR SOLO EL COMBO QUE TIENE POR DEFECTO LLENADO, PARA QUE NO EDITE 

                          $sql3=" select inhabilitado from remesas.reporteincidencias where idincidencias=$idincidencias";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        $id=$r["inhabilitado"];

                        if ($id==1){
                        ?>
                           <option value="1">Módulo NO Inhabilitado </option> 

                         <?php
                          }
                        else{
                          ?>

                          <option value="2">Módulo  Inhabilitado </option>

                         <?php }
                      }

                      ?>
                    </select>

                    </div>
                    </div>


                    <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="tipomodulo">Tipo de Incidencia:</label >

                     <select id="tipoincidencia" name="tipoincidencia" class="form-control" rows="5"    onDblclick="activarb();" onclick="alerta();">
                      <?php

                      $bandera1=$_GET['bandera'];

                      if($bandera1==1){


                       $sql3="SELECT idincidencias,incidencias FROM remesas.incidencias"; // encontrar el tipo de modulo
                        $query = $con -> query($sql3);
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idincidencias].'">'. utf8_encode ($valores[incidencias]).'</option>';

                            }
                    
                       
                        }else{
                          $sql3="SELECT idincidencias,incidencias FROM remesas.incidencias where idincidencias=$incidencias_idincidencias"; 

                        $query = $con -> query($sql3);
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idincidencias].'">'.$valores[incidencias].'</option>';

                            }
                        }
                        ?>

                      
                        </select>


                        <script type="text/javascript">
                        function activarb() {
                            var bandera=1;
                          
                            window.location.href = window.location.href + "&bandera=" + bandera; 
                        }
                        </script>

                           
                    </div>
                    </div>
                    <br>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Núm de caso CAU:</label>
                            <input type="text" id="cau" name="cau" style="text-align:center;"  value="<?php print $cao?>"> 
                            </div>
                            </div>



                     <div class="form-row">
                            <div class="form-group col-md-12">

                              <?php
                               $idincidencias=$_GET['id'];

                        $sql3="select * from remesas.reporteincidencias where idincidencias=$idincidencias";
                        

                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                      
                        ?>


                            <label for="correc" class="form-control"> Descripción del problema:</label>
                            
                            <textarea class="form-control resumen" rows="5"  name="descripcion" id="descripcion"><?php print $r['descripcion'] ?></textarea>



                        </DIV>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Solución o Situación actual:</label>
                            <textarea class="form-control resumen" rows="5"  name="solucion" id="solucion"><?php print $r['solucion'] ?></textarea>


                        </DIV>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> ¿Cómo y cuándo se solucionó?:</label>
                            <textarea class="form-control resumen" rows="5"  name="como" id="como"><?php print $r['como'] ?></textarea>

                        </DIV>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Tiempo en horas que paro el módulo :</label>
                          
                            <input type="text"  id="tiempo" name="tiempo"
                             value="<?php print $tiempo?>" style="text-align:center;"> 
                            </div>
                        </div>


                        </div>

                      
                  
                  </div>

                  
                    
             <BUTTON><input type="submit" class="btn btn-primary" id="guardar" name="guardar" id="guardar" value="GUARDAR">
                    </button>
                    
                    <a href="listaincidencias.php" class="btn btn-success" role="button">CANCELAR</a>
            </form>

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


