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
				<form action="#" class="horizontal-form">
					<div class="form-body">
						<h3 class="form-section">Date generale</h3>
						<div class="row">
							<div class="col-md-3">
								{{ Form::textField('Judet','judet') }}
							</div>
							<!--/span-->
							<div class="col-md-3">
								{{ Form::textField('Judet','judet') }}
							</div>
							<!--/span-->
						</div>
						<!--/row-->
					</div>
					<div class="form-actions right">
						<button type="button" class="btn default">Anuleaza</button>
						<button type="submit" class="btn blue"><i class="fa fa-check"></i>Salveaza</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>


@endsection