<!DOCTYPE html>
<html>
<head>
 <link rel="shortcut icon" href="{{ asset('uploads\logo\favicon.ico') }}" >
	<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Selamat Datang di Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"></a></li>
                        <li><a href="{{ url('/register') }}"></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Hi, {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Keluar</a></li>
                            </ul>
                        </li>
                    @endif
            </ul>
            <!-- /.navbar-top-links -->

	    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('asset/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('asset/admin/bower_components/metisMenu/dist/metisMenu.min.css')}}">

    <!-- Timeline CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('asset/admin/dist/css/timeline.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('asset/admin/dist/css/sb-admin-2.css')}}">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('asset/admin/bower_components/morrisjs/morris.css')}}">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{url('asset/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">

</head>
<body>
	
<!-- @include("layouts.header") -->
@yield("content")

	
	<!-- jQuery -->
    <script type="text/javascript" src="{{url('asset/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{url('asset/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="{{url('asset/admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script type="text/javascript" src="{{url('asset/admin/bower_components/raphael/raphael-min.js')}}"></script>
    <script type="text/javascript" src="{{url('asset/admin/bower_components/morrisjs/morris.min.js')}}"></script>
    <script type="text/javascript" src="{{url('asset/admin/js/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="{{url('asset/admin/dist/js/sb-admin-2.js')}}"></script>
   
 

						 
@yield("extensions")
<!-- @include("layouts.footer") -->

</body>
</html>