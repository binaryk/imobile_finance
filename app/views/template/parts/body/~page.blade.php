<!-- BEGIN CONTAINER -->


<div class="page-container">

	<!-- BEGIN SIDEBAR -->
	@include('template.parts.body.~sidebar')
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			@include('template.parts.body.~page-header')
			@yield('content')
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	@include('template.parts.body.~quick-sidebar')
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->

