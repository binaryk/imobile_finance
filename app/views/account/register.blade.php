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
	<!-- BEGIN REGISTRATION FORM -->
	{{ Form::open(['route' => 'registration.store' , 'class' => 'register-form', 'id' => 'reg_form']) }}
    <fieldset>
    	@if (Session::has('flash_message'))
			<div class="form-group">
				<p>{{ Session::get('flash_message') }}</p>
			</div>
		@endif
		<h3>Inregistreaza utilizator nou</h3>
		<p class="hint">
			 Introdu datele personale mai jos:
		</p>
		<!-- First name field -->
		<div class="form-group">
			{{ Form::text('prenume', null, ['placeholder' => 'Prenume', 'class' => 'form-control'])}}
			{{ errors_for('prenume', $errors) }}
		</div>

		<!-- Last name field -->
		<div class="form-group">
			{{ Form::text('nume', null, ['placeholder' => 'Nume', 'class' => 'form-control'])}}
			{{ errors_for('nume', $errors) }}
		</div>

	  	<!-- Email field -->
		<div class="form-group">
			{{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control'])}}
			{{ errors_for('email', $errors) }}
		</div>

		<!-- Password field -->
		<div class="form-group">
			{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'register_password'])}}
			{{ errors_for('password', $errors) }}
		</div>

		<!-- Password Confirmation field -->
		<div class="form-group">
			{{ Form::password('password_confirmation', ['placeholder' => 'Password Confirm', 'class' => 'form-control','id' => 'password_confirmation'])}}

		</div>
		<!-- Submit field -->
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default"><a href="{{URL::to('login')}}">Inapoi</a></button>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Salveaza</button>
		</div>

	</fieldset>
  	{{ Form::close() }}
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
jQuery('.register-form').show();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>