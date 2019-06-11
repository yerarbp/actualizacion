<?php session_start(); 
 
	include ("conexion.php");
	 $idusuario=$_SESSION['usuario'][0]['id'];
 	 $nivelp=$_SESSION['nivelp'][0]['nivelp'];
	if(($idusuario!='') && ($nivelp==2)) {
	 $ide=$_GET['x'];
	
	   $sql=" Delete from periodo where idperiodo=$ide";
      $query1 = $con -> query($sql);

      if($query1!==False){
		echo "<script>alert('El Periodo se ha eliminado exitosamente !');window.location='neleccion.php';</script>";
		}else
		{
		echo "<script>alert('El Periodo que intenta eliminar, esta asignado a algunos reportes, intente más tarde ');window.location='neleccion.php';</script>";
		}
	

    } else{ 
    	
    
    }

    ?>


	 

          


