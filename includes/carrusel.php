
    <!-- Carousel
    ================================================== -->
    <div id="<?php echo $idCarrusel; ?>" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php 
        for($i=0;$i<count($infoCarrusel);$i++)
        {
          if($i==0)
          {
            ?>
            <li data-target="#<?php echo $idCarrusel; ?>" data-slide-to="<?php echo $i;?>" class="active"></li>
            <?php
          }else
          {
            ?>
            <li data-target="#<?php echo $idCarrusel; ?>" data-slide-to="<?php echo $i;?>"></li>
            <?php
          }
        }
        ?>

        
      </ol>
      <div class="carousel-inner" role="listbox"> <!--Carrusel completo -->
       <?php 
       for($i=0;$i<count($infoCarrusel);$i++)
       {
        $obj=$infoCarrusel[$i];

        if($i==0)
        {
          ?>
          <div class="item active"> <!--Item activo -->
            <img class="first-slide" src="administrador/administracion/imagenesCarrusel/<?php echo $obj->imagen; ?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1><?php echo $obj->titulo; ?></h1>
                <p><?php echo $obj->texto; ?></p>
                <p><a class="btn btn-lg btn-primary" href="<?php echo $obj->boton; ?>" role="button">Ver mas...</a></p>
              </div>
            </div>
          </div>

          <?php
        }else
        {
          ?>
          <div class="item"> <!--Item activo -->
            <img class="first-slide" src="administrador/administracion/imagenesCarrusel/<?php echo $obj->imagen; ?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1><?php echo $obj->titulo; ?></h1>
                <p><?php echo $obj->texto; ?></p>
                <p><a class="btn btn-lg btn-primary" href="<?php echo $obj->boton; ?>" role="button">Ver mas...</a></p>
              </div>
            </div>
          </div>

          <?php
        }
      }
      ?>



    </div>
    <a class="left carousel-control" href="#<?php echo $idCarrusel; ?>" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#<?php echo $idCarrusel; ?>" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div><!-- /.carousel -->

