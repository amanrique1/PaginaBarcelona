<?php
$titulo="Delanteros- FCBarcelona";
include("includes/header.php");
$claseDelanteros="active";
include("includes/menu.php");
include("clases/itemCarrusel.php");
require_once('administrador/administracion/clases/ClaseCarrusel.php');

$claseCarrusel= new ClaseCarrusel();

$resultado=$claseCarrusel ->mostrarElementosPagina('delanteros');
$infoCarrusel = array();
$idCarrusel="carru1";
while($row=mysqli_fetch_array($resultado)){
  $elementoTemporal= new itemCarrusel($row['titulo'],$row['texto'],$row['imagen'],$row['boton']);

  array_push($infoCarrusel,$elementoTemporal);


  ?>
  <?php
}
include("includes/carrusel.php");
?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <div class="row">
        <?php  
        include("includes/arrayJugadores.php");

        for($i=0;$i<count($jugadores);$i++)
        {

          $obj=$jugadores[$i];


          if($obj->posicion==="Delantero")
          {




            ?>

            <!-- Three columns of text below the carousel -->

            <div class="col-lg-4" id="jugador<?php echo $obj->id; ?>">
              <img class="img-circle" src="administrador/administracion/imagenesJugadores/<?php echo $obj->imagen2; ?>" alt="Generic placeholder image" width="140" height="140">
              <h2><?php echo $obj->titulo; ?></h2>
              <p align="justify"><?php echo $obj->texto; ?></p>
              <p><a class="btn btn-default" href="detalle_jugador.php?id=<?php echo $obj->id; ?>" role="button">Ver Ficha Tecnica &raquo;</a></p>
            </div><!-- /.col-lg-4 -->


            <?php  
          }
        }
        ?>
      </div>


      <?php 
      include("includes/footer.php");
      ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <script>
      $(document).on("scroll", function(){

        var desplazamientoActual = $(document).scrollTop();



        if(desplazamientoActual > 450 ){
          $(".navbar").addClass("menuAlineadoArriba");
          
        }
    //controlo si debo ocultar el botón
    if(desplazamientoActual < 450 ){
     $(".navbar").removeClass("menuAlineadoArriba");
   }
 });

</script>

</body>
</html>
