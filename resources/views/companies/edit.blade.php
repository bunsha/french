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
                {!! Form::model($company, array('method' => 'PATCH', 'route' => array('companies.update', $company->id), 'id' => 'company', 'files' => true)) !!}
                    @if($company->id)
                        <img src="/uploads/companies/{{$company->id}}/{{$company->image}}">
                    @endif
                    @include('companies._form')
                {!! Form::close() !!}

            </div>
		</div>
	</div>
</div>
@endsection
