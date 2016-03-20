<div class="page-header -i navbar navbar-fixed-top">
	<div class="page-header-inner">
		<div class="page-logo">
			<a href="{{URL::route('home')}}">
			{{HTML::image("assets/admin/layout/img/logo_creditfin.png",null, ['width' => '235px', 'height' => '47px', 'style' => 'margin-top: -1px; margin-left: -20px;']) }}
			</a>
			<div class="menu-toggler sidebar-toggler hide"></div>
		</div>
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				@include('template.parts.body.~user-login')
			</ul>
		</div>
	</div>
</div>
<div class="clearfix"></div>