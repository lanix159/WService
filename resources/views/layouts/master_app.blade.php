<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontsomewhere.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    
    
    <!--Scripts-->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</head>
<script type="text/javascript">

        $(function(){

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            
            $('.btn-expand-collapse').click(function(e) {
                
                $('.navbar-primary').toggleClass('collapsed');
            });
        
            @yield('script')
            
        });

</script>

<body>
    <div id="app">
    </div>
    @auth
    <nav class="navbar-primary collapsed">
    <a href="#" class="btn-expand-collapse"><span class="glyphicon"><i class="fa fa-expand"></i></span></a>
    <ul class="navbar-primary-menu">
      <li>
        
        <a href="#"><span class="glyphicon"><i class="fa fa-user"></i></span><span class="nav-label">{{ Auth::user()->name }}</span></a>
        
        @if (Auth::user()->rol == 0)
        <a href="#"><span class="glyphicon"><i class="fa fa-list-alt"></i></span><span class="nav-label">Dashboard</span></a> 
        <a href="#"><span class="glyphicon"><i class="fa fa-cog"></i></span><span class="nav-label">Settings</span></a>
        <a href="#"><span class="glyphicon"><i class="fa fa-envelope-o"></i></span><span class="nav-label">Notification</span></a>
        <a href="#"><span class="glyphicon"><i class="fa fa-television"></i></span><span class="nav-label">Monitor</span></a>
        @endif
    
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon"><i class="fa fa-sign-out"></i></span><span class="nav-label">Salir</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </li>
    </ul>
    </nav>
    @endauth
    <div class="main-content">
            @yield('content')
    </div>
   
</body>
</html>
