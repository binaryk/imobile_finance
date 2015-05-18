@section('main-content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-solid box-default box-dt">
			@if( $tv->caption() )
				<div class="box-header">
					@if($tv->icon())
						{{HTML::image($tv->icon())}}
					@endif
					<h3 class="box-title">{{$tv->caption()}}</h3>
					<i class="fa fa-refresh btn-tv-refresh pull-right" data-tv-name="{{$tv->name()}}"></i>
		        </div><!-- /.box-header -->
			@endif
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
          				{{ $tv->tree() }}
        			</div>
        		</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('custom-styles')
	{{ $tv->styles() }}
	{{ HTML::style('admin/css/tv/tv.css') }}
@stop

@section('custom-scripts')
	{{ $tv->scripts() }}
	<script>
	$(document).ready(function(){
		{{ $tv->init() }}

		$('#tari').on('nodeSelected', function(event, node) {
    		alert('Node selected ...');
    		console.log(event);
    		console.log(node);
		});
	});
	</script>
@stop