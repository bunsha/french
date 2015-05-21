@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$page->name}}</h1>
                {{$page->content}}
            </div>
        </div>
    </div>
@endsection

