@section('custom-styles')
	@parent
	{{ HTML::style('apartamente/cautare.css') }}
@stop
@section('content')
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="portlet blue box">
			<div class="portlet-title">
				<div class="caption">Detalii despre apartament</div>
				<div class="actions">
					<a target="_blank" href="{{URL::route('apartament-deschide-pdf', ['id' => $record->id])}}" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i> Deschide PDF </a>

					<a href="{{URL::route('apartament-descarca-pdf', ['id' => $record->id])}}" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Descarcă PDF </a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="tabbable-custom ">
					@include('apartamente.detalii.~tabs-menu')
					@include('apartamente.detalii.~tabs-content')
				</div>
			</div>
		</div>
	</div>
</div>

<!-- formularul modal -->
<div class="modal fade" id="portlet-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">{{ $record->nume }}</h4>
			</div>
			<div class="modal-body"><div id="photo-place" style="width:480px; margin-left:auto; margin-right:auto;"></div></div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@stop
@section('custom-scripts')
	@parent
	<script>
	$('#tab4 .thumbnail').click( function(){
		var id_photo = $(this).data('id');
		$.ajax({
			url      : "{{ URL::route('apartamente-load-photo') }}",
        	type     : 'post',
        	dataType : 'json',
        	data     : {'id_photo' : id_photo},
        	success  : function(result)
        	{
        		console.log('Sucess');
        		$('#photo-place').html('').html(result.img);
        		$('#portlet-photo').modal('show');
        	}
		});

		
	});
	</script>
@stop