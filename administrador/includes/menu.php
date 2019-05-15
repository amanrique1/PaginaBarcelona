<?php
session_start();
if(!isset($_SESSION['Administrador'])){
  header('Location:index.php?mensaje=No tienes Permisos');
  exit();
}




require_once('administracion/clases/ClaseInfoCorporativa.php');

$claseCorporativa= new ClaseInfoCorporativa();

$resultado=$claseCorporativa ->mostrarFila();
$imagen=$resultado['logo'];
?>
<!-- NAVBAR
  ================================================== -->

  <div class="navbar-wrapper">
    <div class="container">

      <nav class="navbar menuAlineadoArriba navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="logo" href="bienvenida.php"><img class="logo" src="administracion/imagenesInfoCorporativa/<?php echo $imagen;?>"></a>
            
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="<?php echo $claseInicio;?>"><a href="bienvenida.php">Inicio</a></li>
              <?php if($_SESSION['Administrador']['rol']==0){
                ?>
                <li class="<?php echo $claseAdmnistradores;?>"><a href="administradores.php">Admnistradores</a></li>
                <?php }?>
                <li class="<?php echo $claseJugadores;?>"><a href="jugadores.php">Jugadores</a></li>
                <li class="<?php echo $claseAdministrativos;?>"><a href="administrativos.php">Administrativos</a></li>
                <li class="<?php echo $claseCarrusel;?>"><a href="carrusel.php">Carrusel</a></li>
                <li class="<?php echo $ClaseInfoCorporativa;?>"><a href="infocorporativa.php">Infocorporativa</a></li>
                <li class="<?php echo $claseLugares;?>"><a href="lugares.php">Lugares</a></li>
                <li ><a href="cerrarSesion.php">Cerrar Sesi&oacute;n</a></li>
              <!--
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                -->
              </ul>
              

                <img src="administracion/imagenesAdministradores/<?php echo  $_SESSION["Administrador"]['imagen']; ?>" height="40px" width="40px" style="margin-left: 60px; float: left; margin-right: 5px;">
                <p style="color:white; padding-top: 10px; "><?php echo $_SESSION["Administrador"]['nombre'];?></p>

             

            </div>
          </div>
        </nav>

      </div>
    </div>