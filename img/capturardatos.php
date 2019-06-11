<?php session_start(); 
	include ("conexion.php");
	$idusuario=$_SESSION['usuario'][0]['id'];
		if($idusuario!=''){
		} 
		else{ 
		print "<script>alert('Acceso restringido, no ha iniciado sesión'); window.location='index.php';</script>";
		}

     
   

   

    
	if($_POST['guardar']){
	   if(($_POST['remesa']!= '')){	  
                
                echo $entidad= 30;      
                echo "<bR>";
                
                setlocale(LC_ALL,"es_MX.UTF-8");
                $fecha= date('Y-m-d');

                echo "<bR>"; ECHO "EL folio incial es ";       
                ECHO $finicial=$_POST['finicial'];
             

                echo "<bR>";ECHO "EL folio final  es ";       
                ECHO $ffinal=$_POST['ffinal'];

               
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

                echo "disponibles dia";
                echo $disponible=$_POST['disponible'];






                


                echo "<bR>";
               ECHO "EL ID DEL USUARIO ES";       echo "<bR>";

               ECHO  $idusuario=$_SESSION['usuario'][0]['id'];
            ECHO "<BR>";


                echo "el id de modulo es: ";

                echo $idmodulo=$_POST['tipomodulo'];
                ECHO "<BR>";


                echo "el id de la REMESA ES :";


                echo $remesa=$_POST['remesa'];  
                   ECHO "<BR>";

              

				$sql3 =("INSERT INTO sintesis(fecha,hora,descripcion,usuario_idusuario) VALUES ('$fecha','$hora','$descripcion','$idusuario')");
                echo "$sql3"; 

				$query1 = $con -> query($sql3);
				echo "<script>alert('Los datos se guardaron con éxito!');window.location='#';</script>";
				}else{
			 echo "<script>alert('No se han llenado todos los campos');</script>";
			}
				
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"   type ="image/jpg" href="img/INE.jpg">

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
    font: italic; 
  }
</style>
	

<body>
	<?php include "menub.php"; ?>
    <br />
    <h3 align="center">Registro de SIIRFE Diario</h3>
        <h6 align="center"> <b>Ingrese los datos correspondientes </h6></b>
        
        <div class="container" align="center" style="border:1px solid:#C0BCBC;">
            <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">
                <br><br>
                <div class="form-group" style="width: 50%;">
                  <label>*</label> <label for="nombre">Remesa:</label>
                  <select name="remesa" class="form-control" rows="5">
                    <option value="0">Seleccione:</option>
                    <?php
                    $sql3 =("select * from remesa");
                    $query = $con -> query($sql3);
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idremesa].'">'.$valores[remesa].'</option>';
                        }
                    ?>
                   </select>

                    <label>*</label><label for="entidad">Entidad:</label>
                    <input type="text" class="form-control" id="entidad" name="entidad" placeholder="VERACRUZ" readonly="readonly" >

                    <label>*</label><label for="distrito">Distrito:</label>

                    <select name="distrito" class="form-control" rows="5" readonly="readonly"> 
                   
                 <?php
                    $sql3="select distrito_iddistrito from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el id que pertenece el distrito
                    $query = $con->query($sql3);
                    $r=$query->fetch_array();
                    $id=$r["distrito_iddistrito"];
                    $sql3 =("select * from remesas.distrito where remesas.distrito.iddistrito=$id");
                    $query = $con -> query($sql3);
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[iddistrito].'">'.$valores[nombredistrito].'</option>';

                        }
                    ?>
                   </select>


                    <label>*</label><label for="tipomodulo">Tipo de Módulo:</label>


                     <select id="tipomodulo" name="tipomodulo" class="form-control" rows="5" readonly="readonly"> 
                   
                 <?php
                    $sql3="select idmodulo,tipomodulo from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el tipo de modulo
                    $query = $con -> query($sql3);
                   
                        while ($valores = mysqli_fetch_array($query)) {
                         echo '<option value="'.$valores[idmodulo].'">'.$valores[tipomodulo].'</option>';

                        }
                    ?>
                   </select>
                    <label>*</label> <label for="cargo">Fecha del reporte </label>

                    <input type="text" name="fecha" id="fecha" class="form-control"  readonly="readonly" value="<?php 
                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;?> " style="text-align:center;">

 <br>                  
