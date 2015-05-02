<!DOCTYPE html> 
<html lang="en" class="no-js"> 
@include('template.parts.~head')
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid" ng-app="app">

    @include('template.parts.body.~header')
    @include('template.parts.body.~page') 
 	@include('template.parts.body.~footer')
    @include('template.parts.body.~include-js') 
        
    @yield('custom-scripts')
</body>
</html>


