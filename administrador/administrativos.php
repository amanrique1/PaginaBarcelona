
<?php
$titulo="Admin Administrativos- FCBarcelona";
include("includes/header.php");
$claseAdministrativos="active";
include("includes/menu.php");

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

      <!-- Three columns of text below the carousel -->
      <div class="row">

        <form method="post" enctype="multipart/form-data" action="administracion/modificarAdministrativos.php?opcion=1">

         <div class="form-group col-md-3">
          <label for="usr">Nombre:</label>
          <input required="true" type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Puesto:</label>
          <input required="true" type="text" class="form-control" name="puesto">
        </div>
        <div class="form-group col-md-3">
        <label for="pwd">Imagen:</label>
          <input type="file" name="imagen" accept="image/*" class="btn" style="width: 262.5px">
        </div>
        <div class="form-group col-md-12">
          <label for="comment">Descripcion:</label>
          <textarea class="form-control" rows="5" name="descripcion" required="true" id="descripcion" ></textarea>
        </div>
        <input type="submit"  class="btn btn-color-pagina" value="Guardar" style="float: left; ">

        
      </form>

    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <h1 id="tituloContacto" >Administrativos Almacenados</h1>
    <table  class="table">
      <thead>
        <tr>

          <th>Imagen</th>
          <th>Nombre</th>
          <th>Puesto</th>
          <th>Descripcion</th>
        </tr>
      </thead>
      <tbody>
       <?php

       require_once('administracion/clases/ClaseAdministrativos.php');
       $claseAdministrativos= new ClaseAdministrativos();
       $resultado=$claseAdministrativos ->mostrarTodosAdministrativos();
       $contador=0;
       while($row=mysqli_fetch_array($resultado)){
        ?>
        <tr>
          <td><?php echo $row['imagen']; ?></td>
          <td><?php echo $row['nombreCompleto']; ?></td>
          <td><?php echo $row['puesto']; ?></td>
          <td><?php echo substr ( $row['descripcion'] , 0 , 50 ); ?></td>
          
          <td><a href="editarAdministrativos.php?id=<?php echo $row['id'];?>"><img width="35px" height="35px" src="assets/images/editar.png" alt="editar" title="editar" ></a><a href="administracion/modificarAdministrativos.php?opcion=3&id=<?php echo $row['id'];?>"><img width="35px" height="35px" src="assets/images/borrar.png" alt="eliminar"  title="eliminar" data-toggle="modal" data-target="#confirm-delete" ></a></td>
          <?php
          $contador++;
          ?>
        </tr>



        <?php
      }
      ?>

    </tbody>
  </table>

  <p>Total de resultados:<?php echo $contador;?></p>
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

</body>
</html>
