@extends('admin')

@section('content')
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 ">
            <div class="panel-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="post" action="{{ url('/admin/objects/store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">






                    <div class="form-group">
                        <h3 class="header smaller lighter blue" style="font-weight: bold">Main</h3>
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Content') !!}
                        <textarea style="height:300px;" name="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        {!! Form::label('type', 'Select type') !!}
                        &nbsp;&nbsp;
                        <select name="type">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;&nbsp;
                        <a href="/admin/types/create">need a new one?</a>
                    </div>

                    <div class="form-group">
                        <label class=" inline">
                            Active:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="active" checked="checked" type="checkbox" class="ace ace-switch ace-switch-6">
                            <span class="lbl"></span>
                        </label>
                    </div>


                    <div class="form-group">
                        <div class="widget-box collapsed">
                             <div class="widget-header">
                                 <h4>Map</h4>
                                 <div class="widget-toolbar">
                                     <a href="#" data-action="collapse">
                                         <i class="icon-chevron-up"></i>
                                     </a>
                                     <a href="#" data-action="close">
                                         <i class="icon-remove"></i>
                                     </a>
                                 </div>
                             </div>
                             <div class="widget-body">
                                 <div class="widget-body-inner">
                                     <div class="widget-main">
                                         <div class="form-group" style="padding:1%">
                                             <label for="address">Address</label>
                                             <input class="form-control" name="address" type="text" id="address">
                                             <div id="map_response" class="alert" style="display:none"></div>
                                             <input class="form-control" name="maps_id" type="hidden" id="maps_id">
                                             <input class="form-control" name="maps_city" type="hidden" id="maps_city">
                                             <input class="form-control" name="maps_district" type="hidden" id="maps_district">
                                             <br>
                                             <div id="map-canvas"></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <h3 class="header smaller lighter blue" style="font-weight: bold">Options</h3>
                    </div>


                    <div class="form-group">
                        <input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
                        {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>



<style>
    #map, #map-canvas {
        height: 300px!important;
        width:100%!important;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&language=ru"></script>
<script type="text/javascript">
    jQuery(function(){
        $('.objects_menu').addClass('active open');
        $('.objects_menu_create').addClass('active');
    });
    //var myLatlng = new google.maps.LatLng(32.0486745,34.8692821);

    var map;
    function initialize() {
        var myLatlng = new google.maps.LatLng(32.0486745,34.8692821);
        var mapOptions = {
            zoom: 16,
            center: myLatlng
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }
    //google.maps.event.addDomListener(window, 'load', initialize);


    $('#address').change(function() {
        $.ajax({
            url: "/admin/maps/load",
            data: {string: $(this).val(), _token: "{{ csrf_token() }}"},
            method: "POST",
            success: function(obj){
                var divClass;
                var iconClass;
                if(obj.status == "ERROR: Unable to find location"){
                    divClass = 'danger';
                    iconClass = 'flash';
                }else{
                    divClass = 'success';
                    iconClass = 'check';
                }
                $('#map_response').removeClass('alert-danger').removeClass('alert-success').html(obj.status+' <i class="icon-'+iconClass+'"></i>').addClass('alert-'+divClass).show();
                $('#maps_id').val(obj.id);
                $('#maps_city').val(obj.city);
                $('#maps_district').val(obj.district);
                $('#map-canvas').show();
                //$('#maps_district').after('<div id="map" style="height:300px;width:300px;"></div>');
                console.log(obj);
                console.log(obj.latlng);
                var coords = new google.maps.LatLng(parseFloat(obj.lat),parseFloat(obj.lng));

                var mapOptions = {
                    zoom: 14,
                    center: coords
                };
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                var marker = new google.maps.Marker({
                    position: coords,
                    map: map,
                    title: 'Hello World!'
                });
            }
        });
    });
</script>
@endsection
