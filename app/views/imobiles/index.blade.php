@extends('template.layout')

@section('content')
	<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<div class="note note-info">
							<p>
								 NOTA: Mai jos aveti imobilele pe care le puteti cauta in functie de anumite filtre.
							</p>
						</div>
						<!-- Begin: life time stats -->
						<div class="portlet">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-shopping-cart"></i>Imobile
								</div>
								<div class="actions">
									<a href="#" class="btn default yellow-stripe">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Inregistrare noua </span>
									</a>
									<div class="btn-group">
										<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
										<i class="fa fa-share"></i>
										<span class="hidden-480">
										Actiuni </span>
										<i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="#">
												Exporta in Excel </a>
											</li>
											<li>
												<a href="#">
												Exporta in CSV </a>
											</li>
											<li>
												<a href="#">
												Exporta in PDF </a>
											</li>
											<li class="divider">
											</li>
											<li>
												<a href="#">
												Print </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-container">
									<div class="table-actions-wrapper">
										<span>
										</span>
										<select class="table-group-action-input form-control input-inline input-small input-sm">
											<option value="">Select...</option>
											<option value="Cancel">Cancel</option>
											<option value="Cancel">Hold</option>
											<option value="Cancel">On Hold</option>
											<option value="Close">Close</option>
										</select>
										<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
									</div>
									<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
									<thead>
									<tr role="row" class="heading">
										<th width="2%">
											<input type="checkbox" class="group-checkable">
										</th>
										<th width="5%">
											 &nbsp;#
										</th>
										<th width="15%">
											 Date
										</th>
										<th width="15%">
											 Apartament
										</th>
										<th width="10%">
											 Proprietar&nbsp;
										</th>
										<th width="10%">
											 Pret
										</th>
										<th width="10%">
											 Suprafata
										</th>
										<th width="10%">
											 Stare
										</th>
										<th width="10%">
											 Actiuni
										</th>
									</tr>
									<tr role="row" class="filter">
										<td>
										</td>
										<td>
											<input type="text" class="form-control form-filter input-sm" name="order_id">
										</td>
										<td>
											<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
												<input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
												<input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</td>
										<td>
											<input type="text" class="form-control form-filter input-sm" name="order_customer_name">
										</td>
										<td>
											<input type="text" class="form-control form-filter input-sm" name="order_ship_to">
										</td>
										<td>
											<div class="margin-bottom-5">
												<input type="text" class="form-control form-filter input-sm" name="order_price_from" placeholder="From"/>
											</div>
											<input type="text" class="form-control form-filter input-sm" name="order_price_to" placeholder="To"/>
										</td>
										<td>
											<div class="margin-bottom-5">
												<input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix" name="order_quantity_from" placeholder="From"/>
											</div>
											<input type="text" class="form-control form-filter input-sm" name="order_quantity_to" placeholder="To"/>
										</td>
										<td>
											<select name="order_status" class="form-control form-filter input-sm">
												<option value="">Select...</option>
												<option value="pending">Pending</option>
												<option value="closed">Closed</option>
												<option value="hold">On Hold</option>
												<option value="fraud">Fraud</option>
											</select>
										</td>
										<td>
											<div class="margin-bottom-5">
												<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
											</div>
											<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
										</td>
									</tr>
									</thead>
									<tbody>
										
									</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- End: life time stats -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
@stop

@section('custom-scripts')
	@parent();
	{{ HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
	{{ HTML::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}
	{{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
	{{ HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
	{{ HTML::script('assets/global/scripts/datatable.js') }}
	{{ HTML::script('assets/admin/pages/scripts/table-ajax.js') }}
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			TableAjax.init();
		});
	</script>
@stop