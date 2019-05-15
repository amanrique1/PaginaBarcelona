
<?php
$titulo="Inicio- FCBarcelona";
include("includes/header.php");
$claseNoticias="active";
include("includes/menu.php");


?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" style="margin: 70px;">




      <h2 id="tituloNoticias">Ultimas Noticias
        <img onclick="actualizarNoticias()" src="assets/images/directo.gif" style=" height: 30px; width:120px;">
        <a onclick="actualizarUltima()" class="btn btn-lg btn-primary" role="button">Noticias en vivo</a>
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

      $( "#noticias" ).load( "includes/getrss.php",function(){
        actualizarUltima();
      });


      var totalDatos=0;
      function actualizarNoticias()
      {
        $( "#noticias" ).html("<div style='text-align:center;'><img src='assets/images/loading2.gif'></div>");
        $( "#noticias" ).load( "includes/getrss.php");
        totalDatos=3;

      }
      function actualizarUltima()
      {

        var loading=$(".nuevo_elemento");

        loading.first().html("<div style='text-align:center;'><img src='assets/images/loading2.gif'></div>");

        var response;
        $.ajax({ type: "POST",   
         url: "includes/rssEnVivo.php",   
         async: true,
         data: { pTituloUltimo: $(".titulo").first().html(),pTotalDatos:totalDatos},
         success : function(text)
         {
          if(text!=0){
           $("#noticias").prepend(text);
           totalDatos++;
         }
         loading.html("");
       }

     });
        setTimeout(actualizarUltima, 30000);
      }



    </script>

  </body>
  </html>
