 <?php 
 $id= $_GET['parametro_id'];
                  include "conexion.php";
                       
                      $sql="SELECT * from modulo where distrito_iddistrito=$id";

                       // echo $sql="SELECT * from modulo where distrito_iddistrito=1";
                       
                        $query = $con->query($sql);
                        echo "<option value='0'>Seleccione:</option>";
                        while ($row=$query->fetch_array()){
                        
                        echo " <option value='".$row['idmodulo']."'>".$row['idmodulo']."</option>";
                 
                        }
  ?>