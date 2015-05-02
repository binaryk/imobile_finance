@extends('template.layout')
@section('title-h1')
	Adauga
@endsection
@section('content')

	<div class="tab-pane" id="tab_1">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Formularul de adaugare
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
					{{ Form::model() }}
					<div class="form-body">
						<h3 class="form-section">Date generale</h3>
						<div class="row">
							<div class="col-md-2">
								{{ Form::textField('Denumire Judet','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::selectField('Denumire Localitate','localitate_id', $localitati) }}
							</div>

							<div class="col-md-2">
								{{ Form::textField('Denumire Cartier','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Numar De Camere','judet') }}
							</div>

							<div class="col-md-2">
								{{ Form::textField('Strada Cladire','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Numar Cladire','judet') }}
							</div>
						</div>	
						<div class="row">
							<div class="col-md-2">
								{{ Form::textField('Tip Cladire','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Numar Apartament','judet') }}
							</div>

							<div class="col-md-2">
								{{ Form::textField('Numar Etaje Cladire','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Pret De Vanzare In Euro','judet') }}
							</div>

							<div class="col-md-2">
								{{ Form::textField('Pret Negociabil','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Pret Negociabil','judet') }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								{{ Form::textField('Data Aparitiei Anuntului','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Data Ultimei Actualizari','judet') }}
							</div>

							<div class="col-md-2">
								{{ Form::textField('Valabilitatea Ofertei','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Dezvoltator Imobiliar','judet') }}
							</div>

							<div class="col-md-2">
								{{ Form::textField('Pret Negociabil','judet') }}
							</div>
							<div class="col-md-2">
								{{ Form::textField('Pret Negociabil','judet') }}
							</div>
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						<button type="button" class="btn default">Anuleaza</button>
						<button type="submit" class="btn blue"><i class="fa fa-check"></i>Salveaza</button>
					</div>
					{{ Form::close() }}
				<!-- END FORM-->
			</div>
		</div>
	</div>


@endsection