<?php
$contacto_menu="active";
$titulo="Contacto- FCBarcelona";
include("includes/header.php");
$claseContacto="active";
include("includes/menu.php");

require_once('administrador/administracion/clases/ClaseMapa.php');
$claseMapa= new ClaseMapa();
$inicial=$claseMapa ->mostrarUnLugar(1);
$latIni=$inicial['latitud'];
$longIni=$inicial['longitud'];

?>
<div class="container ">
	<div class="cuerpo">
		
		<div>
			<h1 id="tituloContacto" >Cont&aacute;ctanos</h1>
		</div>
		
		<div id="formulario">

			<form action="includes/enviarEmail.php" method="post" enctype="multipart/form-data">
				<table>
					<caption>Danos tus datos y te contactaremos</caption>

					<tbody>
						<tr>
							<td>Nombre: </td>
							<td><input type="text" name="nombre" class="inputCorreo"></td>
							<td>&nbsp; &nbsp; Telefono: </td>
							<td><input type="text" name="telefono" class="inputCorreo"></td>
						</tr>
						<tr>
							<td>Edad: </td>
							<td><input type="text" name="edad" class="inputCorreo"></td>
							<td>&nbsp; &nbsp; Correo: </td>
							<td><input type="text" name="correo" class="inputCorreo"></td>

						</tr>
						<tr>
							<td>Asunto: </td>
							<td><input type="text" name="asunto" class="inputCorreo"></td>
						</tr>
						
					</tbody>
				</table>
				<br>
				Mensaje:  
				<br>
				<textarea placeholder="Escribe aqui tus comentarios" name="comentarios" rows="15" cols="70" minlength="8"></textarea>

				<br>

				<input type="submit"  class="btn btn-color-pagina" value="Enviar">
				
			</form>
      <a class="btn btn-lg btn-primary" href="includes/mandarWp.php"  role="button">Whatsapp</a>
    </div>


    <div id="imagenesContacto">
     <img id="imagenContacto1" src="assets/images/enviarEmail.png" alt="">
     <img id="imagenContacto2" src="assets/images/email-marketing.png" alt="">
   </div>

   <h3 id="tituloMapa">Lugares De Interes Cul&eacute;</h3>
   <div id="map"></div>
   <div>
    <?php 
    require_once('administrador/administracion/clases/ClaseInfoCorporativa.php');

    $claseInfoCorporativa= new ClaseInfoCorporativa();

    $resultado=$claseInfoCorporativa ->devolverTabla();
    $info_campo = mysqli_fetch_fields($resultado);
    $datos_info=$claseInfoCorporativa ->mostrarFila();
    foreach ($info_campo as $valor) {


      echo $valor->name.":".  $datos_info[$valor->name]."<br>";



    }

    ?>


  </div>
<!--
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0617634704618!2d-73.11028528528485!3d7.118841317930943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e683fe1b2319617%3A0xa77ebb8c0ec34862!2sCra.+38+%2345-74%2C+Bucaramanga%2C+Santander%2C+Colombia!5e0!3m2!1ses-419!2ses!4v1498689019363" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
</div>
<?php
include("includes/footer.php");
?>
</div>
</body>
<script>

  function initMap() {
    var latIni= <?php echo $latIni; ?>;
    var longIni= <?php echo $longIni; ?>;

		 // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 13,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(latIni, longIni), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [
                    {
                      "featureType": "administrative",
                      "elementType": "labels.text.fill",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "administrative",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape",
                      "elementType": "geometry.fill",
                      "stylers": [
                      {
                        "visibility": "on"
                      },
                      {
                        "hue": "#009fff"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape",
                      "elementType": "geometry.stroke",
                      "stylers": [
                      {
                        "visibility": "on"
                      },
                      {
                        "hue": "#009fff"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape",
                      "elementType": "labels.text.fill",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape",
                      "elementType": "labels.icon",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape.man_made",
                      "elementType": "geometry.fill",
                      "stylers": [
                      {
                        "visibility": "on"
                      },
                      {
                        "hue": "#009fff"
                      }
                      ]
                    },
                    {
                      "featureType": "landscape.man_made",
                      "elementType": "geometry.stroke",
                      "stylers": [
                      {
                        "visibility": "simplified"
                      },
                      {
                        "color": "#8ea2ae"
                      }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "geometry.fill",
                      "stylers": [
                      {
                        "visibility": "on"
                      },
                      {
                        "color": "#b0bfc7"
                      }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "labels.text.fill",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "poi",
                      "elementType": "labels.icon",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "geometry.fill",
                      "stylers": [
                      {
                        "color": "#4e4b4b"
                      }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "geometry.stroke",
                      "stylers": [
                      {
                        "color": "#4e4b4b"
                      }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "labels.text.fill",
                      "stylers": [
                      {
                        "visibility": "on"
                      },
                      {
                        "lightness": "100"
                      },
                      {
                        "saturation": "100"
                      },
                      {
                        "gamma": "10.00"
                      },
                      {
                        "weight": "10.00"
                      },
                      {
                        "color": "#b0bfc7"
                      }
                      ]
                    },
                    {
                      "featureType": "road",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                      {
                        "visibility": "off"
                      },
                      {
                        "color": "#4e4b4b"
                      }
                      ]
                    },
                    {
                      "featureType": "transit",
                      "elementType": "labels.text.fill",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "transit",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "transit",
                      "elementType": "labels.icon",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    },
                    {
                      "featureType": "water",
                      "elementType": "geometry.fill",
                      "stylers": [
                      {
                        "color": "#009bc9"
                      }
                      ]
                    },
                    {
                      "featureType": "water",
                      "elementType": "geometry.stroke",
                      "stylers": [
                      {
                        "color": "#009bc9"
                      }
                      ]
                    },
                    {
                      "featureType": "water",
                      "elementType": "labels.text.fill",
                      "stylers": [
                      {
                        "visibility": "off"
                      }
                      ]
                    }
                    ]
                  };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                /*     var mapElement = document.getElementById('map');*/

                // Create the Google Map using our element and options defined above

                var map = new google.maps.Map($("#map")[0], mapOptions);
                var infowindow = 1;
                <?php
                
                $claseMapa= new ClaseMapa();
                $resultado=$claseMapa ->mostrarLugares();
                while($row=mysqli_fetch_array($resultado)){

                  ?>


                  
                  var ubicacion = {lat: <?php echo $row['latitud']; ?>, lng:<?php echo $row['longitud']; ?>};


                  var image = {
                    url: "administrador/administracion/imagenesLugares/<?php echo $row['imagen']; ?>",

          // This marker is 20 pixels wide by 32 pixels high.
          scaledSize: new google.maps.Size(50, 50),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 0)
        };
        var marker = new google.maps.Marker({
          position: ubicacion,
          map: map,
          icon:image
        }).addListener('click', function() {

         if (infowindow&&infowindow!=1) {
          infowindow.close();
        }
        infowindow = new google.maps.InfoWindow({
          content: '<div class="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading"><?php echo $row['nombre']; ?></h1>'+
          '<div id="bodyContent">'+
          '<p><b><?php echo $row['nombre']; ?></b> </p><?php echo $row['descripcion']; ?>'+
          '</div>'+
          '</div>'
        });

        infowindow.open(map, this);

      });

        <?php

      }
      ?>

      
    }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChOJJOoK1Q9RQA6vrjEpUrTyy68ABuac4&callback=initMap">



</script>
</html>