 <?php 
 $iddistrito= $_GET['parametro_id'];
                  include "conexion.php";
                       
                        $sql="SELECT * from modulo where distrito_iddistrito=$iddistrito";
                        echo $sql;
                        $query = $con->query($sql);
                        if($iddistrito==21){
                        ?>
                        <option> Seleccione </option>
                        <option value="0"> NO APLICA DISTRITO </option>

                        <?php


                        }else{

                        
                         ?>
                        <option> Seleccione </option>
                        <option value="0"> NO APLICA MÓDULO </option>

                        <?php 

                        while ($row=$query->fetch_array()){

                           echo " <option value='".$row['idmodulo']."'>".$row['idmodulo']."</option>";
                 
                        }
                      }
  ?>