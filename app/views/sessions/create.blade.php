<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login/Register</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{{ HTML::style("assets/global/plugins/font-awesome/css/font-awesome.min.css") }}
{{ HTML::style("assets/global/plugins/simple-line-icons/simple-line-icons.min.css") }}
{{ HTML::style("assets/global/plugins/bootstrap/css/bootstrap.min.css") }}
{{ HTML::style("assets/global/plugins/uniform/css/uniform.default.css") }} 
{{ HTML::style("assets/admin/pages/css/login.css") }} 
{{ HTML::style("assets/global/css/components.css") }}
{{ HTML::style("assets/global/css/plugins.css") }}
{{ HTML::style("assets/admin/layout/css/layout.css") }}
{{ HTML::style("assets/admin/layout/css/themes/darkblue.css") }}
{{ HTML::style("assets/admin/layout/css/custom.css") }}
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="login">
<div class="menu-toggler sidebar-toggler">
</div>
<div class="logo">
	<a href="index.html">
	{{ HTML::image("assets/admin/layout/img/logo-big.png") }}
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="{{ URL::route('login') }}" method="post">
		<h3 class="form-title">Intra in cont</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Introdu email-ul si parola. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Parola</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Parola" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Intra</button>
		</div> 
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Creaza un cont nou.</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
		{{ Form::open(['route' => 'sessions.store', 'class' => 'register-form']) }}
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Nume</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Nume" name="nume"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Prenume</label>
			<input class="form-control placeholder-no-fix" type="text" placeholder="Prenume" name="prenume"/>
		</div>  
		<p class="hint">
			Introdu datele despre cont mai jos:
		</p>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Parola</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Parola" name="password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Reintroduceti parola</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Reintroduceti parola" name="password_confirmation"/>
		</div> 
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Inapoi</button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Salveaza</button>
		</div>
	{{Form::close()}}
	<div id="successMessage"></div>
	<!-- END REGISTRATION FORM -->
</div>
<div class="copyright">
	 2015 © Imobiliare.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{ HTML::script("assets/global/plugins/respond.min.js") }}
{{ HTML::script("assets/global/plugins/excanvas.min.js") }}
<![endif]-->
{{ HTML::script("assets/global/plugins/jquery.min.js") }}
{{ HTML::script("assets/global/plugins/jquery-migrate.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") }}
{{ HTML::script("assets/global/plugins/jquery.blockui.min.js") }}
{{ HTML::script("assets/global/plugins/jquery.cokie.min.js") }}
{{ HTML::script("assets/global/plugins/uniform/jquery.uniform.min.js") }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script("assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script("assets/global/scripts/metronic.js") }}
{{ HTML::script("assets/admin/layout/scripts/layout.js") }}
{{ HTML::script("assets/admin/layout/scripts/demo.js") }}
{{ HTML::script("assets/admin/pages/scripts/login.js") }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() { 

	 



Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>