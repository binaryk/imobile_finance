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
@stop