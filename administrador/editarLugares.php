
<?php
$titulo="Admin Lugares- FCBarcelona";
include("includes/header.php");
$claseLugares="active";
include("includes/menu.php");
$id=$_GET['id'];
require_once('administracion/clases/ClaseMapa.php');
$claseMapa= new ClaseMapa();
$row=$claseMapa ->mostrarUnLugar($id);
?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    
    <div class="container marketing cuerpo">
      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Estas Seguro?</h4>
            </div>
            
            <div class="modal-body">
              <p>El elemento elminado no se podra recuperar</p>
              <p>Quieres seguir?</p>
              <p class="debug-url"></p>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <a class="btn btn-danger btn-ok">Delete</a>
            </div>
          </div>
        </div>
      </div>
      <a class="btn btn-lg btn-primary" href="lugares.php" role="button">Volver a lugares</a>
      <h1 id="tituloContacto" >Editar</h1>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <form method="post" enctype="multipart/form-data" action="administracion/modificarLugares.php?opcion=2">
         <div class="form-group col-md-3">
          <label for="usr">Nombre:</label>
          <input required="true" type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'];?>">
        </div>

        <div class="form-group col-md-3">
          <label for="pwd">Latitud:</label>
          <input type="text" class="form-control" name="latitud" required="true" value="<?php echo $row['latitud'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Longitud:</label>
          <input type="text" class="form-control" name="longitud" required="true" value="<?php echo $row['longitud'];?>">
        </div>
        <input required="true" type="text" class="form-control" name="id" value="<?php echo $id;?>" style="display: none;">
         <input required="true" type="text" class="form-control" name="ruta_imagen_actual" value="<?php echo $row['imagen']; ?>" style="display: none;">
        <div class="form-group col-md-3">
          <label for="pwd">Imagen:</label>
          <br>
          <img src="administracion/imagenesLugares/<?php echo $row['imagen'];?>" width="60px">
          <input type="file" name="imagen" accept="image/*" class="btn">
        </div>
        <div class="form-group col-md-12">
          <label for="comment">Descripcion:</label>
          <textarea class="form-control" rows="5" name="descripcion" id="descripcion" required="true"><?php echo $row['descripcion'];?></textarea>
        </div>
        <br>
        <input type="submit"  class="btn btn-color-pagina" value="Guardar">

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
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

  });

  CKEDITOR.replace( 'descripcion' );
</script>
</html>
