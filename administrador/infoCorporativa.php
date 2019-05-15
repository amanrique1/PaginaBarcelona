
<?php
$titulo="Admin Infocorporativa- FCBarcelona";
include("includes/header.php");
$claseInfoCorporativa="active";
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

        <form method="post" enctype="multipart/form-data" action="administracion/modificarInfoCorporativa.php?opcion=1">

         <div class="form-group col-md-3">
          <label for="usr">Nombre:</label>
          <input required="true" type="text" class="form-control" name="nombreColumna">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Informacion:</label>
          <input required="true" type="text" class="form-control" name="informacion">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Null:</label>
          <input type="checkbox" name="null">
        </div>
        <div class="form-group col-md-3">
          <label for="pwd">Tipo:</label>
          <select name="tipo" id="tipo" onchange="mostrarTamanio();">
            <option value="1">Text</option>
            <option value="2">Varchar</option>
            <option value="3">Int</option>
            <option value="4">Double</option>
            <option value="5">Date</option>
          </select>
        </div>

        <div class="form-group col-md-3 tamanio">
          <label for="comment">Tamaño:</label>
          <input type="text" class="form-control" name="tamanio" >
        </div>
        
        <input type="submit"  class="btn btn-color-pagina" value="Guardar" style="float: left; ">

        
      </form>

    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <h1 id="tituloContacto" >Datos Almacenadas</h1>
    <table  class="table">
      <thead>
        <tr>

          <th>Nombre</th>
          <th>Dato</th>
          <th>Administrar</th>
        </tr>
      </thead>
      <tbody>
       <?php

       require_once('administracion/clases/ClaseInfoCorporativa.php');
       $claseInfoCorporativa= new ClaseInfoCorporativa();
       $row=$claseInfoCorporativa ->mostrarFila();
       $contador=0;
       ?>
       
       <?php
       $resultado=$claseInfoCorporativa ->devolverTabla();
       $info_campo = mysqli_fetch_fields($resultado);
       $datos_info=$claseInfoCorporativa ->mostrarFila();
       foreach ($info_campo as $valor) {
        if($valor->name!='id')
        {
          ?>
          <tr>
            <td><?php echo $valor->name; ?></td>
            <td><?php  echo $datos_info[$valor->name] ;?> </td>

            <td><a href="editarInfoCorporativa.php?columna=<?php echo $valor->name;?>"><img width="35px" height="35px" src="assets/images/editar.png" alt="editar" title="editar" ></a><a  href="#" data-href="administracion/modificarInfoCorporativa.php?opcion=3&columna=<?php echo $valor->name;?>" data-toggle="modal" data-target="#confirm-delete"><img width="35px" height="35px" src="assets/images/borrar.png" alt="eliminar"  title="eliminar" ></a></td>
            <?php

            $contador++;
          }
        }
        ?>
      </tr>





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

    $('.tamanio').hide();

    function mostrarTamanio()
    {
      var tipo=$('#tipo').val();
      if(tipo==2)
      {
        $('.tamanio').show();
      }
      else
      {
        $('.tamanio').hide();
      }
    }

  </script>

</body>
</html>
