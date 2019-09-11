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
        <link rel="icon"   type ="image/PNG" href="img/INE2.png">

        <title>Mostrar datos de Incidencias</title>

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
              $justifique=$fila->justifique;
              $encargadoRM_idencargadoRM=$fila->encargadoRM_idencargadoRM;
              $modulo_idmodulo=$fila->modulo_idmodulo;
              $remesa_idremesa=$fila->remesa_idremesa;
              $incidencias_idincidencias=$fila->incidencias_idincidencias;
              $distrito_iddistrito=$fila->distrito_iddistrito;

            }
        }



         ?>

         <br>
        <h3 align="center"> Editar una incidencia presentada </h3>
     

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
                        //$sql3="select distrito_iddistrito from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el id que pertenece el distrito
                        
                         $sql3 =("select * from remesas.distrito where remesas.distrito.iddistrito=$distrito_iddistrito");
                        $query = $con -> query($sql3);
                       
                            while ($valores = mysqli_fetch_array($query)) {
                             echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                            }
                        ?>
                    </select>

                    <label>*</label><label for="tipomodulo">Módulo:</label>

                     <select id="modulo" name="modulo" class="form-control" rows="5" readonly="readonly">
                       <?php
                       
                 $sql4 =("select * from remesas.modulo where remesas.modulo.idmodulo=$modulo_idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[idmodulo].'</option>';

                            }
                        ?>
                        
                        </select>

                     <label>*</label><label for="tipomodulo">Tipo de Módulo:</label>

                     <select id="tipomodulo" name="tipomodulo" class="form-control" rows="5" readonly="readonly">
                      <?php
                        

                       $sql4 =("select * from remesas.modulo where remesas.modulo.idmodulo=$modulo_idmodulo");
                         $query = $con->query($sql4);                
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[tipomodulo].'</option>';

                            }
                        ?>
                        </select>
                        <label>*</label> <label for="cargo">Fecha del reporte </label>
                        <?php
                     $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                  $dial = $dias[date('N', strtotime($fecha))];
                  $dial;
                  //list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
                  list($ano, $mes, $dia ) = preg_split('[-]', $fecha);  




                    ?>

                     <input type="text" class="form-control" name="fecha" id="fecha" step="1" min="2000-01-01"  max="20000-01-01" value="<?php echo $dial.",". ($dia)." de ".$meses[$mes-1]. " del ".$ano ;?>" style="text-align:center;" readonly="readonly">
                       

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
                      <select id="inhabilitado" name="inhabilitado" class="form-control" rows="5" readonly="readonly">

                        <?php
                        $sql3=" select inhabilitado from remesas.reporteincidencias where idincidencias=$idincidencias";
                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                        echo $id=$r["inhabilitado"];

                        if ($id==1){
                        ?>
                           <option value="1">Módulo NO Inhabilitado </option> 

                         <?php
                          }
                        else{
                          ?>

                          <option value="2">Módulo  Inhabilitado </option>

                         <?php }
                       
                    
                        ?>
                      
                    </select>
                    </div>
                    </div>


                    <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="tipomodulo">Tipo de Incidencia:</label>

                     <select id="tipoincidencia" name="tipoincidencia" class="form-control" rows="5" readonly="readonly" onclick ="activarb();" onkeyup="activarb();">
                      <?php
                       $sql3="SELECT idincidencias,incidencias FROM remesas.incidencias where idincidencias=$incidencias_idincidencias"; 

                        $query = $con -> query($sql3);
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idincidencias].'">'. utf8_encode ($valores[incidencias]).'</option>';

                     

                            }
                        ?>
                        </select>
                    </div>
                    </div>
                    <br>

                            <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Núm de caso CAU:</label>
                            <input type="text" id="cau" name="cau" style="text-align:center;" readonly="readonly" value="<?php print $cao?>"> 
                            </div>
                            </div>



                     <div class="form-row">
                            <div class="form-group col-md-12">

                              <?php
                        $sql3="select * from remesas.reporteincidencias where idincidencias=$idincidencias";

                        $query = $con->query($sql3);
                        $r=$query->fetch_array();
                      
                        ?>


                            <label for="correc" class="form-control"> Descripción del problema:</label>
                            
                            <textarea class="form-control resumen" rows="5"  name="descripcion" id="descripcion" readonly="readonly"><?php print utf8_encode ($r['descripcion']) ?></textarea>

                           

                        </DIV>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Solución o Situación actual:</label>
                            <textarea class="form-control resumen" rows="5"  name="solucion" id="solucion" readonly="readonly"><?php print utf8_encode ( $r['solucion'] )?></textarea>


                        </DIV>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> ¿Cómo y cuándo se solucionó?:</label>
                            <textarea class="form-control resumen" rows="5"  name="como" id="como" readonly="readonly"><?php print utf8_encode ($r['como']) ?></textarea>

                        </DIV>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Tiempo en horas que paro el módulo :</label>
                          
                            <input type="text"  id="tiempo" name="tiempo" readonly="readonly" 
                             value="<?php print $tiempo?>" style="text-align:center;"> 
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="correc" class="form-control"> Justifique el rango ocurrido  :</label>
                          
                             <input type="text"  id="ustifique" name="Justifique" readonly="readonly" 
                             value="<?php print utf8_encode ($justifique)?>" style="text-align:center;"> 
                            </div>
                        </div>   


                        </div>

                      
                  
                  </div>

                  
                    
             <BUTTON>
                <a href="editarincidenciasc.php?id=<?php echo $idincidencias?>" class="btn btn-warning" role="button"> EDITAR  </a>
              </button>

                    <a href="listaincidenciasc.php" class="btn btn-success" role="button">REGRESAR</a>
            </form>

        </div>
        <?php include "piepagina.php"; ?> 

    </body>
</html>


