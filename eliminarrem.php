<?php session_start(); 
 
	include ("conexion.php");
	 $idusuario=$_SESSION['usuario'][0]['id'];
 	 $nivelp=$_SESSION['nivelp'][0]['nivelp'];
	if(($idusuario!='') && ($nivelp==2)) {
	 $ide=$_GET['x'];
	
	   $sql=" Delete from remesa where idremesa=$ide";
      $query1 = $con -> query($sql);

      if($query1!==False){
		echo "<script>alert('La Remesa se ha eliminado exitosamente !');window.location='remesas.php';</script>";
		}else
		{
		echo "<script>alert('La Remesa que intenta eliminar, esta asignado a algunos reportes, intente más tarde ');window.location='remesas.php';</script>";
		}
	

    } else{ 
    	
    
    }

    ?>


	 

          


