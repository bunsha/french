<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	@if(isset($title))
	    {{$title}}
	@else
	@endif
	</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!--
    <link href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/cdnjs/3.3.1/css/bootstrap-rtl.min.css" rel="stylesheet">
    -->
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <style>
        .container{
            direction: rtl;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-default ">
		<div class="container">
			<div class="navbar-header">
				<div class="col-md-1"></div>
				<div class="col-md-4">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				</div>
				<div class="col-md-7">
				<a class="navbar-brand" href="{{ url('/') }}">CashBack</a>
				</div>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					    {!!\App\Http\Controllers\MenusController::show('top')!!}
						<li><a href="{{ url('/auth/register') }}">{{ Lang::get('auth.register') }}</a></li>
						<li><a href="{{ url('/auth/login') }}">{{ Lang::get('auth.login') }}</a></li>


					@else
						{!!\App\Http\Controllers\MenusController::show('top')!!}
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">!Hi, {{ Auth::user()->first_name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">{{ Lang::get('auth.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

    @yield('homeheader')
	@yield('home')


	@yield('content')




	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.home_companies_logo img').mouseenter(function () {
                $(this).addClass('magictime puffIn');
            });
            $('.home_companies_logo img').mouseout(function () {
                $(this).removeClass('magictime puffIn');
            });
        })
    </script>
</body>
</html>
