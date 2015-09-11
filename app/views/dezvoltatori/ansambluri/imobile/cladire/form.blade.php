<div class="row">
	<div class="col-md-4">
		{{$controls[0]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[1]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[2]->out()}}
	</div>	 
</div>
<div class="row">
	<div class="col-md-4">
		{{$controls[4]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[5]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[21]->out()}}
	</div>	 
</div>
<div class="row">
	<div class="col-md-4">
		{{$controls[6]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[7]->out()}}
	</div> 
</div>
<div class="row">
	<div class="col-md-4">
		{{$controls[10]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[11]->out()}}
	</div>	 
</div>
<div class="row">
	<div class="col-md-4">
		{{$controls[12]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[17]->out()}}
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		{{$controls[19]->out()}}
	</div>
	<div class="col-md-4">
		{{$controls[20]->out()}}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		{{$controls[18]->out()}}
	</div>
</div>
{{
	Form::hidden('id_imobil', $imobil->id, ['id' => 'id_imobil', 'class' => 'data-source', 'data-control-source' => 'id_imobil', 'data-control-type' => 'persistent'])
}}