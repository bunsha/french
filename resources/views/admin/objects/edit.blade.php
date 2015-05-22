@extends('admin')

@section('content')
@if(Session::has('message'))
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
        <h2>{{ Session::get('message') }}</h2>
    </div
@endif
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
                {!! Form::model($item, array('method' => 'POST', 'route' => array('city.update', $item->id), 'id' => 'page')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="form-group" {{ $errors->has('name') ? 'has error' : '' }}>
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    </div>
                     <div class="form-group" {{ $errors->has('shape') ? 'has error' : '' }}>
                         {!! Form::label('shape', 'Shape') !!}
                         {!! Form::text('shape', null, array('class' => 'form-control')) !!}
                     </div>

                     <br><br>

                    <h3>Districts <a href="#" id="add_new_district" class="btn btn-info" style="float:right;margin-top:-15px;" onclick=""><i class="icon-plus"></i>  Add New district</a></h3>

                    <table  id="sample-table-2" class="table table-striped table-bordered table-hover table-district">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Shape</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($disctrict as $dis)
                            <tr>
                                <td>{{$dis->id}}</td>
                                <td><a class="editable" href="#" data-type="text" data-pk="{{$dis->id}}" data-id="{{$dis->id}}" data-url="/admin/district/edit" data-title="{{$dis->name}}">{{$dis->name}}</a></td>
                                <td>{{$dis->shape}}</td>
                                <td>
                                    <div class="visible-md visible-lg visible-sm visible-xs action-buttons">
                                        <a class="red district_delete" data-id="{{$dis->id}}" href="#">
                                            <i class="icon-trash bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br><br>
                    <div class="form-group">
                        <input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
                        {!! Form::submit('Save', array('class' => 'btn btn-info')) !!}
                    </div>
                {!! Form::close() !!}


            </div>
		</div>
	</div>
</div>
		<script type="text/javascript">
			jQuery(function(){
			    $('.pages_menu').addClass('active open');
			    $('.pages_menu_create').addClass('active');
			    $('.editable').editable({
			        params: function(params) {
                     params._token = '{{ csrf_token() }}';
                     return params;
                }});
			});
			//$.fn.editable.defaults.mode = 'inline';
            $('#add_new_district').click(function(){
                $.ajax({
                    url: "/admin/district/edit",
                    data: {name: "New district", shape: "", city: "{{ $item->id }}", _token: "{{ csrf_token() }}"},
                    method: "POST",
                    success: function(obj){
                        $('.table-district tbody').append('' +
                         '<tr>' +
                         '<td>'+obj.id+'</td>' +
                         '<td>' +
                            '<a class="editable editable-click" href="#" data-type="text" data-pk="'+obj.id+'" data-id="'+obj.id+'" data-url="/admin/district/edit" data-title="'+obj.name+'">'+obj.name+'</a>' +
                         '</td>' +
                         '<td></td>' +
                         '<td>' +
                             '<div class="visible-md visible-lg visible-sm visible-xs action-buttons">' +
                                '<a class="red district_delete" data-id="'+obj.id+'" href="#" ><i class="icon-trash bigger-130"></i></a>' +
                             '</div>' +
                         '</td>' +
                          '</tr>');
                    }
                });
            });

            $('.district_delete').click(function(){
                var theId = $(this).attr('data-id');
                $.ajax({
                    url: "/admin/district/"+theId+"/delete",
                    method: "GET"
                });
                $(this).parent().parent().parent().remove();
                return false;
            });

	    </script>
@endsection
