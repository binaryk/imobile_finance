@section('content')
@yield('before-table-row')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-solid box-default box-dt" id="box-{{$dt->id()}}">
			@if( $dt->caption() )
				<div class="box-header">
					@if($dt->icon())
						{{HTML::image($dt->icon())}}
					@endif
					<h3 class="box-title">{{$dt->caption()}}</h3>
					<i class="fa fa-refresh btn-dt-refresh pull-right" data-dt-name="{{$dt->name()}}"></i>
		        </div><!-- /.box-header -->
			@endif
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
				<div class="dt-form-container" id="form-{{$dt->id()}}">
					<div class="row">
						<div class="col-xs-12">
							<div class="box box-solid box-default">
								<div class="box-header"><h3 id="action-title" class="box-title">-</h3>
									<div class="box-tools pull-right">
                    					<button class="btn btn-sm btn-close-form" data-widget="remove"><i class="fa fa-times"></i></button>
                  					</div>
								</div>
								<div class="box-body">{{$form->showForm()}}</div>
								<div class="box-footer">
									<button data-action="" class="btn btn-primary btn-do-action">Primary</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<!-- Form -->

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

		@if($dt->id() == 'operatiuni')
			var operatiuni = new OPERATIUNI("{{URL::route('update-record')}}");
		@endif

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