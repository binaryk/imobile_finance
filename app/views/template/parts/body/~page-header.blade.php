<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
	@yield('title') {{ @$caption }}	<small> @yield('small') {{ @$small_title }} </small>
</h3>
<div class="page-bar"> 
	@include('template.parts.body.~page-breadcrumb')
	<div class="page-toolbar">
		<div class="btn-group pull-right">
			@include('template.parts.body.~page-right-menu')
		</div>
	</div>
</div>
<!-- END PAGE HEADER-->

