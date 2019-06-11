<?php include "conexion.php";?><head>
<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/menuestilo.css">-->
</head>

<style>
.dropdown a{color:#FFFFFF;}
.navbar li:hover { background:#FFFFFF;}
.blanco{color:#ffffff !important;}
.blanco:hover{color:#00377b !important;}
 </style>
<nav class="navbar navbar-default navbar-static-top">
      <div class="container" style="padding:0; margin:0; width:100%; background:#00377b;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
        </div>
<div id="navbar" class="navbar-collapse collapse" >

            <ul class="nav navbar-nav">
            <li class="dropdown" style="font-size:13px;"> 
            <li style="font-size:13px;"><a href="noticias.php" class="blanco"><span> </span>&nbsp;PRINCIPAL</a></li>
    
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
          </ul>
                </ul>


         <ul class="nav navbar-nav">
            <li class="dropdown" style="font-size:13px;">
            <a href="#" class="dropdown-toggle blanco" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">   <span class="glyphicon glyphicon-duplicate"> </span>&nbsp;REGISTROS <span class="caret"> </span></a>  
              <ul class="dropdown-menu" >

                 <li><a href="lista_registro_avances.php" >Agregar conteo  </a></li>
                
                 
</li>
</ul>

                </ul>

<ul class="nav navbar-nav">
            <li class="dropdown" style="font-size:13px;">
            <a href="#" class="dropdown-toggle blanco" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">   <span class="glyphicon glyphicon-copy"> </span>&nbsp;REPORTES <span class="caret"> </span></a>  
              <ul class="dropdown-menu" >

                 <li><a href="lista_asuntor.php" > Resultados por Distritos/ Municipios (TOTALES) </a></li>
                  <li><a href="lista_asuntor2.php" > Resultados por Distritos/ Municipios (INDIVIDUALES) </a></li>
                 
                  <li><a href="lista_asuntor3.php" > Resultados por Distritos (INDIVIDUALES) </a></li>
                 
               
                 
</li>
</ul>

                </ul>



 -->           <ul class="nav navbar-nav">
            <li class="dropdown" style="font-size:13px;">
 <!--             <a href="#" class="dropdown-toggle blanco" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-calendar"> </span> &nbsp;DIRECTORIOS <span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li><a href="../navbar-static-top/validardatos.html">Registro de Directorios</a></li>
                
              
                </ul>
                <li style="font-size:13px;"><a href="noticias.php" class="blanco"> <span class="glyphicon glyphicon-user"> </span>&nbsp;CONTACTO</a></li>
-->            <li style="font-size:13px;"><a href="cerrar_sesion.php" class="blanco"><span class="glyphicon glyphicon-log-out"> </span>&nbsp;CERRAR SESIÓN</a></li>
    
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
          </ul>
                </ul>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!-- ventana de login -->

<div style="border:1px solid #000000; width:auto; background:#00377b; color:#FFFFFF; padding:10px; position:absolute;">
Bienvenido: <?php print $_SESSION['usuario'][0]['login']; ?>
</div>
<br /><br /><br />