<hr style="border-color: black" />

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"> FOLIOS </a></li>
    <li><a data-toggle="tab" href="#menu1"> TRAMITES </a></li>
    <li><a data-toggle="tab" href="#menu2"> CREDENCIALES </a></li>
    <li><a data-toggle="tab" href="#menu3"> OTROS </a></li>
  </ul>


 <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <label></label><label for="foliou">Folio de Inicio:</label> 
    <?php 
    // buscar el ultimo id registro de los reportes para despues ocuparlo para sacar el ultimofolio regis
       $sql3="SELECT MAX(idreported) AS idreported FROM reported";
        $query = $con->query($sql3);
        $r=$query->fetch_array();
        $ultimoidreporte=$r["idreported"];

        $sql3="select foliofinal from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idusuario." and remesas.reported.idreported=".$ultimoidreporte;
        $query = $con->query($sql3);
        $r=$query->fetch_array();
         $ultimofolio=$r["foliofinal"] + 1;
        ?>

    <input type="text" class="form-control" id="finicial" name="finicial" readonly="readonly"
    value="<?php print $ultimofolio ?>">


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
    <input type="text" class="form-control" id="ffinal" name="ffinal" readonly="readonly">
     <br>

    <label></label><label for="foliou">Num. de Folios Utilizados:</label>
    <input type="number" id="futilizado" name="futilizado"  placeholder="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor();" onkeyup="PasarValor();"> <br>

     <label></label><label for="folion">Num. de Folios NO Utilizados:</label>
     <input type="number" id="fnutilizado" name="fnutilizado" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/ placeholder="9" onclick ="PasarValor();" onkeyup="PasarValor();"> <br>

    </div>

    <div id="menu1" class="tab-pane fade">
     <br>
     <h5>Ingrese los datos correspondientes a tramites, en caso de no tener ninguno, asigna 0 </h5> <br>
    <form>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Inscripciones  :  </label>
    
        <input type="number" id="inscripciones" name="inscripciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">


        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control">  Correcciones:</label>
         <input type="number" id="correcciones" name="correcciones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">
        </div>
        </div>


        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Cambio de Domicilio  :  </label>
         <input type="number" id="cambiod" name="cambiod"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control">  Reposición:</label>
        <input type="number" id="reposicion" name="reposicion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Corrección de Datos Direc:  </label>
         <input type="number" id="corecciondatosd" name="corecciondatosd"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">

        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control">  Reincorporación:</label>
        <input type="number" id="reincorporacion" name="reincorporacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Reemplazo:  </label>
        <input type="number" id="reemplazo" name="reemplazo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor2();" onkeyup="PasarValor2();">

        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control">  Cancelados:</label>
        <input type="number" id="cancelados" name="cancelados" value="0" min="0" max="5550" step="1" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control"> Rechazados:  </label>
        <input type="number"  id="rechazados" name="rechazados" value="0" min="0" max="5550" step="1" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control">  CURP:</label>
        <input type="number" id="curp" name="curp" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Solicitud de Expedientes:  </label>
        <input type="number" id="solicitudexpedientes" name="solicitudexpedientes" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control">  Solicitud de Rectificación:</label>
        <input type="number" id="solicitudrectificacion" name="solicitudrectificacion" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control"> Demanda de jución:  </label>
        <input type="number" id="demanda" name="demanda" value="0" min="0" max="5550" step="1"> 
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
    var sumatramites=0;
    

    sumatramites = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt(e)+ parseInt(f)+ parseInt(g);




    //document.getElementById("ttramites").value =a;
    document.getElementById("ttramites").value =sumatramites;


}

    </script>


        <input type="text" class="form-control" id="ttramites" name="ttramites" readonly="readonly"> 

        </div>
        </div>
     </form>   

 
    </div>

    <div id="menu2" class="tab-pane fade">
    <br>
    <h5>Ingrese los datos correspondientes a credenciales</h5>
   
    <form>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Credenciales iniciales  :  </label>
        <input type="number" name="numero" value="0"  readonly="readonly"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <?php 
        // buscar el ultimo id registro de los reportes para despues ocuparlo para sacar el total de credenciales disn
       $sql3="SELECT MAX(idreported) AS idreported FROM reported";
        $query = $con->query($sql3);
        $r=$query->fetch_array();
        $ultimoidreporte=$r["idreported"];

        $sql3="select credencialdisponible from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idusuario." and remesas.reported.idreported=".$ultimoidreporte;
        $query = $con->query($sql3);
        $r=$query->fetch_array();
        $credencialdisponible=$r["credencialdisponible"] ;
        ?>


        <label for="inscr" class="form-control"> Credenciales iniciales del día:</label>

        <input type="text" class="form-control" id="disponible" name="disponible" readonly="readonly"
         value="<?php print $credencialdisponible ?>" > 

        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Actualización  :  </label>
        <input type="number" id="actualizacion" name="actualizacion"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Otros tipos :</label>
       <input type="number" id="otrotipo" name="otrotipo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Importadas  :  </label>
        <input type="number" id="importadas" name="importadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Exportadas :</label>
        <input type="number" id="exportadas" name="exportadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Entregadas  :  </label>
        <input type="number" id="entregadas" name="entregadas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Anexas :</label>
        <input type="number" id="anexas" name="anexas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Reimpresiones :  </label>
        <input type="number" id="reimpresiones" name="reimpresiones"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Robo o Extravio :</label>
        <input type="number" id="robo" name="robo"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

         <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Retiradas :  </label>
     <input type="number" id="retiradas" name="retiradas"  min="0" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/  onclick ="PasarValor3();" onkeyup="PasarValor3();">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
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
    d = document.getElementById("exportadas").value;
    //---para restar
    e = document.getElementById("entregadas").value;
    f = document.getElementById("anexas").value;
    g = document.getElementById("reimpresiones").value;
    h = document.getElementById("robo").value;
    i = document.getElementById("retiradas").value;

    suma = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d)+ parseInt (credencialesactuales);
    //sumacredenciales = parseInt(a)+ parseInt(b)+ parseInt(c)+ parseInt(d);
    resta= parseInt(e)+ parseInt(f)+ parseInt(g)+ parseInt(h)+ parseInt(i);
    sumacredenciales=suma-resta;



   document.getElementById("tcredenciales").value= sumacredenciales;
    //document.getElementById("tcredenciales").value =credencialesactuales;


}

    </script>


        <input type="text" class="form-control" id="tcredenciales" name="tcredenciales" readonly="readonly"> 
        </div>
        </div>




    </form>
