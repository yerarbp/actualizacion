 <?php 
 $idremesa= $_GET['parametro_id'];

 if($idremesa<2000){

 	 include "conexion.php";
      
                                       
                        $sql="SELECT * from remesa;";
                        echo $sql;
                        $query = $con->query($sql);
                      
                        while ($row=$query->fetch_array()){

                           echo " <option value='".$row['idremesa']."'>".$row['idremesa']."</option>";
                 
                        }

 }else{
                  include "conexion.php";
                                                        
                        echo $sql="SELECT * from remesa where year (fechainicio)='$idremesa'";
                        $sql;
                        $query = $con->query($sql);
                      
                        while ($row=$query->fetch_array()){

                           echo " <option value='".$row['idremesa']."'>".$row['idremesa']."</option>";
                 
                        }
   }
  ?>