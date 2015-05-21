<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Geocoding service</title>
    <style>
        html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
        #panel {
            position: absolute;
            top: 5px;
            left: 50%;
            margin-left: -180px;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
        }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?keyAIzaSyCfMVXvdl1ZdAUwfrzAYAlL9FcDFasH0H0sensor=true" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
        $(document).ready(function(){
            $('a').click(function(){
                $.ajax({
                    type: "POST",
                    url: "/api.php",
                    data: ({type: 1}),
                    cache: false,
                    dataType: "text",
                    success: function(response){
                        var infoWindow = new google.maps.InfoWindow;
                        var markers = JSON.parse(response);
                        for (var i = 0; i < markers.length; i++) {
                            var name = markers[i].name;
                            var address = markers[i].address;
                            var content = markers[i].content;
                            var type = markers[i].type;
                            var point = new google.maps.LatLng(
                                parseFloat(markers[i].lat),
                                parseFloat(markers[i].lng));
                            var html = "<b>" + name + "</b> <br/>" + address+ content;
                            var marker = new google.maps.Marker({
                                map: map,
                                position: point
                            });
                            bindInfoWindow(marker, map, infoWindow, html);

                            var customIcons = {
                                restaurant: {
                                    icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
                                },
                                bar: {
                                    icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
                                }
                            };
                        }
                    }
                });
            });
        });


        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }
        var map;
        function initialize() {
            var mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(32.088501, 34.780479)
            };
            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body><a href="#">Get Doctors</a>
<div id="map-canvas"></div>

</body>
</html>