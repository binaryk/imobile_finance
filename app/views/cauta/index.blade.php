@extends('template.layout') 
@section('content')
	<div class="tab-pane active" id="tab_0">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Formularul de cautare
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse">
					</a>
					<a href="#portlet-config" data-toggle="modal" class="config">
					</a>
					<a href="javascript:;" class="reload">
					</a>
					<a href="javascript:;" class="remove">
					</a>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="{{URL::route('cautare-date')}}" method="POST" class="form-horizontal form_input" ng-controller="CautaController">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Valabilitatea Ofertei</label>
									<div class="col-md-9">
										<input type="checkbox" class="make-switch" name="valabilitate_oferta" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" ng-model = 'valabilitate_oferta' ng-change="show()"> 
									</div>
								</div>
								<div class="form-group"> 
									<label class="control-label col-md-3">Denumire Cartier</label>
									<div class="col-md-4"> 
										<select class="form-control input-circle select2me" data-placeholder="Select..." name="cartier_id">
											<option value=""></option>
											@foreach($cartiere as $key => $cartier)
											<option value = "{{ $cartier['id'] }}">{{$cartier['denumire']}}</option>
											@endforeach 
										</select>
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">Strada Cladire</label>
									<div class="col-md-4">
										<input type="text" class="form-control input-circle" placeholder="Strada..." name="strada_cladire">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Numar camere</label>
									<div class="col-md-4">
										<select class="form-control input-circle" data-placeholder="Select..." name="nr_camere">
											<option value=""></option>
											<option value="1">1 camere</option>
											<option value="2">2 camere</option>
											<option value="3">3 camere</option>
											<option value="4">4 camere</option>
											<option value="5">5 camere</option>
											<option value="6">6 camere</option>
											<option value="7">7 camere</option> 
											<option value="Casa/vila">Casa/vila</option> 
											<option value="Garsoniera">Garsoniera</option> 
										</select>
									</div>
								</div>
								<div class="form-group"> 
									<label class="col-md-3 control-label">Pret de vanzare in euro</label>
									<div class="col-md-2">
										<input type="text" class="form-control input-circle" placeholder="Pret minim" name="pret_vanzare_min">
									</div>
									<div class="col-md-2">
										<input type="text" class="form-control input-circle" placeholder="Pret maxim" name="pret_vanzare_max">
									</div>
								</div>

								<div class="form-group"> 
									<label class="control-label col-md-3">Tip cladire</label>
									<div class="col-md-4"> 
										<select class="form-control input-circle select2me" data-placeholder="Select..." name="tip_cladire">
											<option value=""></option>
											@foreach($tip_cladiri as $key => $tip_cladire)
											<option value = "{{ $tip_cladire['id'] }}">{{$tip_cladire['denumire']}}</option>
											@endforeach 
										</select>
									</div>
								</div> 
								<div class="form-group">
									<label class="control-label col-md-3">Data ultimei actualizari</label>
									<div class="col-md-4">
										<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd.mm.yyyy">
											<input type="text" class="form-control" name="data_ultimei_actualizari_in">
											<span class="input-group-addon">
											to </span>
											<input type="text" class="form-control" name="data_ultimei_actualizari_out">
										</div>
										<!-- /input-group -->
										<span class="help-block">
										Selecteaza intervalul </span>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Numai Agentiile Imobiliare ?</label>
									<div class="col-md-9">
										<input type="checkbox" class="make-switch" name="agentie" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>"> 
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Numai Dezvoltatori Imobiliari ?</label>
									<div class="col-md-9">
										<input type="checkbox" class="make-switch" name="dezvoltatori" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>"> 
									</div>
								</div>
						</div>
						<div class="col-md-6">
							<div class="form-group"> 
								<label class="col-md-3 control-label">Telefon De Contact Principal</label>
								<div class="col-md-4">
									<input type="text" class="form-control input-circle" placeholder="Ex: 0756633767" name="telefon_principal">
								</div> 
							</div>
							<div class="form-group"> 
								<label class="col-md-3 control-label">Telefon De Contact Secundar 1</label>
								<div class="col-md-4">
									<input type="text" class="form-control input-circle" placeholder="Ex: 0756633767" name="telefon_1">
								</div> 
							</div>
							<div class="form-group"> 
								<label class="col-md-3 control-label">Telefon De Contact Secundar 2</label>
								<div class="col-md-4">
									<input type="text" class="form-control input-circle" placeholder="Ex: 0756633767" name="telefon_2">
								</div> 
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Acceptare Credit Prima Casa</label>
								<div class="col-md-9">
									<input type="checkbox" class="make-switch" name="credit_prima_casa" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>"> 
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Etaj Apartament</label>
								<div class="col-md-4"> 
									<select class="form-control input-circle select2me" data-placeholder="Select..." name="etaj_apartament">
										<option value=""></option>
										@foreach($etaje as $key => $etaj)
										<option value = "{{ $etaj['id'] }}">{{$etaj['denumire']}}</option>
										@endforeach 
									</select>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Compartimentare Apartament</label>
								<div class="col-md-4"> 
									<select class="form-control input-circle select2me" data-placeholder="Select..." name="compartiment_apartament">
										<option value=""></option>
										@foreach($tip_compartimente as $key => $tip_compartiment)
										<option value = "{{ $tip_compartiment['id'] }}">{{$tip_compartiment['denumire']}}</option>
										@endforeach 
									</select>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Finisaje Interioare</label>
								<div class="col-md-4"> 
									<select class="form-control input-circle select2me" data-placeholder="Select..." name="finisaje_interioare">
										<option value=""></option>
										@foreach($finisaje_interioare as $key => $finisaj_interior)
										<option value = "{{ $finisaj_interior['id'] }}">{{$finisaj_interior['denumire']}}</option>
										@endforeach 
									</select>
								</div>
							</div> 
						</div>
					</div>


						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn btn-circle blue btn_search">Cauta</button>
									<button type="button" class="btn btn-circle default">Cancel</button>
								</div>
							</div>
						</div>
				</form>
				<!-- END FORM-->
				<div class="row">
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue-hoki">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-globe"></i>Rezultatele cautarii conform criteriilor
								</div>
								<div class="tools">
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover search_res" id="sample_1">
									<thead>
									<tr>
										<th>
											 Id
										</th>
										<th>
											 Denumrie cartier
										</th>
										<th>
											 Numar de camere
										</th>
										<th>
											 Pret de vanzare euro
										</th>
										<th>
											 Valabilitatea ofertei
										</th>
										<th>
											Etaj apartament
										</th>
										<th>
											Compartimentare apartament
										</th>
										<th>
											Finisaje interioare
										</th> 
									</tr>
									</thead>
									<tbody>
									@foreach($imobils as $key => $imobil)
										<tr>
											<td>{{ $imobil->id }}</td>
											<td>{{ $imobil->cartier->denumire }}</td>
											<td>{{ $imobil->nrcam->nr_camere }}</td>
											<td>{{ $imobil->pret_vanzare_euro }}</td>
											<td>{{ ($imobil->valabilitate_oferta == 1) ? 'Da' : 'Nu' }}</td>
											<td>
											 {{ ($imobil->etaj_apartament > 0) ? 
											 	 $imobil->etajapartament->denumire :
											 	 '' 
											 }}
											</td>
											<td>
											 {{ ($imobil->compartiment_apartament > 0) ? 
											 	 $imobil->compartimet->denumire :
											 	 '' 
											 }}
											</td>
											<td>
											 {{ ($imobil->finisaje_interioare > 0) ? 
											 	 $imobil->finint->denumire :
											 	 '' 
											 }}
											</td> 
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
			</div>
		</div>
