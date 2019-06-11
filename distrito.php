 <?php 
                  include "conexion.php";
                       
                        $sql="SELECT * from distrito";
                        $query = $con->query($sql);
                        ?>
                        <option> Elija una opción:</option>
                        
                        <?php
                        while ($row=$query->fetch_array()){
                           echo " <option value='".$row['iddistrito']."'>".$row['nombre']."</option>";
                 
                        }
  ?>