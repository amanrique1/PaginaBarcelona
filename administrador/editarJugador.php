<?php
$titulo="Admin Jugadores- FCBarcelona";
include("includes/header.php");
$claseJugadores="active";
include("includes/menu.php");
$id=$_GET['id'];
require_once('administracion/clases/ClaseJugadores.php');
$claseJugadores= new ClaseJugadores();
$row=$claseJugadores ->mostrarUnJugador($id);
?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    
    <div class="container marketing cuerpo">

      <a class="btn btn-lg btn-primary" href="jugadores.php" role="button">Volver a Jugadores</a>
      <h1 id="tituloContacto" >Editar</h1>
      <div class="row">
        <form method="post" enctype="multipart/form-data" action="administracion/modificarJugadores.php?opcion=2">
         <div class="form-group col-md-3">
          <label for="usr">Nombre:</label>
          <input required="true" type="text" class="form-control" name="nombre" value="<?php echo $row['nombreCompleto'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Posicion:</label>
          <input required="true" type="text" class="form-control" name="posicion" value="<?php echo $row['posicion'];?>">
        </div>
        <div class="form-group col-md-6" style="float:right;">
          <label for="comment">Breve Descripcion:</label>
          <textarea class="form-control" rows="7" name="breveDesc"  id="breveDesc" required="true" ><?php echo $row['breveDescripcion'];?></textarea>
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Numero:</label>
          <input type="text" class="form-control" name="numero" required="true" value="<?php echo $row['numero'];?>">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Imagen Parallax:</label>
          <br>
          <img src="administracion/imagenesJugadores/<?php echo $row['imagenParalax'];?>" width="60px">
          <input type="file" name="imagenParalax" accept="image/*" class="btn">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Imagen Presentacion:</label>
          <br>
          <img src="administracion/imagenesJugadores/<?php echo $row['imagenPresentacion'];?>" width="60px">
          <input type="file" name="imagenPresentacion" accept="image/*" class="btn">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Imagen Trayectoria:</label>
          <br>
          <img src="administracion/imagenesJugadores/<?php echo $row['imagenTabla'];?>" width="60px">
          <input type="file" name="imagenTrayectoria" accept="image/*" class="btn">
        </div>
        

        <div class="form-group col-md-12">
          <label for="comment">Descripcion:</label>
          <textarea class="form-control" rows="5" name="descripcion"  id="descripcion" required="true"><?php echo $row['descripcion'];?></textarea>

          <input type="text" class="form-control" name="id" value="<?php echo $id;?>" style="display: none;">
          <input  type="text" class="form-control" name="ruta_imagen_actualPara" value="<?php echo $row['imagenParalax']; ?>" style="display: none;">
          <input  type="text" class="form-control" name="ruta_imagen_actualPrese" value="<?php echo $row['imagenPresentacion']; ?>" style="display: none;">
          <input  type="text" class="form-control" name="ruta_imagen_actualTabla" value="<?php echo $row['imagenTabla']; ?>" style="display: none;">
          <input type="submit"  class="btn btn-color-pagina" value="Guardar" style="float: left; ">

        </form>
      </div><!-- /.row -->



    </div><!-- /.container -->
    <?php 
    include("includes/footer.php");
    ?>

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
  CKEDITOR.replace( 'breveDesc' );
</script>
</html>
