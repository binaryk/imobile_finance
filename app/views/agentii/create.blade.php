@extends('template.layout')
@section('title-h1')
	Adauga
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		{{ Notification::showAll(); }}
		<div class="tabbable tabbable-custom boxless tabbable-reversed">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#tab_0" data-toggle="tab">
					Date generale </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_0">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Date generale
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
							{{ Form::model($imobil = NULL) }}
								<div class="form-body">
									<div class="row">
										<div class="col-md-3">
											{{ Form::selectField('Denumire Judet','judet_id', $judete, 12, array('readonly' => 'readonly')) }}
										</div>
										<div class="col-md-3">
											{{ Form::selectField('Denumire Localitate','localitate_id', $localitati, 5350, array('readonly' => 'readonly')) }}
										</div>

										<div class="col-md-3">
											{{ Form::selectField('Denumire Cartier','cartier_id', $cartiere) }}
										</div>
										<div class="col-md-3">
											{{ Form::selectField('Numar De Camere','nr_camere', $camere) }}
										</div>

										<div class="col-md-3">
											{{ Form::textField('Strada Cladire','strada_cladire') }}
										</div>
										<div class="col-md-3">
											{{ Form::textField('Numar Cladire','nr_cladire') }}
										</div>
										<div class="col-md-3">
											{{ Form::selectField('Tip Cladire','tip_cladire', $tip_cladire) }}
										</div>
										<div class="col-md-3">
											{{ Form::textField('Numar Apartament','nr_apartament') }}
										</div>
										<div class="col-md-3">
											{{ Form::selectField('Numar Etaje Cladire','nr_etaje_cladire', $tip_nr_etaje) }}
										</div>
										<div class="col-md-3">
											{{ Form::textField('Pret De Vanzare In Euro','pret_vanzare_euro') }}
										</div>

										<div class="col-md-3">
											<div class="margin-bottom-20">
												<label for="option1">Pret Negociabil</label><br />
												<input type="checkbox" class="make-switch switch-large" data-label-icon="fa fa-fullscreen" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" name="pret_negociabil" > 
											</div>
										</div>
										<div class="col-md-3">
											{{ Form::textField('Data Aparitiei Anuntului','data_aparitie_anunt', NULL, array('class' => 'date-picker form-control', 'readonly' => '')) }}
										</div>
										<!-- <div class="col-md-3">
											{{ Form::textField('Pret Negociabil','judet') }}
										</div> -->
										<div class="col-md-3">
											{{ Form::textField('Data Ultimei Actualizari','data_ultimei_actualizari', NULL, array('class' => 'date-picker form-control', 'readonly' => '')) }}
										</div>

										<div class="col-md-3">
											<div class="margin-bottom-20">
												<label for="option1">Valabilitatea Ofertei</label><br />
												<input type="checkbox" class="make-switch switch-large" data-label-icon="fa fa-fullscreen" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" name="valabilitate_oferta" > 
											</div>
										</div>
										<div class="col-md-3">
											{{ Form::textField('Nume vanzator','nume_vanzator') }}
										</div>
										<div class="col-md-3">
											{{ Form::textField('Telefon De Contact Principal','telefon_principal') }}
										</div>
										<div class="col-md-3">
											{{ Form::textField('Telefon De Contact Secundar 1','telefon_1') }}
										</div>
										<div class="col-md-3">
											{{ Form::textField('Telefon De Contact Secundar 2','telefon_2') }}
										</div>
										<div class="col-md-3">
											<div class="margin-bottom-20">
												<label for="option1">Extras C.F.</label><br />
												<input type="checkbox" class="make-switch switch-large" data-label-icon="fa fa-fullscreen" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" name="extras_cf" > 
											</div>
										</div>
										<div class="col-md-12">
											{{ Form::textareaField('Observatii Generale','observatii_generale') }}
										</div>
									</div>
									
									<div class="form-actions right">
										<button type="button" class="btn default">Anuleaza</button>
										<button type="submit" class="btn blue"><i class="fa fa-check"></i>Salveaza</button>
									</div>
								</div>
							{{ Form::close() }}
							<!-- END FORM-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-scripts')
{{ HTML::script('js/jquery/add_imobil.js') }}
{{ HTML::style('assets/global/plugins/clockface/css/clockface.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}


{{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
{{ HTML::script('assets/global/plugins/clockface/js/clockface.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}


{{ HTML::script('./assets/admin/pages/scripts/components-pickers.js') }}

<script>
	jQuery(document).ready(function() {       
       ComponentsPickers.init();
    });  
</script>

@endsection