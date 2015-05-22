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
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content', 'Content') !!}
                        <textarea name="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        {!! Form::label('type', 'Select type') !!}
                        &nbsp;&nbsp;
                        <select name="type">
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class=" inline">
                            Active:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input name="active" checked="checked" type="checkbox" class="ace ace-switch ace-switch-6">
                            <span class="lbl"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" name="address" type="text" id="address">
                        <div id="map_response" class="alert" style="display:none"></div>
                        <input class="form-control" name="maps_id" type="hidden" id="maps_id">
                        <input class="form-control" name="maps_city" type="hidden" id="maps_city">
                        <input class="form-control" name="maps_district" type="hidden" id="maps_district">
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
		<script type="text/javascript">
			jQuery(function(){
			    $('.objects_menu').addClass('active open');
			    $('.objects_menu_create').addClass('active');
			});

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
                    }
                });
			});


	    </script>
@endsection
