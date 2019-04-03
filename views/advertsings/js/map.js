var geocoder;         //Para geolocalizar
var infowindow;      //Ventana de info
var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización

//Funcion principal
initMap = function ()
{

    //uso la API para geolocalizar
    navigator.geolocation.getCurrentPosition(
        function (position){
            coords =  {
                lng: position.coords.longitude,
                lat: position.coords.latitude
            };
            setMapa(coords);  //paso las coordenadas al metodo para crear el mapa


        },function(error){console.log(error);});

}

function setMapa (coords)
{
    //Se crea una nueva instancia del objeto mapa
    var map = new google.maps.Map(document.getElementById('map'),
        {
            zoom: 6,
            center:new google.maps.LatLng(coords.lat,coords.lng),

        });
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow;
    document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder,map,infowindow);
    });
    function geocodeAddress(geocoder, map, infowindow) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    title:'Guia23',
                    draggable: true

                });
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(new google.maps.LatLng(coords.lat,coords.lng), marker);

                marker.addListener('click', toggleBounce);
                marker.addListener('click',)
                map.setZoom(15);
                map.setCenter(marker.getPosition());
                marker.addListener( 'dragend', function (event)
                {

                    document.getElementById("coords").value = this.getPosition().lat()+","+ this.getPosition().lng();

                });
                //animacion
                function toggleBounce() {
                    if (marker.getAnimation() !== null) {
                        marker.setAnimation(null);
                    } else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                        document.getElementById("latitud").value = this.getPosition().lat();
                        document.getElementById("longitud").value = this.getPosition().lng();

                    }
                }

            } else {
                alert('No se pudo geolocalizar : ' + status);
            }
        });
    }
}