@extends('template.layout') 
@section('content')
<br>
<div class="row">
	<div class="col-md-6">
		<div class="btn-group">
			<a id="sample_editable_1_new" class="btn green" href="{{URL::route('imobile-add')}}">
			Adauga<i class="fa fa-plus"></i>
			</a>
		</div>
	</div>
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-globe"></i>Lista imobile
				</div>
				<div class="tools">
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
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
						<th>
							Actions
						</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
							 <td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection
@section('custom-scripts')
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

<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout 
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   TableAdvanced.init();
});
</script>
@endsection