@endsection

@section('custom-scripts')
{{HTML::style("assets/global/plugins/clockface/css/clockface.css") }}
{{HTML::style("assets/global/plugins/bootstrap-datepicker/css/datepicker3.css") }}
{{HTML::style("assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css") }}
{{HTML::style("assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css") }}
{{HTML::style("assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css") }}
{{HTML::style("assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") }}

{{ HTML::script("js/angular/angular.js") }}
{{ HTML::script("js/angular/app.js") }}
{{ HTML::script("js/angular/cautare/cauta.js") }} 

{{ HTML::script("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}
{{ HTML::script("assets/global/plugins/clockface/js/clockface.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-daterangepicker/moment.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{HTML::script("assets/global/scripts/metronic.js")}}
{{HTML::script("assets/admin/layout/scripts/layout.js")}}
{{HTML::script("assets/admin/layout/scripts/quick-sidebar.js")}}
{{HTML::script("assets/admin/layout/scripts/demo.js")}}
{{HTML::script("assets/admin/pages/scripts/components-pickers.js")}}

{{HTML::script("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js") }}
{{HTML::script("assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js") }}
{{HTML::script("assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js") }}
{{HTML::script("assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js") }}
{{HTML::script("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js") }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{HTML::script("assets/global/scripts/metronic.js") }}
{{HTML::script("assets/admin/layout/scripts/layout.js") }}
{{HTML::script("assets/admin/layout/scripts/quick-sidebar.js") }}
{{HTML::script("assets/admin/layout/scripts/demo.js") }}
{{HTML::script("assets/admin/pages/scripts/table-advanced.js") }}

	<script>
	        jQuery(document).ready(function() {       
	            Metronic.init(); // init metronic core components
				Layout.init(); // init current layout
				QuickSidebar.init(); // init quick sidebar
				Demo.init(); // init demo features
	            ComponentsPickers.init();
	            // TableAdvanced.init();
	         		$(".form_input").on("submit", function( event ) {
	         	     	event.preventDefault();
	         	     	
	         	     	$.ajax({
	                        	method: $(this).attr('method'),
	                        	url: $(this).attr('action'),
	                        	data: $(this).serialize(),
	                        	dataType: "json",
	                        	success: function(data){
	                        		var tbody = $('table.search_res tbody');
	                        		tbody.html('');
	                        		var _content = '';
	                        		for (var i = 0; i < data.length; i++) {
	                        			_content += '<tr>';
	                        			_content += '<td>' + data[i].id + '</td>';
	                        			_content += '<td>' + data[i].cartier + '</td>';
	                        			_content += '<td>' + data[i].nr_camere + '</td>';
	                        			_content += '<td>' + data[i].pret_vanzare_euro + '</td>';
	                        			_content += '<td>' + data[i].valabilitate_ofertei + '</td>';
	                        			_content += '<td>' + data[i].tip_etaj + '</td>';
	                        			_content += '<td>' + data[i].tip_compartiment + '</td>';
	                        			_content += '<td>' + data[i].finisaje_interne + '</td>';
	                        			_content += '</tr>';

	                        		}
	                        		tbody.append(_content);

	                        	},
	                        	error: function(data){
	                        	 	console.log('Eroare la salvare.');
	                        	}
	         	        	})
	         		});
	        });   
	</script>
@endsection