<div class="row">
	<div class="col-md-6">
		{{$controls[0]->out()}}
	</div>
</div>
{{
	Form::hidden('id_ansamblu', $ansamblu->id, ['id' => 'id_ansamblu', 'class' => 'data-source', 'data-control-source' => 'id_ansamblu', 'data-control-type' => 'persistent'])
}}