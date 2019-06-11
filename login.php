<?php
session_start();

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["contra"])){
		if($_POST["nombre"]!=""&&$_POST["contra"]!=""){
			include "conexion.php";
			$acentos = $con->query("SET NAMES 'utf8'");
			$user_id=null;
			$sql= ("select * from encargadoRM where usuario='$_POST[nombre]' and contrasena='$_POST[contra]'");
		
			
			$query = $con->query($sql);
			$r=$query->fetch_array();
			$user_id=$r["idencargadoRM"];
			$privilegio=$r["nivelp"];
			if($user_id==null){
				print "<script>alert('Usuario o Contraseña invalidos.'); window.location='index.php';</script>";
			}else{
				$array[]=array(
					"id"	=>$r["idencargadoRM"],
					"grado_idgrado"=>$r["grado_idgrado"],
					"nombre"=>$r["nombre"],
					"apaterno"=>$r["apaterno"],
					"amaterno"=>$r["amaterno"],
					"login"	=>$r["usuario"],
					"password"=>$r["contrasena"],
					"nivelp"=>$r["nivelp"]
				);

				
			if($privilegio==3){
					$_SESSION['usuario']=$array;
				$_SESSION['grado_idgrado']=$array;
				$_SESSION['nombre']=$array;
				$_SESSION['apaterno']=$array;
				$_SESSION['amaterno']=$array;
				$_SESSION['nivelp']=$array;
				print "<script>window.location='principal2.php';</script>";

				} elseif ($privilegio==2){
				// es jefe 
				$_SESSION['usuario']=$array;
				$_SESSION['grado_idgrado']=$array;
				$_SESSION['nombre']=$array;
				$_SESSION['apaterno']=$array;
				$_SESSION['amaterno']=$array;
				$_SESSION['nivelp']=$array;

			print "<script>window.location='principal.php';</script>";

			
			}elseif ($privilegio==1) {
				
			
			//usuario general
			$_SESSION['usuario']=$array;
			$_SESSION['grado_idgrado']=$array;
			$_SESSION['nombre']=$array;
			$_SESSION['apaterno']=$array;
			$_SESSION['amaterno']=$array;
			$_SESSION['nivelp']=$array;
				print "<script>window.location='listareportedc.php';</script>";	
			

			} else {

			$_SESSION['usuario']=$array;
			$_SESSION['grado_idgrado']=$array;
			$_SESSION['nombre']=$array;
			$_SESSION['apaterno']=$array;
			$_SESSION['amaterno']=$array;
			$_SESSION['nivelp']=$array;

			print "<script>window.location='listareported.php';</script>";

			//print "<script>window.location='principal.php';</script>";
			}	

							
			}
		}
	}
}
