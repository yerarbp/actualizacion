  <?php 

  session_start();
  $idusuario=$_SESSION['usuario'][0]['id'];
  unset($_SESSION['$idencargadoRM']); 
 
  session_destroy();
  header("Location: index.php");
  exit;
?>
