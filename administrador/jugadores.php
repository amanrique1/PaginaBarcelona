
<?php
$titulo="Admin Jugadores- FCBarcelona";
include("includes/header.php");
$claseJugadores="active";
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



      <div class="container marketing cuerpo">

        <!-- Three columns of text below the carousel -->
        <div class="row">

          <form method="post" enctype="multipart/form-data" action="administracion/modificarJugadores.php?opcion=1">

           <div class="form-group col-md-3">
            <label for="usr">Nombre:</label>
            <input required="true" type="text" class="form-control" name="nombre">
          </div>
          <div class="form-group col-md-3">
            <label for="pwd">Posicion:</label>
            <input required="true" type="text" class="form-control" name="posicion">
          </div>
          <div class="form-group col-md-6" style="float:right;">
            <label for="comment">Breve Descripcion:</label>
            <textarea class="form-control" rows="7" name="breveDesc" required="true" ></textarea>
          </div>
          <div class="form-group col-md-3">
            <label for="pwd">Numero:</label>
            <input type="text" class="form-control" name="numero" required="true">
          </div>
          <div class="form-group col-md-3">
            <label for="pwd">Imagen Parallax:</label>
            <input type="file" name="imagenParalax" accept="image/*" class="btn" style="width: 262.5px">
          </div>
          <div class="form-group col-md-3">
            <label for="pwd">Imagen Presentacion:</label>
            <input type="file" name="imagenPresentacion" accept="image/*" class="btn" style="width: 262.5px">
          </div>
          <div class="form-group col-md-3">
            <label for="pwd">Imagen Trayectoria:</label>
            <input type="file" name="imagenTrayectoria" accept="image/*" class="btn" style="width: 262.5px">
          </div>

          <div class="form-group col-md-12">
            <label for="comment">Descripcion:</label>
            <textarea class="form-control" rows="5" name="descripcion" id="descripcion" required="true"></textarea>
          </div>
          <input type="submit"  class="btn btn-color-pagina" value="Guardar" style="float: left; ">


        </form>

      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
      <h1 id="tituloContacto" >Jugadores Almacenados</h1>
      <table  class="table">
        <thead>
          <tr>

            <th>Imagen</th>
            <th>Nombre</th>
            <th>Posicion</th>
            <th>Numero</th>
            <th>Imagen Paralax</th>
            <th>Imagen Trayectoria</th>
            <th>Breve desc</th>
            <th>Administrar</th>
          </tr>
        </thead>
        <tbody>
         <?php

         require_once('administracion/clases/ClaseJugadores.php');
         $claseJugadores= new ClaseJugadores();
         $resultado=$claseJugadores ->mostrarTodosJugadores();
         $contador=0;
         while($row=mysqli_fetch_array($resultado)){
          ?>
          <tr>
            <td><?php echo $row['imagenPresentacion']; ?></td>
            <td><?php echo $row['nombreCompleto']; ?></td>
            <td><?php echo $row['posicion']; ?></td>
            <td><?php echo $row['numero']; ?></td>
            <td><?php echo $row['imagenParalax']; ?></td>
            <td><?php echo $row['imagenTabla']; ?></td>
            <td><?php echo substr ( $row['breveDescripcion'] , 0 , 50 ); ?></td>
            <td><a href="editarJugador.php?id=<?php echo $row['id'];?>"><img width="35px" height="35px" src="assets/images/editar.png" alt="editar" title="editar" ></a><a  href="#" data-href="administracion/modificarJugadores.php?opcion=3&id=<?php echo $row['id'];?>" data-toggle="modal" data-target="#confirm-delete"><img width="35px" height="35px" src="assets/images/borrar.png" alt="eliminar"  title="eliminar" ></a></td>
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
    CKEDITOR.replace( 'breveDesc' );
  </script>

</body>
</html>
