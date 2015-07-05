@section('content')
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6">
			@include('users.profile.general')
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6">
			@include('users.profile.password')
		</div>
	</div>
@stop

@section('custom-styles')
	@parent
@stop

@section('custom-scripts')
	@parent
	{{ HTML::script('admin/js/users/profile.js') }}

	<script>
	var profile = new Profile({
		'profile_save_endpoint' : "{{URL::route('user-profile-save')}}",
		'id_user' : "{{$user->id}}",
	});
	</script>
@stop