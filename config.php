 <?php 
$idmodulo= $_GET['parametro_id'];
include "conexion.php";

 $sql =("select * from remesas.modulo where remesas.modulo.idmodulo=$idmodulo");
                                      
                         $query = $con -> query($sql);
                        $r=$query->fetch_array();

                        echo $configuracionmodulo=$r["configuracion"];


                                         
                        
  ?>