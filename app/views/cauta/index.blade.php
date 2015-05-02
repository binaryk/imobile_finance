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
						<div class="form-group">
							<label class="control-label col-md-3">Valabilitatea Ofertei</label>
							<div class="col-md-9">
								<input type="checkbox" class="make-switch" name="valabilitate_oferta" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>" ng-model = 'valabilitate_oferta' ng-change="show()"> 
							</div>
						</div>
						<div class="form-group"> 
							<label class="control-label col-md-3">Denumire Cartier</label>
							<div class="col-md-4"> 
								<select class="form-control input-xlarge select2me" data-placeholder="Select...">
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
								<input type="text" class="form-control input-circle" placeholder="Enter text" name="strada_cladire">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Numar camere</label>
							<div class="col-md-4">
								<select class="form-control input-xlarge select2me" data-placeholder="Select...">
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
{{ HTML::script("js/angular/angular.js") }}
{{ HTML::script("js/angular/app.js") }}
{{ HTML::script("js/angular/cautare/cauta.js") }} 
{{ HTML::script("assets/admin/pages/scripts/components-dropdowns.js") }} 
	<script type="text/javascript">

	</script>
@endsection