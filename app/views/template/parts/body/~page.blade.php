<div class="page-container">
	@include('template.parts.body.~sidebar')
	<div class="page-content-wrapper">
		<div class="page-content">
			@include('template.parts.body.~page-header')
			@yield('content')
		</div>
	</div>
	@include('template.parts.body.~quick-sidebar')
</div>