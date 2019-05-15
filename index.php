
<?php
$titulo="Inicio- FCBarcelona";
include("includes/header.php");
$claseInicio="active";
include("includes/menu.php");
include("clases/itemCarrusel.php");


require_once('administrador/administracion/clases/ClaseCarrusel.php');

$claseCarrusel= new ClaseCarrusel();

$resultado=$claseCarrusel ->mostrarElementosPagina('index');
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

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php 
        require_once('administrador/administracion/clases/ClaseAdministrativos.php');

        $claseAdministrativos= new ClaseAdministrativos();

        $resultado=$claseAdministrativos ->mostrarTodosAdministrativos();
        while($row=mysqli_fetch_array($resultado)){

          ?>

          <div class="col-lg-4">
          <img class="img-circle" src="administrador/administracion/imagenesAdministrativos/<?php echo $row['imagen']; ?>" alt="Generic placeholder image" width="140" height="140">
            <h2><?php echo $row['puesto']; ?></h2>
            <p align="justify"><?php echo $row['nombreCompleto'].$row['descripcion']; ?></p>
            
          </div><!-- /.col-lg-4 -->
          

          <?php 
        }



        ?>
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <h2 id="tituloNoticias">Ultimas Noticias
        <img onclick="actualizarNoticias()" src="assets/images/directo.gif" style=" height: 30px; width:120px;">
      </h2>


      <div id="noticias">
        <div style="text-align: center;">
          <img src="assets/images/loading2.gif">
        </div>
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

      $( "#noticias" ).load( "includes/getrss.php");



      function actualizarNoticias()
      {
        $( "#noticias" ).html("<div style='text-align:center;'><img src='assets/images/loading2.gif'></div>");
        $( "#noticias" ).load( "includes/getrss.php");
      }



    </script>

  </body>
  </html>
