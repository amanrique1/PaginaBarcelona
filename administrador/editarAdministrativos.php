
<?php
$titulo="Admin administrativos- FCBarcelona";
include("includes/header.php");
$claseAdministrativos="active";
include("includes/menu.php");
$id=$_GET['id'];
require_once('administracion/clases/claseAdministrativos.php');
$claseAdministrativos= new ClaseAdministrativos();
$row=$claseAdministrativos ->mostrarAdministrativo($id);
?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    
    <div class="container marketing cuerpo">
      <a class="btn btn-lg btn-primary" href="administrativos.php" role="button">Volver a administrativos</a>
      <h1 id="tituloContacto" >Editar</h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <form method="post" enctype="multipart/form-data" action="administracion/modificarAdministrativos.php?opcion=2">

         <div class="form-group col-md-3">
          <label for="usr">Nombre:</label>
          <input required="true" type="text" class="form-control" name="nombre"  value="<?php echo $row['nombreCompleto'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Puesto:</label>
          <input required="true" type="text" class="form-control" name="puesto"  value="<?php echo $row['puesto'];?>">
        </div>
        <input required="true" type="text" class="form-control" name="ruta_imagen_actual" value="<?php echo $row['imagen']; ?>" style="display: none;">
        <div class="form-group col-md-3">
          <label for="pwd">Imagen:</label>
          <br>
          <img src="administracion/imagenesAdministrativos/<?php echo $row['imagen'];?>" width="60px">
          <input type="file" name="imagen" accept="image/*" class="btn">
        </div>
        <div class="form-group col-md-12">
          <label for="comment">Descripcion:</label>
          <textarea class="form-control" rows="5" name="descripcion" id="descripcion" required="true"> <?php echo $row['descripcion'];?></textarea>
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
