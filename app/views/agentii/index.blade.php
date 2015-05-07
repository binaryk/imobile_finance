@extends('template.layout') 
@section('content')
<br>
<div class="row"> 
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Agentii
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1" style="text-align: center;">
				<thead >
				<tr>
					<th style="text-align: center;width: 10%">
						 ID
					</th>
					<th style="text-align: center;">
						 Telefon
					</th>
				</tr>
				</thead>
					<tbody>
						@if(isset($agentii))
							@foreach($agentii as $agentie)
								<tr>
									<td>{{ $agentie->id }}</td>
									<td>{{ $agentie->telefon }}</td>

								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				 Widget settings form goes here
			</div>
			<div class="modal-footer">
				<button type="button" class="btn blue">Save changes</button>
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
@endsection
@section('custom-scripts')
<script>
jQuery(document).ready(function() {    
	setTimeout(function(){
		jQuery('.table-scrollable').removeClass('table-scrollable');
		jQuery('#ToolTables_sample_1_0').remove();
		jQuery('#ToolTables_sample_1_1').remove();
		jQuery('#ToolTables_sample_1_2').remove();
		jQuery('#ToolTables_sample_1_3').remove();
	}, 100);

   jQuery('.delete').on('click', function(){
   		var id = jQuery(this).parent().attr('data-id');
   		var row = jQuery(this).parent().parent();
	   	swal({   
	   		title: "Stergere",   
	   		text: "Sunteti siguri ca vreti sa stergeti imobiliarul dat?",   
	   		type: "warning",   
	   		showCancelButton: true,   
	   		confirmButtonColor: "#DD6B55",   
	   		confirmButtonText: "Da, sterge!",
	   		cancelButtonText: "Anuleaza",
	   		closeOnConfirm: false 
	   	}, 
	   	function(){ 
	   		$.ajax({
		        url: "{{URL::route('imobile-delete')}}",
		        type: "get",
		        data: "id="+id,
		        success: function(data){
		        	console.log(data);
		        	if(data > 0){
		        		swal("Succes", "Imobilul a fost sters cu succes.", "success");
		        		row.remove();
		        	}else{
		        		swal("Eroare", "A intervenit o eroare.", "warning");
		        	}
		        },
		        error:function(){
		        }
		    }); 
	   	});
   	});
   
   Metronic.init(); // init metronic core components
	Layout.init(); // init current layout 
	QuickSidebar.init(); // init quick sidebar
	Demo.init(); // init demo features
   TableAdvanced.init();
   UIAlertDialogApi.init();

});
</script>
{{ HTML::style('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css') }}
{{ HTML::style('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}
{{ HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ HTML::style('sweetalert/dist/sweetalert.css') }}

{{ HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js') }}
{{ HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ HTML::script('assets/global/scripts/metronic.js') }}
{{ HTML::script('assets/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/admin/layout/scripts/demo.js') }}
{{ HTML::script('assets/admin/pages/scripts/table-advanced.js') }}
{{ HTML::script('assets/admin/layout/scripts/quick-sidebar.js') }}
{{ HTML::script('sweetalert/dist/sweetalert.min.js') }}
@endsection