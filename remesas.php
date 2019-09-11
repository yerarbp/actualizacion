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
  <title>REMESAS REGISTRADAS</title>
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
          'excel', 'print'
        ]
    } );
} );

  </script>
<body style="width: auto;">

<?php include "menud.php";
 
          ?> 

   <form name="form1" id="form1" method="post" action="" enctype="multipart/form-data">

  <h3 align="center" class="let"> REMESAS REGISTRADAS </h3>

    <div class="col-sm-12 sidenav" align="right">
      <a href="capturarremesa.php"><button type="button"  class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-file"></span> Nuevo
      </button></a> 
  </div>

    <div class="row">
      <div class="col-md-4">

      </div>
  <!--<div class="col-md-4">
    <div style="text-align: center;"> *REMESA </DIV>
     <select name="remesa" class="form-control" rows="1">
      <option value="0">Seleccione:</option>
    
     
  </select>
  </div>

  <div class="col-md-4">
    <br>
    <input type="submit" class="btn btn-success btn-default"  name="buscar" id="buscar" value="GENERAR REPORTE">-->
    
  </div>
</div>
<br>
  


  <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">
        <thead>
            <tr style="color:#FFFFFF;">
                <th>Remesa </th>
                <th>Fecha de Inicio </th>
                <th>Fecha de Cierre </th>
                <th>Total del días </th>
                <th>Actualizar Remesa </th>
                <th>Eliminar Remesa </th>
               
            </tr>
        </thead>
        <tr>

        <?php
          include "conexion.php";
           

         $sql="select * from remesa;";

          $rs = $con->query($sql);
          if($rs){
              while ($fila = $rs->fetch_object()){
              $idremesa=$fila->idremesa;
              /////////////////col 1
              $sql="select * from remesa where idremesa=$idremesa;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $idremesa=$r["idremesa"];
                $fechainicio=$r["fechainicio"];
                $fechafinal=$r["fechafinal"];
                $totaldias=$r["totaldias"];

                 echo "<td>".utf8_encode($idremesa)."</td>";
                 echo "<td>".utf8_encode ($fechainicio)."</td>";
                 echo "<td>".utf8_encode($fechafinal)."</td>";
                 echo "<td>".utf8_encode ($totaldias)."</td>";
                 
                 
                
          ?>
              <td> <a href="editarrem.php?x=<?php echo $fila->idremesa?>"> <img src="img/actualizar.png" style="height: 30px;"></a> </td>
              <td><a href="eliminarrem.php?x=<?php echo $fila->idremesa?>"><img src="img/eliminar.png" style="height: 30px;"></a></td>              
          </tr>

              <?php }
              mysqli_free_result($rs);
          }

              ?> 

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