<?php
$titulo="Jugador- FCBarcelona";
include("includes/header.php");
include("includes/arrayJugadores.php");
$id=$_GET['id'];
$jugadorActual=null;
for($i=0;$i<count($jugadores);$i++)
{
  $obj=$jugadores[$i];
  if($obj->id==$id)
  {
    $jugadorActual=$obj;
    break;
  }
}
switch ($jugadorActual->posicion) {
  case 'Arquero':
  $claseArqueros="active";
  break;
  case 'Defensa':
  $claseDefensas="active";
  break;

  case 'Mediocampista':
  $claseMediocampistas="active";
  break;
  case 'Delantero':
  $claseDelanteros="active";
  break;
  
}
include("includes/menu.php");

?>

<style>
  .parallax {
    /* The image used */

    background-image: url("administrador/administracion/imagenesJugadores/<?php echo $jugadorActual->imagenParalax; ?>");

    /* Set a specific height */
    min-height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
  }
</style>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <div class="parallax"></div>




      <!-- START THE FEATURETTES -->

<?php /*
  $texto1=substr($jugadorActual->descripcion, 0,800);
  $texto2=substr($jugadorActual->descripcion, 801,strlen($jugadorActual->descripcion)); 
  */
  $texto=explode("&-&",$jugadorActual->descripcion );


  ?>

  <div class="row featurette" id="primerDetalle">
    <div class="col-md-7">
      <h2 class="featurette-heading"><?php echo $jugadorActual->titulo;?><br> <span class="text-muted"><?php echo $jugadorActual->posicion;?></span></h2>
      <p align="justify" class="lead"><?php echo $texto[0];?></p>
    </div>
    <div class="col-md-5">
      <img id="imagenJugador"   class="featurette-image img-responsive center-block img-circle" src="administrador/administracion/imagenesJugadores/<?php echo $jugadorActual->imagen2;?>" alt="Generic placeholder image">
    </div>
    <div class="col-md-12">
     <p align="justify" class="lead"><?php echo $texto[1];?></p>
   </div>
 </div>
 <img id="tabla" src="administrador/administracion/imagenesJugadores/<?php echo $jugadorActual->trayectoria;?>"> 





 <!-- /END THE FEATURETTES -->


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
