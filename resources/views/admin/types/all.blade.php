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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>//$item->objects->count()</td>
                        <td>
                            <div class="visible-md visible-lg visible-sm visible-xs action-buttons">
                                <a class="green" href="/admin/types/{{$item->id}}/edit">
                                    <i class="icon-pencil bigger-130"></i>
                                </a>
                                <a class="red" href="/admin/types/{{$item->id}}/delete">
                                    <i class="icon-trash bigger-130"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
		<script src="/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
			    $('.types_menu').addClass('active open');
			    $('.types_menu_all').addClass('active');
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null,null,
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
					var $parent = $source.closest('table');
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