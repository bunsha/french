@extends('admin')

@section('content')
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
                <form class="form-horizontal" role="form" method="post" action="{{ url('/admin/city/store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group" {{ $errors->has('name') ? 'has error' : '' }}>
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                    </div>
                     <div class="form-group" {{ $errors->has('shape') ? 'has error' : '' }}>
                         {!! Form::label('shape', 'Shape') !!}
                         {!! Form::text('shape', null, array('class' => 'form-control')) !!}
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
			    $('.pages_menu').addClass('active open');
			    $('.pages_menu_create').addClass('active');
			});
	    </script>
@endsection
