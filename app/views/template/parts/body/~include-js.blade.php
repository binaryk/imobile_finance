{{ HTML::script("assets/global/plugins/jquery.min.js") }}
{{ HTML::script("assets/global/plugins/jquery-migrate.min.js") }}
{{ HTML::script("assets/global/plugins/jquery-ui/jquery-ui.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") }}
{{ HTML::script("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") }}
{{ HTML::script("assets/global/plugins/jquery.blockui.min.js") }}
{{ HTML::script("assets/global/plugins/jquery.cokie.min.js") }}
{{ HTML::script("assets/global/plugins/uniform/jquery.uniform.min.js") }}
{{ HTML::script("assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") }}
<!-- END CORE PLUGINS -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script("assets/global/scripts/metronic.js") }}
{{ HTML::script("assets/admin/layout/scripts/layout.js") }}
{{ HTML::script("assets/admin/layout/scripts/quick-sidebar.js") }}
{{ HTML::script("assets/admin/layout/scripts/demo.js") }}
{{ HTML::script("assets/admin/pages/scripts/index.js") }}
{{ HTML::script("assets/admin/pages/scripts/tasks.js") }}



<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();

});
</script>