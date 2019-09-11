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
  <title>USUARIOS REGISTRADOS </title>
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

  <h3 align="center" class="let"> USUARIOS REGISTRADOS EN ESTA PLATAFORMA </h3>

    <div class="col-sm-12 sidenav" align="right">
      <a href="capturarencargados.php"><button type="button"  class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-file"></span> Nuevo
      </button></a> 
  </div>

    <div class="row">
      <div class="col-md-4">

      </div>
      
  </div>
</div>
<br>
  



  <table id="sirfe" class="table table-striped table-bordered" style="width:100%; overflow-x: scroll;overflow-y:scroll;">
        <thead>
            <tr style="color:#FFFFFF;">
                <th>Nivel de prioridades </th>
                <th>Nombre</th>
                <th>Apellido Paterno </th>
                <th>Apellido Materno </th>
                <th>Correo Institucional</th>
                <th>Telefono de contacto</th>
                <th>Distrito Asignado</th>
                <th>Módulo Asignado</th>
                <th>Usuario Registrado </th>
                <th>Contraseña Registrada </th>
                <th>Actualizar usuario </th>
                <th>Eliminar Asignación </th>
                <th>Eliminar usuario </th>

            </tr>
        </thead>
        <tr>

        <?php
          include "conexion.php";
           

        $sql="SELECT * FROM encargadorm LEFT JOIN  distrito_encargado
    ON encargadorm.idencargadoRM=distrito_encargado.encargadoRM_idencargadoRm;";

          $rs = $con->query($sql);
          if($rs){
              while ($fila = $rs->fetch_object()){
              $idencargado=$fila->idencargadoRM;
              $idasignacion=$fila->id;
              $iddistrito=$fila->distrito_iddistrito;
              $idmodulo=$fila->modulo_idmodulo;

              /////////////////col 1
              $sql="select * from encargadoRM where idencargadoRM=$idencargado;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $nivelp=$r["nivelp"];
               if($nivelp==3){
                   echo "<td> Vocal </td>";
                }elseif($nivelp==2){
                  echo "<td> Administrador </td>";
               }elseif ($nivelp==1) {
                 echo "<td> Técnico </td>";
                
               }else{
                 echo "<td> Encargado RM </td>";
               }
               ///////////////////////////// col 2

              $sql="select * from encargadoRM where idencargadoRM=$idencargado;";
                $query = $con->query($sql);
                $r=$query->fetch_array();
                $nombre=$r["nombre"];
                $apaterno=$r["apaterno"];
                $amaterno=$r["amaterno"];
                $correo=$r["correo"];
                $telefono=$r["celular"];
                //$iddistrito=$r["distrito_iddistrito"];
                //$idmodulo=$r["modulo_idmodulo"];
                $usuario=$r["usuario"];
                $contraseña=$r["contrasena"];


                 echo "<td>".utf8_encode ($nombre)."</td>";
                 echo "<td>".utf8_encode($apaterno)."</td>";
                 echo "<td>".utf8_encode($amaterno)."</td>";
                 echo "<td>".utf8_encode($correo)."</td>";
                 echo "<td>".utf8_encode($telefono)."</td>";

                 //////////////////////// 

                  if(($iddistrito==null) && ($idmodulo==null)){
                               
                $nombred="NO SE HA ASIGNADO DISTRITO ";
                 $nombrem="NO SE HA ASIGNADO MODULO";
                   echo "<td>".utf8_encode ($nombred)."</td>";
                  echo "<td>".utf8_encode($nombrem)."</td>";
                
                }else{

                 $sql="select * from distrito where iddistrito=$iddistrito;";
                          $query = $con->query($sql);
                          $r=$query->fetch_array();
                          $nombred=$r["nombredistrito"];

                 echo "<td>".utf8_encode($nombred)."</td>";



                  $sql="select * from modulo where idmodulo=$idmodulo;";
                          $query = $con->query($sql);
                          $r=$query->fetch_array();
                          $nombrem=$r["idmodulo"];

              
                 if($nombrem==0){
                          echo "<td> NO APLICA MÓDULO </td>";

                          }else{
                          echo "<td>".utf8_encode($nombrem)."</td>";
                          }
                    
                 }
                             
               
                 echo "<td>".utf8_encode($usuario)."</td>";
                 echo "<td>".utf8_encode($contraseña)."</td>";
          ?>
              <td> <a href="editarencargados.php?x=<?php echo $fila->idencargadoRM ?>&y=<?php echo $fila->id ?>"> <img src="img/actualizar.png" style="height: 30px;"></a> </td>

          

              <td><a href="eliminarasig.php?x=<?php echo $fila->id?>"><img src="img/eliminar.png" style="height: 30px;"></a></td>   
              <td><a href="eliminaru.php?x=<?php echo $fila->idencargadoRM?>"><img src="img/eliminar.png" style="height: 30px;"></a></td>
                    
                
                
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
  
  <footer style="background-color: black;
  position:relative;
  bottom: 0;
  width: 100%;
  height: 40px;
  background-color:#ECF0F1; color:#17202A">
  
  <?php include "piepagina.php"; ?>
 </footer>  


</body>
</html>