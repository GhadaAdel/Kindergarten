<!doctype html>
<html class="no-js" lang="en">

    @include('includes.head')
	
	<body>

    @include('includes.classes')
    @include('includes.appointments')

    @yield('content')

    @include('includes.footer')
    @include('includes.footerJS')

    
    
</body>

</html>