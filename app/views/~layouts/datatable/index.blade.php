@extends('template.layout')

@section('content')
@yield('before-table-row')		
<div class="row">
	<div class="col-xs-12"> 
		<div class="box box-solid box-default box-dt" id="box-{{$dt->id()}}"> 
			<div class="box-body">

				<!-- toolbar -->
				@if( ! empty($toolbar) )

				<div class="dt-toolbar-container">
					<div class="row">
						<div class="col-xs-12">{{$toolbar}}</div>
					</div>
				</div>
				@endif <!-- /toolbar -->
				
				<!-- Message -->
				<div id="dt-action-message"></div>
				<!-- /Message -->
 
				<!-- Insert/Update/Delete Form -->
				@if($form) 
				<div class="dt-form-container portlet box blue" id="form-{{$dt->id()}}">
					<div class="portlet-title">
						<div class="caption">
							<h4 id="action-title" class="box-title">-</h4>   
						</div>
						<div class="tools">
							<button class="btn btn-sm btn-close-form" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="portlet-body form">
						<div class="form-body">
							{{$form->showForm()}}
						</div>
					</div> 
					<div class="form-actions">
                                <button class="btn-do-action btn blue m-icon ">
                                    Salveaza
                                </button>
					</div>
				</div>
				@endif
				<!-- Form --> 
				@yield('before-datatable')
				<!-- datatable -->
				{{ $dt->table() }}
				<!-- /datatable -->

				@yield('datatable-summary')
			</div>
		</div>
	</div>
</div>
@stop

@section('custom-styles')
	{{ $dt->styles() }}
@stop

@section('custom-scripts')
	{{ $dt->scripts() }}

	<script>
	$(document).ready(function(){
		{{ $dt->init() }}
 

		@if($form)
		var form = new DTFORM("#form-{{$dt->id()}}", "{{URL::route('datatable-load-form', ['id' => $dt->id()])}}", '{{$form->model()}}', "{{URL::route('datatable-do-action', ['id' => $dt->id()])}}", eval('{{$dt->name()}}'));
		@endif

		// REFRESH TE DATATABLE
		$('.btn-dt-refresh').on('click', function(event){

			var name = $(this).data('dt-name');
			var t = eval(name);
			console.log('Refresh occurred at: ' + new Date().toString() );

			t.page(3).draw( false );
			// console.log(name);
			// console.log(eval(name));
			// console.log(dt);
		});
		

		// var t = eval('{{$dt->name()}}');
		// Current order
		// console.log(t.order()); 

		
		@yield('datatable-specific-page-jquery-initializations')
	});

	</script>
@stop