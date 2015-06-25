@if($record->vechime_imobil == 0)
	<span title="Neprecizat" class="label label-sm label-default">?</span>
@else
	@if($record->vechime_imobil == 1)
		<span title="Nou" class="label label-sm label-warning">N</span>
	@else
		<span title="Vechi" class="label label-sm label-danger">V</span>
	@endif
@endif