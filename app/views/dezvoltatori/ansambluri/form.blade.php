<div class="row">
	<!--nume-->
	<div class="col-md-6">
		{{$controls[0]->out()}}
	</div>
	<!--telefon-->
	<div class="col-md-6">
		{{$controls[1]->out()}}
	</div>
	<!--anul_infiintarii-->
	<div class="col-md-4">
		{{$controls[2]->out()}}
	</div>
	<!--stadiul-->
	<div class="col-md-4">
		{{$controls[3]->out()}}
	</div>
	<!--id_tip_stadiu_ansamblu-->
	<div class="col-md-4">
		{{$controls[4]->out()}}
	</div>
	<!--strada-->
	<div class="col-md-12">
		{{$controls[5]->out()}}
	</div>
	<!--detalii_localizare-->
	<div class="col-md-6">
		{{$controls[6]->out()}}
	</div>
	<!--detalii_confort-->
	<div class="col-md-6">
		{{$controls[7]->out()}}
	</div>
	<!--detalii_sistem_constructiv-->
	<div class="col-md-6">
		{{$controls[8]->out()}}
	</div>
	<!--detalii_financiare-->
	<div class="col-md-6">
		{{$controls[9]->out()}}
	</div>
</div>
{{
	Form::hidden('id_dezvoltator', $dezvoltator->id, ['id' => 'id_dezvoltator', 'class' => 'data-source', 'data-control-source' => 'id_dezvoltator', 'data-control-type' => 'persistent'])
}}