<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.6.3
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Login Options - Lock Screen 2</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{{ HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}
{{ HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}
{{ HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}
{{ HTML::style('assets/global/plugins/uniform/css/uniform.default.css') }}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{{ HTML::style('assets/admin/pages/css/lock2.css') }}
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
{{ HTML::style('assets/global/css/components.css') }}
{{ HTML::style('assets/global/css/plugins.css') }}
{{ HTML::style('assets/admin/layout/css/layout.css') }}
{{ HTML::style('assets/admin/layout/css/themes/darkblue.css') }}
{{ HTML::style('assets/admin/layout/css/custom.css') }}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
			{{HTML::image("assets/admin/layout/img/logo_creditfin.png",null, ['width' => '197px', 'height' => '46px', 'style' => 'margin-top: 8px']) }}
		</a>
	</div>
	<div class="page-body">
		{{ HTML::image('assets/admin/pages/media/profile/ionela.jpg', null, ['class' => 'page-lock-img'] ) }}
		<div class="page-lock-info">
			<h1>{{ $user->nume }}</h1>
			<span class="email">
			{{ $user->email }} 
			<span class="locked">
			Locked </span>
			<form class="form-inline">
				<div class="input-group input-medium">
					<input type="text" class="form-control" placeholder="Password">
					<span class="input-group-btn">
					<a type="button" class="btn blue icn-only" href="{{URL::route('home')}}"><i class="m-icon-swapright m-icon-white"></i></a>
					</span>
				</div>
				<!-- /input-group -->
				<div class="relogin">
					<a href="{{URL::to('logout')}}">
					Logout </a>
				</div>
			</form>
		</div>
	</div>
	<div class="page-footer-custom">
		 2015 &copy; CreditFin.
	</div>
</div> 
{{ HTML::script('assets/global/plugins/jquery.min.js' ) }}
{{ HTML::script('assets/global/plugins/jquery-migrate.min.js' ) }}
{{ HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js' ) }}
{{ HTML::script('assets/global/plugins/jquery.blockui.min.js' ) }}
{{ HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js' ) }}
{{ HTML::script('assets/global/plugins/jquery.cokie.min.js' ) }} 
{{ HTML::script('assets/global/plugins/backstretch/jquery.backstretch.min.js' ) }}
{{ HTML::script('assets/global/scripts/metronic.js' ) }}
{{ HTML::script('assets/admin/layout/scripts/layout.js' ) }}
{{ HTML::script('assets/admin/layout/scripts/demo.js' ) }}
<script type="text/javascript"> 
 
jQuery(document).ready(function() {    
    Metronic.init(); // init metronic core components
	Layout.init(); // init current layout 
    Demo.init();
	$.backstretch([
	'assets/admin/pages/media/bg/1.jpg' ,
	'assets/admin/pages/media/bg/2.jpg' ,
	'assets/admin/pages/media/bg/3.jpg' ,
	'assets/admin/pages/media/bg/4.jpg'	
	], 
	{
  fade: 1000,
  duration: 8000
});
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>