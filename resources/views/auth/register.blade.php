@extends('app')

@section('content')
<div style="height: 30px;"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.register') }}</div>
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="first_name" value="">
							</div><label class="col-md-4 control-label">First Name</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="last_name" value="">
							</div><label class="col-md-4 control-label">Last Name</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div><label class="col-md-4 control-label">E-Mail Address</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="credit" value="">
							</div><label class="col-md-4 control-label">Last 4 digits of your credit card nubmer</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="date" class="form-control" name="birthday" value="">
							</div><label class="col-md-4 control-label">Birth date</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="password" class="form-control" name="password">
							</div><label class="col-md-4 control-label">Password</label>
						</div>

						<div class="form-group">

							<div class="col-md-8">
								<input type="password" class="form-control" name="password_confirmation">
							</div><label class="col-md-4 control-label">Confirm Password</label>
						</div>

						<div class="form-group">
							<div class="col-md-1 col-md-offset-11">
								<button type="submit" class="btn btn-primary">
									{{ Lang::get('auth.register') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
