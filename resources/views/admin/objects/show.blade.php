@extends('admin')
@section('content')

    <style>
        #map-canvas {
            height: 400px!important;
        }
    </style>
<script src="http://maps.google.com/maps/api/js?sensor=false"
          type="text/javascript"></script>
    <script>
        var map;
        var markers = [];

        locations = [
            @foreach($maps as $map)
                ['{{$item->title}}', {{$map->lat}}, {{$map->lng}}],
            @endforeach
        ];

        function setMap(){
            var theMap = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: new google.maps.LatLng(32.0211992, 34.7425980),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            return theMap;
        }

        function initialize() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: new google.maps.LatLng(32.0211992, 34.7425980),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var infowindow = new google.maps.InfoWindow();
            var marker, i;

            addMarker(locations, map);


        }
        function addMarker(locations, map) {
            for (i = 0; i < locations.length; i++) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });
                markers.push(marker);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }
        function hideMarkers(){
            for (var i = 0; i < markers.length; i++) {
                markers[i].setVisible(false);
            }
        }
        function showMarkers(){
            for (var i = 0; i < markers.length; i++) {
                markers[i].setVisible(true);
            }
        }
        window.onload = initialize;


       jQuery(window).resize(function(){
           clearMarkers();
            locations = [
                @foreach($maps as $map)
                    ['{{$item->title}}', {{$map->lat}}, {{$map->lng}}],
                @endforeach
            ];
           window.setTimeout(addMarker(locations, setMap()),3000);
            //alert(123);
       }) ;
    </script>
sdfgsdfg
    <div id="map" style="height:300px;width:100%;"></div>
    <div id="map33" style="height:300px;width:100%;">qwdqwd</div>
fdgsdfg



@endsection