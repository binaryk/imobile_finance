@if( $photos->count() == 0 )
<div class="note note-danger">
	<p>Apartamentul <strong>{{ $record->nume }}</strong> nu are încărcate poze.</p>
</div>
@else
<div class="row">
	@foreach($photos as $i => $photo)
		<div class="col-sm-12 col-md-6 col-lg-4">
			<div class="thumbnail" data-id="{{$photo->id}}">
			
				<img src="{{(string) Image::make($photo->file_name)->resize(NULL, 200, function ($constraint){$constraint->aspectRatio(); $constraint->upsize();})->encode('data-url')}}" style="height: 200px; display: block;"/>

			</div>

		</div>
	@endforeach
</div>
@endif