</div>



    <div id="menu3" class="tab-pane fade">
       

    <br>
    <h5>Ingrese los datos correspondientes en el apartado otros</h5>
   
    <form>
        <div class="form-row">
        <div class="form-group col-md-6">
        


        <label for="inscr" class="form-control">  Sobran  :  </label>
        <input type="number" id="sobran" name="sobran" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Duplicados:</label>
        <input type="number" id="duplicados" name="duplicados" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>


        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Reimpresiones  :  </label>
        <input type="number"  id="reimpreso" name="reimpreso" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Credencial DEV-TE:</label>
        <input type="number" id="devtec" name="devtec" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inscr" class="form-control">  Credencial Duplicada  :  </label>
        <input type="number" id="credup" name="credup" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Credencial Canjeable:</label>
        <input type="number" id="ccanjeable"  name="ccanjeable" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>


        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Dia Laborable :</label>
        <input type="number" name="numero" value="0" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Fichas entregadas :</label>
        <input type="number"  id="fichasentregadas" name="fichasentregadas" value="0" min="0" max="5550" step="1" onclick ="activarb();" onkeyup="activarb();">

        <script type="text/javascript">
        // tomar los valores de los tramites para sumarlos automaticamente 
            function activarb(){
                document.getElementById('guardar').disabled=false;
            }
        </script>

        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Fichas atendidas:</label>
        <input type="number" id="fichasatendidas" name="fichasatendidas" value="1" min="0" max="5550" step="1"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="correc" class="form-control"> Configuración :</label>

        <?php
                    $sql3="select configuracion from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el tipo de modulo
                  
                    $query = $con -> query($sql3);
                     $r=$query->fetch_array();
                     $configuracionmodulo=$r["configuracion"];
        ?>

        <input type="text" class="form-control" id="configuracionmodulo" name="clave" readonly="readonly" value="<?php print $configuracionmodulo ?>"> 
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-12">
        <label for="correc" class="form-control"> Total de equipos configurados:</label>

        <?php
                    $sql3="select totalequipos from remesas.modulo inner join remesas.encargadorm ON remesas.encargadorm.modulo_idmodulo=remesas.modulo.idmodulo"; // encontrar el tipo de modulo
                  
                    $query = $con -> query($sql3);
                     $r=$query->fetch_array();
                     $totalequipos=$r["totalequipos"];
        ?>
       <input type="text" class="form-control" id="equipos" name="clave" readonly="readonly" value="<?php print $totalequipos ?>" > 

        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-12">
        <label for="correc" class="form-control"> Incidencias:</label>
        <textarea class="form-control" rows="5" id="descripcion"></textarea>

     </form>

<BR>

</div>
</div>

    </div>
    <br><br>
<input type="submit" class="btn btn-primary" id="guardar" name="guardar" id="guardar" value="GUARDAR">
</button>
        <a href="listareported.php" class="btn btn-success" role="button">CANCELAR</a>





</div>

    <script>
        //mantener el boton desactivado hasta que lleguen al ultimo apartado 
    document.getElementById('guardar').disabled=true;
    </script>

<?php include "piepagina.php"; ?>    
    
</body>
</html>