<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="shortcut icon" href="{{ asset('uploads\logo\favicon.ico') }}" >
	<link rel="stylesheet" type="text/css" href="{{url('asset/css/bootstrap.min.css')}}">
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="{{url('asset/css/style.css')}}">
	   <link rel="stylesheet"  type="text/css" href="{{url('asset/home/css/custome.css')}}">
</head>
<body background="background.jpg">

@include("layouts.header")
@yield("content")


						 
	<script type="text/javascript" src="{{url('asset/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('asset/js/bootstrap.min.js')}}"></script>
@yield("extensions")
@include("layouts.footer")

</body>
</html>