@extends('admin')
@section('content')

    @if(Session::has('message'))
        <div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="icon-remove"></i>
            </button>
            <h2>{{ Session::get('message') }}</h2>
        </div>
    @endif
        <div class="table-responsive">
            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center">
                            <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="hidden-480"><i class="icon-time bigger-110 hidden-480"></i>Created</th>
                        <th><i class="icon-time bigger-110 hidden-480"></i>Updated</th>
                        <th class="hidden-480">Status</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td class="center">
                            <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </td>

                        <td>
                            {{$page->id}}
                        </td>
                        <td>{{$page->name}}</td>
                        <td class="hidden-480">{{$page->created_at}}</td>
                        <td>{{$page->updated_at}}</td>
                        <td class="hidden-480">
                            @if($page->active)
                                <span class="label label-sm label-info arrowed arrowed-righ">
                                active
                                </span>
                            @else
                                 <span class="label label-sm label-danger arrowed arrowed-righ">
                                 not active
                                 </span>
                            @endif

                            @if($page->is_home)
                                <span class="label label-sm label-success arrowed arrowed-righ">
                                    homepage
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="/pages/{{$page->id}}">
                                    <i class="icon-zoom-in bigger-130"></i>
                                </a>

                                <a class="green" href="/admin/pages/{{$page->id}}/edit">
                                    <i class="icon-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="/admin/pages/{{$page->id}}/destroy">
                                    <i class="icon-trash bigger-130"></i>
                                </a>
                            </div>

                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                <div class="inline position-relative">
                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-caret-down icon-only bigger-120"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="icon-zoom-in bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="icon-edit bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="icon-trash bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
			    $('.pages_menu').addClass('active open');
			    $('.pages_menu_all').addClass('active');
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
@endsection