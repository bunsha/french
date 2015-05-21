@extends('app')

@section('homeheader')
	<div id="header">

	</div>
@endsection

@section('home')
<div class="container">
	<div class="row" id="home_circles">

		<div class="col-md-4 circle"><span>3. קבלו כסף</span></div>

		<div class="col-md-4 circle"><span>2. קנו</span></div>

		<div class="col-md-4 circle"><span>1. הירשמו</span></div>

	</div>
</div>
<div class="home_logos">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                @foreach($items as $item)
                    <div class="col-sm-2 col-xs-4 home_companies_logo">
                        <a href="{{action('CompaniesController@index')}}"><img src="/uploads/companies/{{$item->id}}/{{$item->image}}"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="home_bottom">

</div>
<div class="home_title">
    <span></span>
    <h2>
        @if($page->title != '')
            {{$page->title}}
        @else
            {{$page->name}}
        @endif
    </h2>
</div>
<div class="home_text">
    <div class="container ">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            {{$page->content}}
            </div>
        </div>
    </div>
</div>
@endsection