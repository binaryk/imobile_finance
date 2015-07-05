<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
	<li class="sidebar-toggler-wrapper"><div class="sidebar-toggler"></div></li>
	<li class="sidebar-search-wrapper">@include('template.parts.body.~search-form')</li>
	{{ Sidebar::make()->out()  }}


	<li class="start">
		<a href="javascript:;"><i class="icon-user"></i>
			<span class="title">Utilizatori</span>
			<span class="arrow"></span>
		</a>
		<ul class="sub-menu">
			<li>
				<a href="{{ URL::route('grid-utilizatori') }}"><i class="icon-users"></i>Lista utilizatori</a>
			</li>
		</ul>
	</li>

</ul>