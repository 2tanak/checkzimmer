<div id="application">
    <Single/>
</div>
<script>
    var map, map2;
    function initMap() {
        if (document.getElementById("map") == null) {
            setTimeout(function() {
                initMap()
            }, 100)
            return;
        }
        var mapCanvas = document.getElementById("map");
        var mapCanvas2 = document.getElementById("map-mobile");
        var myCenter = new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}});
        var myCenter2 = new google.maps.LatLng({{$hotel->lat}}, {{$hotel->lng}});

        var myTrip = [{lat:{{$hotel->lat}}, lng:{{$hotel->lng}}}];

        var myTrip2 = [{lat:{{$hotel->lat}}, lng:{{$hotel->lng}}}];

        var mapOptions = {
            center: myCenter,
            zoom: 10,
            disableDefaultUI: true,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            mapTypeId: google.maps.MapTypeId.DESCTOPE
        };
        var mapOptions2 = {
            center: myCenter,
            zoom: 10,
            disableDefaultUI: true,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            mapTypeId: google.maps.MapTypeId.MOBILE
        };
        var images = '/img/point-img.png';
        var marker = new google.maps.Marker ({
            position: myCenter,
            map: mapCanvas,
            icon: images
        });
        var marker2 = new google.maps.Marker ({
            position: myCenter2,
            map: mapCanvas2
        });
        var map = new google.maps.Map(mapCanvas ,mapOptions);
        var map2 = new google.maps.Map(mapCanvas2 ,mapOptions2);

        var contentString = '<div id="content">'
        '<span class="index">{{$hotel->city}}</span>'+
        '<span>&nbsp;</span>'+
        '<span class="town">{{$hotel->zip}}</span>'+
        '</div>';
        var contentString2 = '<div id="content">'+
            '<span class="index">{{$hotel->city}}</span>'+
            '<span>&nbsp;</span>'+
            '<span class="town">{{$hotel->zip}}</span>'+
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        var infowindow2 = new google.maps.InfoWindow({
            content: contentString2
        });
        infowindow.open(map, marker);
        infowindow2.open(map2, marker2);

        var flightPath = new google.maps.Polygon({
            path: myTrip,
            strokeColor: "#6bb638",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "rgb(117, 242, 122)",
            fillOpacity: 0.2
        });
        var flightPath2 = new google.maps.Polygon({
            path: myTrip2,
            strokeColor: "#6bb638",
            strokeOpacity: 1,
            strokeWeight: 2,
            fillColor: "rgb(117, 242, 122)",
            fillOpacity: 0.2
        });

        marker.setMap(map);
        marker2.setMap(map2);
        flightPath.setMap(map);
        flightPath2.setMap(map2);
    }
</script>

