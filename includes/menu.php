<?php
require_once('administrador/administracion/clases/ClaseInfoCorporativa.php');

$claseCorporativa= new ClaseInfoCorporativa();

$resultado=$claseCorporativa ->mostrarFila();
$imagen=$resultado['logo'];
?>
<!-- NAVBAR
  ================================================== -->

  <div class="navbar-wrapper">
    <div class="container">

      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="logo" href="index.php"><img class="logo" src="administrador/administracion/imagenesInfoCorporativa/<?php echo $imagen;?>"></a>
            
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="<?php echo $claseInicio;?>"><a href="index.php">Inicio</a></li>
              <li class="<?php echo $claseArqueros;?>"><a href="arqueros.php">Arqueros</a></li>
              <li class="<?php echo $claseDefensas;?>"><a href="defensas.php">Defensas</a></li>
              <li class="<?php echo $claseMediocampistas;?>"><a href="mediocampistas.php">Mediocampistas</a></li>
              <li class="<?php echo $claseDelanteros;?>"><a href="delanteros.php">Delanteros</a></li>
              <li class="<?php echo $claseNoticias;?>"><a href="noticias.php">Noticias</a></li>
              <li class="<?php echo $claseContacto;?>"><a href="contacto.php" >Contacto</a></li>
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
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>
