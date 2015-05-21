@extends('app')


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            <div id="map-canvas"></div>
		</div>
	</div>
</div>

<style>
    #map-canvas {
        height: 100%;
        width:100%;
        margin: 0px;
        padding: 0px
    }
</style>


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>


<script>
    function drawMap(){
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
    }


    /******************************/
    function initialize() {
        var telAviv = new google.maps.LatLng(32.066667, 34.783333);
        var mapOptions = {
            zoom: 15,
            center: telAviv
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">Moshe Dayan</h1>'+
                '<div id="bodyContent">'+
                    '<p><b>Moshe</b>, was a great person blah blah'+
                '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 200
        });

        var marker = new google.maps.Marker({
            position: telAviv,
            map: map,
            title: 'Moshe Dayan'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

