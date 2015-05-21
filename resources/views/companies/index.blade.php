@extends('app')

@section('content')

<div class="home_title" style="margin-top:-10px;">
    <span></span>
    <h2>{!! Lang::get('companies.h2') !!}</h2>
</div>
    <div class="container companies_container">
        <div class="row">
            <div class="col-md-12">
            @foreach($companies as $company)
                <div class="col-md-4" style="margin-bottom:20px;">
                    <div class="inner_company">
                        <div class="company_image">
                            <img src="/uploads/companies/{{$company->id}}/{{$company->image}}">
                        </div>
                        <div class="row" style="margin-top:30px;">
                            <div class="col-xs-7 inner_text">
                                <div class="col-md-12">
                                    <div class="company_info">{!!html_entity_decode($company->content)!!}</div>
                                    @if (Auth::guest())
                                    <a class="btn btn-block btn-primary btn-lg" href="{{ url('/auth/login') }}">
                                        {{ Lang::get('auth.login') }}
                                    </a>
                                    @else

                                    <button  type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#myModal{{$company->id}}">
                                        {{ Lang::get('companies.buy') }}
                                    </button >


                                    <style>
                                        .modal-backdrop{
                                            z-index:0;
                                        }
                                    </style>
                                    <div class="modal fade" id="myModal{{$company->id}}" tabindex="1041" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{ Lang::get('companies.modal.title') }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {{ Lang::get('companies.modal.text') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">{{ Lang::get('companies.modal.close') }}</button>
                                                    <a class="btn  btn-primary btn-lg" href="{{$company->url}}">{{ Lang::get('companies.buy') }}</a>
                                              </div>
                                            </div>
                                        </div>
                                    </div>








                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-4  percent">
                                    <div class="col-md-12">
                                        <span>{{$company->percent}}</span>
                                        <br>
                                        {{ Lang::get('companies.cashback') }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
 <div class="home_bottom">

 </div>
@endsection

