@extends('app')

@section('content')
    @foreach($pages as $page)
        {{$page}}
    @endforeach
    @if(Session::has('message'))
        <div class="alert-box success">
            <h2>{{ Session::get('message') }}</h2>
        </div>
    @endif
@endsection

