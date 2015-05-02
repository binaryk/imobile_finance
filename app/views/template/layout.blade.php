<!DOCTYPE html> 
<html lang="en" class="no-js"> 
@include('template.parts.~head')
<body class="page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo page-header-fixed-mobile page-footer-fixed1">

    @include('template.parts.body.~header')
    @include('template.parts.body.~page')
    @include('template.parts.body.~pre-footer')
    @include('template.parts.body.~footer')
    @include('template.parts.body.~include-js') 
        
    @yield('custom-scripts')
</body>
</html>


