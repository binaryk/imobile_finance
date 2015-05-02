{{HTML::script('assets/global/plugins/jquery.min.js') }}
{{HTML::script('assets/global/plugins/jquery-migrate.min.js') }}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{HTML::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}
{{HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{HTML::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{HTML::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{HTML::script('assets/global/plugins/jquery.blockui.min.js') }}
{{HTML::script('assets/global/plugins/jquery.cokie.min.js') }}
{{HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}
{{HTML::script('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->

{{HTML::script('assets/global/plugins/jquery.sparkline.min.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{HTML::script('assets/global/scripts/metronic.js') }}
{{HTML::script('assets/admin/layout3/scripts/layout.js') }}
{{HTML::script('assets/admin/layout3/scripts/demo.js') }} 
{{HTML::script('assets/admin/pages/scripts/tasks.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
/*jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo(theme settings page)
   Index.init(); // init index page
   Tasks.initDashboardWidget(); // init tash dashboard widget
});*/
</script>