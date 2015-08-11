<ul class="nav nav-tabs ">
	<?php $i = 0;?>
	@foreach($sections as $id => $item)
		<?php $i++; ?>
		<li{{ $i == 1 ? ' class="active"' : ''}}>
			<a href="#{{$id}}" data-toggle="tab">{{$item['caption']}}</a>
		</li>
	@endforeach
</ul>