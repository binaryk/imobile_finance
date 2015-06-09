<div class="row">
	<!-- telefon -->
	<div class="col-md-4">
		{{$controls[0]->out()}}
	</div>
	<!-- telefon 1 -->
	<div class="col-md-4">
		{{$controls[1]->out()}}
	</div>	
	<!-- telefon 2 -->
	<div class="col-md-4">
		{{$controls[2]->out()}}
	</div>	
</div>
<div class="row">
	<!-- email -->
	<div class="col-md-4">
		{{$controls[3]->out()}}
	</div>
	<!-- agentie -->
	<div class="col-md-4">
		{{$controls[4]->out()}}
	</div>
	<!-- judet -->
	<div class="col-md-4">
		{{$controls[5]->out()}}
	</div>	
</div>
<div class="row">
	<!-- nr_camere -->
	<div class="col-md-4">
		{{$controls[6]->out()}}
	</div>
	<!-- tip compartiemnare -->
	<div class="col-md-4">
		{{$controls[7]->out()}}
	</div>
	<!-- suprafata minima -->
	<div class="col-md-4">
		{{$controls[8]->out()}}
	</div>
</div>
<div class="row">
	<!-- suprafata maxim -->
	<div class="col-md-4">
		{{$controls[9]->out()}}
	</div>
	<!-- etaj -->
	<div class="col-md-4">
		{{$controls[10]->out()}}
	</div>
	<!-- finisaje interne -->
	<div class="col-md-4">
		{{$controls[11]->out()}}
	</div>
</div>
<div class="row">
	<!-- numar bai -->
	<div class="col-md-4">
		{{$controls[12]->out()}}
	</div>
	<!-- numar balcoane -->
	<div class="col-md-4">
		{{$controls[13]->out()}}
	</div>
	<!-- detalii despre balcoane -->
	<div class="col-md-4">
		{{$controls[14]->out()}}
	</div>
</div>
<div class="row">
	<!-- anul construciei -->
	<div class="col-md-4">
		{{$controls[15]->out()}}
	</div> 
	<!-- parcare -->
	<div class="col-md-4">
		{{$controls[16]->out()}}
	</div>
	<!-- credit -->
	<div class="col-md-4">
		{{$controls[17]->out()}}
	</div> 
</div>
<div class="row">
	<!-- zona aproximativa -->
	<div class="col-md-4">
		{{$controls[18]->out()}}
	</div>
	<!-- adresa exacta -->
	<div class="col-md-4">
		{{$controls[19]->out()}}
	</div>
	<!-- pret -->
	<div class="col-md-3">
		{{$controls[20]->out()}}
	</div>
</div>
<div class="row">
	<!-- detalii -->
	<div class="col-md-3">
		{{$controls[21]->out()}}
	</div>
	<!-- detalii private -->
	<div class="col-md-3">
		{{$controls[22]->out()}}
	</div> 
</div>

{{
	Form::hidden('id_proprietar', $proprietar->id, ['id' => 'id_proprietar', 'class' => 'data-source', 'data-control-source' => 'id_proprietar_pf', 'data-control-type' => 'persistent'])
}}