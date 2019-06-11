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

<?php include "menud.php";
 
?> 

<form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

<h4 align="center" class="let"> ACOMULADOS DE REMESAS </h4>

<div style="border-style: ridge; margin: 5px; padding: 6px; border-color: #676362";>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <label for="distrito">Acomulado de la remesa pasada: </label>
      <input type="text" name="">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Módulo Activo :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Total Folios Ocupados :</label>
      <input type="text" name="">
    </div>
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
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Reincorporación :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Reemplazo :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Cancelados :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Rechazados :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">CURP :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Solicitud de Expedientes :</label>
      <input type="text" name="">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Solicitud de Rectificaciones:</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Demanda de jución:</label>
      <input type="text" name="">
    </div>
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
  </div>
  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Importadas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Exportadas:</label>
      <input type="text" name="">
    </div>
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
  </div>
   <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Retiradas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credenciales disponibles:</label>
      <input type="text" name="">
    </div>
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
  </div>
  <div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-3">
      <label for="distrito">Credencial duplicada :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-3">
      <label for="distrito">Credencial de canje:</label>
      <input type="text" name="">
    </div>
  </div>

</div>
  
</div>
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

<div style="border-style: ridge; margin: 5px; padding: 6px; border-color: #A44BA0;">
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Remesa Actual: </label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Entidad: </label>
      <label >Veracruz</label> 
    </div>
    <div class="col-sm-2">
      <label for="distrito">Distrito: </label>
      <input type="text" name="">
    </div>

    <div class="col-sm-2">
      <label for="distrito">Módulo: </label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Típo Módulo: </label>
      <input type="text" name="">
    </div>
  </div>

  <div class="row">
     <div class="col-sm-2">
      <label for="distrito">Total Folios Ocupados :</label>
      <input type="text" name="">
    </div>
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
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Reincorporación :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Reemplazo :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Cancelados :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Rechazados :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">CURP :</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Solicitud de Expedientes :</label>
      <input type="text" name="">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Solicitud de Rectificaciones:</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Demanda de jución:</label>
      <input type="text" name="">
    </div>
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
  </div>

  <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Importadas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Exportadas:</label>
      <input type="text" name="">
    </div>
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
  </div>

   <div class="row">
    <div class="col-sm-2">
      <label for="distrito">Retiradas :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Credenciales disponibles:</label>
      <input type="text" name="">
    </div>
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
  </div>

  <div class="row">
      <div class="col-sm-2">
      <label for="distrito">Credencial duplicada :</label>
      <input type="text" name="">
      </div>
     <div class="col-sm-2">
      <label for="distrito">Credencial de canje:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Días Laborados :</label>
      <input type="text" name="">
    </div>
     <div class="col-sm-2">
      <label for="distrito">Incidencias Registradas:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Configuración:</label>
      <input type="text" name="">
    </div>
    <div class="col-sm-2">
      <label for="distrito">Total de Equipos:</label>
      <input type="text" name="">
    </div>

  </div>

  <div class="row">
    <div class="col-sm-3">
    </div>

    <div class="col-sm-3">
      <label for="distrito">Fichas Entregadas:</label>
      <input type="text" name="">
    </div>

     <div class="col-sm-3">
      <label for="distrito">Fichas Atendidas:</label>
      <input type="text" name="">
    </div>

    <div class="col-sm-3">
      <label for="distrito">Disponibles:</label>
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