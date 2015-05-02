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
				<form action="#" class="form-horizontal" ng-controller="CautaController">
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
										<select class="form-control input-circle" data-placeholder="Select...">
											<option value=""></option>
											<option value="1">1 camere</option>
											<option value="2">2 camere</option>
											<option value="3">3 camere</option>
											<option value="4">4 camere</option>
											<option value="5">5 camere</option>
											<option value="6">6 camere</option>
											<option value="7">7 camere</option> 
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
										<div class="input-group" id="defaultrange">
											<input type="text" class="form-control" readonly="" name="data_ultimei_actualizari">
											<span class="input-group-btn">
											<button class="btn default date-range-toggle" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
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
									<input type="text" class="form-control input-circle" placeholder="Ex: 0756633767" name="strada_cladire" name="telefon_1">
								</div> 
							</div>
							<div class="form-group"> 
								<label class="col-md-3 control-label">Telefon De Contact Secundar 1</label>
								<div class="col-md-4">
									<input type="text" class="form-control input-circle" placeholder="Ex: 0756633767" name="strada_cladire" name="telefon_1">
								</div> 
							</div>
							<div class="form-group"> 
								<label class="col-md-3 control-label">Telefon De Contact Secundar 2</label>
								<div class="col-md-4">
									<input type="text" class="form-control input-circle" placeholder="Ex: 0756633767" name="strada_cladire" name="telefon_2">
								</div> 
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Acceptare Credit Prima Casa</label>
								<div class="col-md-9">
									<input type="checkbox" class="make-switch" name="valabilitate_oferta" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" ng-model = 'valabilitate_oferta' ng-change="show()"> 
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Etaj Apartament</label>
								<div class="col-md-4"> 
									<select class="form-control input-circle select2me" data-placeholder="Select...">
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
									<select class="form-control input-circle select2me" data-placeholder="Select...">
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
									<select class="form-control input-circle select2me" data-placeholder="Select...">
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
									<button type="submit" class="btn btn-circle blue">Cauta</button>
									<button type="button" class="btn btn-circle default">Cancel</button>
								</div>
							</div>
						</div>
				</form>
				<!-- END FORM-->
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

	<script>
	        jQuery(document).ready(function() {       
	            Metronic.init(); // init metronic core components
				Layout.init(); // init current layout
				QuickSidebar.init(); // init quick sidebar
				Demo.init(); // init demo features
	            ComponentsPickers.init();
	        });   
	</script>
@endsection