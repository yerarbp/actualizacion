 <?php 
 $idmodulo= $_GET['parametro_id'];
                  include "conexion.php";
                       
                        $sql="SELECT * from modulo where idmodulo=$idmodulo";
                        echo $sql;
                        $query = $con->query($sql);
                      
                        while ($row=$query->fetch_array()){

                           echo " <option value='".$row['idmodulo']."'>".$row['tipomodulo']."</option>";
                 
                        }
  ?>