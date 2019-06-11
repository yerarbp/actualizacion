<?php session_start(); 
 
	include ("conexion.php");
	 $idusuario=$_SESSION['usuario'][0]['id'];
 	 $nivelp=$_SESSION['nivelp'][0]['nivelp'];
	if(($idusuario!='') && ($nivelp==2)) {
	 $ide=$_GET['x'];
	
	   $sql=" Delete from incidencias where idincidencias=$ide";
      $query1 = $con -> query($sql);

      if($query1!==False){
		echo "<script>alert('La Incidencia se ha eliminado exitosamente !');window.location='incidenciasl.php';</script>";
		}else
		{
		echo "<script>alert('La Incidencia que intenta eliminar, esta asignada a algunos reportes, intente más tarde ');window.location='incidenciasl.php';</script>";
		}
	

    } else{ 
    	
    
    }

    ?>


	 

          


