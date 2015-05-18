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
	<!-- BEGIN RESET PASSWORD FORM -->
  	<div class="panel-heading">
    	<h3 class="panel-title">Reseteaza parola</h3>
 	</div>
  	<div class="panel-body">
    	{{ Form::open(['action' => 'RemindersController@postReset', 'class' => 'login-form', 'id' => 'reset-form']) }}
        <fieldset>

        	@if (Session::has('flash_message'))
				<p style="padding:5px" class="bg-success text-success">{{ Session::get('flash_message') }}</p>
			@endif

			@if (Session::has('error_message'))
				<p style="padding:5px" class="bg-danger text-danger">{{ Session::get('error_message') }}</p>
			@endif

    	  	<!-- Email field -->
			<div class="form-group">
				{{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control'])}}
				{{ errors_for('email', $errors) }}
			</div>

    		<!-- Password field -->
			<div class="form-group">
				{{ Form::password('password', ['placeholder' => 'Parola','class' => 'form-control','id' => 'forgot_password'])}}
				{{ errors_for('password', $errors) }}
			</div>

			<!-- Password confirmation field -->
			<div class="form-group">
				{{ Form::password('password_confirmation', ['placeholder' => 'Confirma parola','class' => 'form-control'])}}
				{{ errors_for('password', $errors) }}
			</div>

			<!-- Hidden Token field -->
			{{ Form::hidden('token', $token )}}
			{{ errors_for('email', $errors) }}



    		<!-- Submit field -->
			<div class="form-group">
				{{ Form::submit('Reseteaza Parola', ['class' => 'btn btn btn-lg btn-primary btn-block']) }}
			</div>
    	</fieldset>
      	{{ Form::close() }}
    </div>
		@if(Session::has('error'))
		    <div class="alert-box success">
		        <h2>{{ Session::get('error') }}</h2>
		    </div>
		@endif
	<!-- END RESET PASSWORD FORM -->
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
{{ HTML::script("assets/admin/pages/scripts/reset.js") }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() { 


Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Reset.init();
Demo.init(); 
$('.forget-form').show();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 

	