<div class="tab-content">
	<?php $i = 0;?>
	@foreach($sections as $id => $item)
	<?php $i++;?>
	<div class="tab-pane{{ $i == 1 ? ' active' : ''}}" id="{{$id}}">
		@include('dezvoltatori.detalii.tab-' . $item['view'])
	</div>
	@endforeach
</div>