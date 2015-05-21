@extends('admin')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 ">
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
                {!! Form::model($item, array('method' => 'PATCH', 'route' => array('menu.update', $item->name), 'name' => 'menu')) !!}
                    @include('menu._form')
                {!! Form::close() !!}
            </div>
		</div>

		<div class="col-md-8">
            <div class="panel-body">
                 <div class="page-header">
                     <h2>Add menu items</h2>
                 </div>
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="#pages">
                                <i class="green icon-edit bigger-110"></i>
                                Pages
                            </a>
                        </li>

                        <li class="">
                            <a data-toggle="tab" href="#free">
                                <span class="green icon-code bigger-110"></span>
                                Url
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="pages" class="tab-pane active">
                            @foreach ($pages as $page)
                            <ul style="list-style: none">
                                <li>
                                    <a class="page_item" href="#" data-id="{{$page->id}}" data-url="{{$page->slug}}" data-title="{{$page->name}}">
                                        <span class="green icon-plus bigger-110"></span>
                                        {{$page->name}}
                                    </a>
                                </li>
                            </ul>
                            @endforeach
                        </div>

                        <div id="free" class="tab-pane">
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="text">Link title</label>
                                        <input type="text" name="title" id="title_input" placeholder="Ex: Yahoo" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Link url &nbsp;</label>
                                        <input type="text" name="url" id="url_input"  placeholder="Ex: http://yahoo.com" />
                                    </div>
                                    <button class="add_url" type="button">Add</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <h3>Drag and Drop items</h3>

                    <div class="dd dd-draghandle" id="nestable">
                        <input type="hidden" id="token" name="_token" value="<?php echo csrf_token(); ?>">
                        <ol class="dd-list first">
                            {!!$menuItems!!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection

@section('scripts')
    <script src="/admin/assets/js/jquery.nestable.min.js"></script>
    <script type="text/javascript">
        function getIndex(){
            var index = 0;
            $('.first li').each(function(){
                if(index < $(this).attr('data-id') ){
                    index = $(this).attr('data-id');
                }
            });
            index = parseInt(index) + 1;

            return index;
        }

        function destroy(obj){
            $.post("/admin/menuitems/"+$(obj).parent().parent().parent().attr('data-id')+"/destroy", {
                _token:$('#token').val()
            }, function(response){
                $(obj).parent().parent().parent().remove();
            });
        }

        $('.dd').nestable().on('change', function() {
            var json_text = $('.dd').nestable('serialize');
            $.post("/admin/add_menu_items", {
                cmd: 'nestable',
                data: json_text,
                menu_name: "{{$item->name}}",
                asd:123,
                _token:$('#token').val()
            }, function(response){

            });
        });



        $(document).ready(function(){
            $('.dd').nestable();
            $('.dd-handle a').on('mousedown', function(e){
                e.stopPropagation();
            });

            $('.page_item').click(function(){
                var title = $(this).attr('data-title');
                var id = getIndex();
                var url = $(this).attr('data-url');

                $.post("/admin/menuitems/store", {
                    name: title,
                    id: null,
                    url:'{{Config::get('app.url')}}'+url,
                    menu_name: "{{$item->name}}",
                    _token:$('#token').val()
                }, function(response){
                    $('ol.first').append('<li class="dd-item dd2-item" data-url="'+url+'" data-id="'+response+'"><div class="dd-handle dd2-handle"><i class="normal-icon icon-reorder blue bigger-130"></i><i class="drag-icon icon-move bigger-125"></i></div><div class="dd2-content">'+title+'<div class="pull-right action-buttons"><a class="red" onclick="destroy(this);" href="#"><i class="icon-trash bigger-130"></i></a></div></div></li>');
                });
            });

            $('.add_url').click(function(){
                 var title = $('#title_input').val();
                 var id = getIndex();
                 var url = $('#url_input').val();

                $.post("/admin/menuitems/store", {
                    name: title,
                    id: null,
                    url:url,
                    menu_name: "{{$item->name}}",
                    _token:$('#token').val()
                }, function(response){
                    $('ol.first').append('<li class="dd-item dd2-item" data-url="'+url+'" data-id="'+response+'"><div class="dd-handle dd2-handle"><i class="normal-icon icon-reorder blue bigger-130"></i><i class="drag-icon icon-move bigger-125"></i></div><div class="dd2-content">'+title+'<div class="pull-right action-buttons"><a class="red" onclick="destroy(this);" href="#"><i class="icon-trash bigger-130"></i></a></div></div></li>');
                });
            });



        });


    </script>
@endsection