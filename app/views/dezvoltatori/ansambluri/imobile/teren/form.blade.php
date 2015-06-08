<div class="row">
	<div class="col-md-6">
		{{$controls[0]->out()}}
	</div>	 
</div>
{{
	Form::text('id_imobil', $imobil->id, ['id' => 'id_imobil', 'class' => 'data-source', 'data-control-source' => 'id_imobil', 'data-control-type' => 'persistent'])
}}