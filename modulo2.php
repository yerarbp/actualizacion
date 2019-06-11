 <?php 
 $idmodulo= $_GET['parametro_id'];
 
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

                          $fechaactual=date("Y-m-d"); 
                                                 
                          $anio=date("Y");
                          $a=$anio."-01-01";
                          $b=$anio."-01-31";
                            
                            
                            $bandera=false;
                        

                            if(( $a<= $fechaactual)&& ( $b>=$fechaactual)){
                             // ECHO "ESTA DENTRO DEL MES y la bandera es:";
                             $bandera=true;
                              //echo "<br>";
                            }else{
                              
                               $bandera=false;
                               //echo "<br>";
                            }

                            //echo $fechaactual=date('Y-m-d');
                          
                           $fechacomparar=$anio."-01"; 


                        $sql3="SELECT * FROM reported where encargadoRM_idencargadoRM=$idusuario;";
                          
                            $rs = $con->query($sql3);
                            if($rs){
                                 while ($fila = $rs->fetch_object()){
                                   $fec=$fila->fecha;  
                                  $separa = explode("-",$fec); 
                                  $año = $separa[0];
                                  $mes = $separa[1];
                                 $fecha1=$año."-".$mes; 
                                  if($fecha1==$fechacomparar){
                                   
                                    $bandera=false;
                                    break;  
                                  

                                  }else{

                                    //echo "No hay de enero";
                                    $bandera=true;

                                  }
                            
                                }
                                 mysqli_free_result($rs);
                              }
                          
                              //echo "el valor con que llego la bandera es:";
                              $bandera;


                       

                            if(($ultimoidreporte==0)|| ($bandera==true)){

                            ////// PARA SACAR EL FOLIO INICIAL CON LA ESTRUCTURA 13 DIG
                            //////////sacar  el distrito////////////////////
                           $sql3="select distrito_iddistrito from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                                $query = $con->query($sql3);
                                $r=$query->fetch_array();
                                //$id=$r["distrito_iddistrito"];
                                 $iddistrito=$r["distrito_iddistrito"];
                            ///////////////////////////////////////////////// sacar módulo
                             $sql3="select modulo_idmodulo from distrito_encargado where encargadoRM_idencargadoRM=$idusuario;";
                              $query = $con->query($sql3);
                              $r=$query->fetch_array();
                              $idmodulo=$r["modulo_idmodulo"];
                              $modulonumero = substr("$idmodulo", -2);
                            ///////////////////////////////////////////////////////////

                              if($iddistrito<=9){
                                $distritonumero="0"."$iddistrito";
                             echo $ultimofolio=date("y")."30"."$distritonumero"."$modulonumero"."00001";

                              }else{
                              echo $ultimofolio=date("y")."30"."$iddistrito"."$modulonumero"."00001";
                              }


                            } else{

                        $sql3="select foliofinal from remesas.reported where remesas.reported.encargadoRM_idencargadoRM=".$idencargadoRM." and remesas.reported.idreported=".$ultimoidreporte.";";
                       
                            $query = $con->query($sql3);
                            $r=$query->fetch_array();
                             echo $ultimofolio=$r["foliofinal"] + 1;
                         }



                       
                        
  ?>