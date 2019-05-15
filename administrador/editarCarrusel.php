
<?php
$titulo="Admin Carrusel- FCBarcelona";
include("includes/header.php");
$claseCarrusel="active";
include("includes/menu.php");
$id=$_GET['id'];
require_once('administracion/clases/ClaseCarrusel.php');
$claseCarrusel= new ClaseCarrusel();
$row=$claseCarrusel ->mostrarElemento($id);
?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    
    <div class="container marketing cuerpo">
    <a class="btn btn-lg btn-primary" href="carrusel.php" role="button">Volver a carrusel</a>
      <h1 id="tituloContacto" >Editar</h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <form method="post" enctype="multipart/form-data" action="administracion/modificarCarrusel.php?opcion=2">

         <div class="form-group col-md-3">
          <label for="usr">Titulo:</label>
          <input required="true" type="text" class="form-control" name="titulo" value="<?php echo $row['titulo'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Pagina de Ubicacion:</label>
          <input required="true" type="text" class="form-control" name="ubicacionPagina" value="<?php echo $row['ubicacionPagina'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Imagen:</label>
          <input type="text" class="form-control" name="imagen" required="true" value="<?php echo $row['imagen'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Enlace Boton:</label>
          <input type="text" class="form-control" name="boton" required="true" value="<?php echo $row['boton'];?>">
        </div>
        <div class="form-group col-md-12">
          <label for="comment">Descripcion:</label>
          <textarea class="form-control" rows="5" name="descripcion" required="true" id="texto" ><?php echo $row['texto'];?></textarea>
        </div>
        <input required="true" type="text" class="form-control" name="id" value="<?php echo $id;?>" style="display: none;">
        <input type="submit"  class="btn btn-color-pagina" value="Guardar" style="float: left; ">

        
      </form>
    </div><!-- /.row -->

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

</body>
<script>

  <?php
  
  if(isset($_GET['mensaje'])){
    echo "alert('".$_GET['mensaje']."');";

  }

  ?>
  CKEDITOR.replace( 'descripcion' );
</script>
</html>
