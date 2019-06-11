 <?php 
$idmodulo= $_GET['parametro_id'];
 //$idmodulo= 300151;
 
                  include "conexion.php";
                    // echo
          $sql="select encargadoRM_idencargadoRM from distrito_encargado where modulo_idmodulo=$idmodulo;";
                    $query = $con->query($sql);
                    $r=$query->fetch_array();

                  
                  $idencargadoRM=$r["encargadoRM_idencargadoRM"];

                $sql3="SELECT MAX(idreported) AS idreported FROM reported where encargadoRM_idencargadoRM=$idencargadoRM;";
                

                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                            //echo "tiene idreporte es:";

                       $ultimoidreporte=$r["idreported"];

                         if($ultimoidreporte==null){
                              $ultimoidreporte=0;

                            }

                         $sql3="SELECT * FROM reported where encargadoRM_idencargadoRM=$idencargadoRM and idreported=$ultimoidreporte;";
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                        $periodoAntes=$r["periodo_idperiodo"];
                        

                         $sql3="SELECT MAX(idperiodo) AS idperiodo FROM periodo;";
                              $query = $con->query($sql3);
                              $r=$query->fetch_array();
                              $periodoActual=$r["idperiodo"];
                                                  
                       
                            if(($ultimoidreporte==0)|| ($periodoAntes!= $periodoActual)){
                                echo $credencialdisponible=0;
                            } else
                         { 

                            $sql="select credencialdisponible from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idencargadoRM." and remesas.reported.idreported=".$ultimoidreporte." ";
                           
                            $query = $con->query($sql);
                            $r=$query->fetch_array();
                          echo $credencialdisponible=$r["credencialdisponible"] ;


                           }

                                         
                        
  ?>