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
                {!! Form::model($page, array('method' => 'PATCH', 'route' => array('pages.update', $page->id), 'id' => 'page')) !!}
                    @include('pages._form')
                {!! Form::close() !!}

            </div>
		</div>
	</div>
</div>
@endsection
