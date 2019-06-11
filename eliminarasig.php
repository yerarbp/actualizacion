<?php session_start(); 
 
	include ("conexion.php");
	 $idusuario=$_SESSION['usuario'][0]['id'];
 	 $nivelp=$_SESSION['nivelp'][0]['nivelp'];
	if(($idusuario!='') && ($nivelp==2)) {
	 $ide=$_GET['x'];


	  echo $sql=" Delete from distrito_encargado where id=$ide";
      $query1 = $con -> query($sql);

		echo "<script>alert('La Asignación se ha eliminado del usuario correctamente ');window.location='usuarios.php';</script>";

	}

   
    
 


	 

          


