
<?php
$titulo="Admin Infocorporativa- FCBarcelona";
include("includes/header.php");

?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->


    <img src="../assets/images/fondoBarcelona.jpg" style=" min-width: 100%;
    min-height: 100%;
    position: fixed;
    z-index: -999999;
    top:50%;
    left:50%;

    transform: translateX(-50%) translateY(-50%);">
    <div class="container marketing cuerpo">
      <div class="container">

        <div style="width:350px; margin: 50px auto; background-color: white; border: 1px solid #bdbdbd; padding: 35px; border-radius: 3%; " class="content-box-gray">
          <center><h1>LOGIN </h1></center><br /><br />
          <form action="administracion/modificarAdministradores.php?opcion=4" id="form_login" method="post">
            <div class="form-group">
             <label>Usuario</label>
             <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-user fa-2x"></i>
              </span> 
              <input class="form-control" placeholder="USUARIO" type="text" name="usuario" autofocus="" style="padding-left: 10px;">
            </div>
          </div>
          <div class="form-group">
            <label>Contrase&ntilde;a</label>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-lock fa-2x"></i>
              </span> 
              <input class="form-control" placeholder="CONTRASE&Ntilde;A" type="password" name="constrasenia" autofocus="" style="padding-left: 15px;">
            </div>
          </div>      
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary right" >Ingresar</button>
            <a onclick="recuperarContrasenia()" style="color: blue;">¿Olvidaste tu contraseña?</a>
          </div>
        </form>



        <form action="administracion/modificarAdministradores.php?opcion=5" id="form_login" method="post">
          <div id="recuperarContrasenia">
            <div class="form-group">
              <label>Correo</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-user fa-2x"></i>
                </span> 
                <input class="form-control" placeholder="CORREO" type="text" name="correo" autofocus="" style="padding-left: 10px;">
              </div>
              <button type="submit" class="btn btn-lg btn-primary right" >Enviar</button>
            </div>
          </div>
          <div class="clr"></div>
        </div>
      </form>

    </div> <!-- /container -->




    <!-- Three columns of text below the carousel -->



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
    $('#recuperarContrasenia').hide();
    function recuperarContrasenia()
    {
      $('#recuperarContrasenia').show();
    }

  </script>
  

</body>
</html>
