<!DOCTYPE html>
<html>
<head>
  <title>Geocoding service</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <input id="address" type="textbox" value="Sydney, NSW">
      <input id="submit" type="button" value="Geocode">
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
       var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 13,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(41.3796481, 2.119346), // New York

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
                  var map = new google.maps.Map(document.getElementById('map'),mapOptions);
                  var contentString = '<div class="content">'+
                  '<div id="siteNotice">'+
                  '</div>'+
                  '<h1 id="firstHeading" class="firstHeading">Oficinas</h1>'+
                  '<div id="bodyContent">'+
                  '<p><b>La Oficina de Atención al Barcelonista</b> está situada dentro de la Seu Social, ubicada en el antiguo Palau Blaugrana 2. Se puede acceder por el acceso 14 o por el acceso de Travessera de les Corts.<br><br>Para su comodidad, le aconsejamos consultar las secciones relativas a trámites de socios y abonados donde encontrará los requisitos, documentación necesaria y formularios oficiales para cada uno de los trámites.<br><br><b> Horario de la OAB:</b> De lunes a viernes de 9 a 20 horas.<br><b> Horarios en días de partido:</b><br><ul><li type="square">Partidos de fútbol en el Camp Nou entre semana: De 9 hasta el inicio de la segunda parte.</li><br><li type="square">Partidos de fútbol en el Camp Nou en fin de semana: De 10 horas hasta el inicio de la segunda parte.</li><br><li type="square">Partidos de fútbol en el Camp Nou en festivo: De 10 horas hasta el inicio de la segunda parte.</li></ul></p>'+
                  '</div>'+
                  '</div>';




                  var infowindow = new google.maps.InfoWindow({
                    content: contentString
                  });

                  var image = {
                    url: 'assets/images/barcelona.png',
          // This marker is 20 pixels wide by 32 pixels high.
          scaledSize: new google.maps.Size(50, 50),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 0)
        };

        var marker = new google.maps.Marker({
         position: new google.maps.LatLng(41.3796481, 2.119346),
         map: map,
         icon:image
       });
        marker.addListener('click', function() {
         infowindow.open(map, marker);
       });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChOJJOoK1Q9RQA6vrjEpUrTyy68ABuac4&callback=initMap">
  </script>
</body>
</html>