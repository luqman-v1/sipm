<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="shortcut icon" href="{{ asset('uploads\logo\favicon.ico') }}" >
	 <!-- Bootstrap Core CSS -->
    <link rel="stylesheet"  type="text/css" href="{{url('asset/home/css/bootstrap.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet"  type="text/css" href="{{url('asset/home/css/modern-business.css')}}">
    <link rel="stylesheet"  type="text/css" href="{{url('asset/home/css/scrolling-nav.css')}}">
    <link rel="stylesheet"  type="text/css" href="{{url('asset/home/css/custome.css')}}">

    <!-- Custom Fonts -->
    <link rel="stylesheet"  type="text/css" href="{{url('asset/home/font-awesome/css/font-awesome.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-hijacking="off" data-animation="none">
	
<!-- @include("layouts.header") -->
@yield("content")

	<!-- jQuery -->
    <script type="text/javascript" src="{{url('asset/home/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{url('asset/home/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('asset/home/js/scrolling-nav.js')}}"></script>
    <script type="text/javascript" src="{{url('asset/home/js/jquery.easing.min.js')}}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
						 
@yield("extensions")
<!-- @include("layouts.footer")
 -->
</body>
</html>