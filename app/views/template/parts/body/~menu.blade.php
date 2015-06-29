<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	<li class="sidebar-toggler-wrapper">
		<div class="sidebar-toggler">
		</div>
	</li>
	<li class="sidebar-search-wrapper">
		@include('template.parts.body.~search-form')
		{{ Sidebar::make()->out()  }}
	</li>
</ul>