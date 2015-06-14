{{ HTML::script("assets/global/plugins/jquery.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }} 

{{ HTML::script("assets/global/scripts/metronic.js") }}
{{ HTML::script("assets/admin/layout/scripts/layout.js") }} 

{{ HTML::script('packages/numeral/numeral.js')}}
{{ HTML::script('packages/numeral/languages/ro.js')}}
{{ HTML::script('packages/moment/moment.js')}}
<script>
	numeral.language('ro');
	numeral.defaultFormat('(0,0.0000)');
	moment.locale('ro');
</script>
@yield('custom-scripts')
<script>
jQuery(document).ready(function() {Metronic.init(); Layout.init();});
</script>


