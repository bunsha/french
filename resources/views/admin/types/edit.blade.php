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
                {!! Form::model($item, array('method' => 'POST', 'route' => array('type.update', $item->id), 'id' => 'page')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="form-group" {{ $errors->has('name') ? 'has error' : '' }}>
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    </div>
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
			    $('.types_menu').addClass('active open');
			    $('.types_menu_create').addClass('');

			});


	    </script>
@endsection
