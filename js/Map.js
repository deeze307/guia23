
<script>
    function initialize() {
        var center = new google.maps.LatLng(-54.48300000, -68.18300000);

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(-54.48300000, -68.18300000)
        });
        markers.push(marker);

        var options = {
            imagePath: 'images/icons/marker.png'
        };

        var markerCluster = new MarkerClusterer(map, markers, options);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>