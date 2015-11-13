@if(file_exists((string) $record->photo))
    exista
    @if(isset ($record->photo) )
        <img src="{{(string) Image::make($record->photo)->encode('data-url')}}" style="width:64px"/>
    @endif
@endif
