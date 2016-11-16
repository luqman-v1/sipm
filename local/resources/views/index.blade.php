@extends("layouts.home")
<title>Selamat Datang di Pelaporan Masyarakat Sleman</title>
@section("content")
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             <a href="{{ url('/') }}" id="logo" class="navbar-brand"> </a>
				
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                 <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                        <li>
                        <a class="page-scroll" href="#laporan">Laporan</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Kontak</a>
                    </li>
                  <li>
                        <a class="page-scroll" href="{{ url('/maps') }}">Maps</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="fill" src="{{url('uploads/header/header1.jpg')}}">
                <div class="carousel-caption">
                    <h2>Selamat Datang di Website Pelaporan Masyarakat</h2>
                </div>
            </div>
            <div class="item">
                <img class="fill" src="{{url('uploads/header/header4.jpg')}}">
                <div class="carousel-caption">
                    <h2>Kami Siap Melayani Masyarakat</h2>
                </div>
            </div>
            <div class="item">
               <img class="fill" src="{{url('uploads/header/header2.jpg')}}">
                <div class="carousel-caption">
                    <h2>Laporkan Kejadian Disekitar Anda</h2>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

      <section id="laporan" class="laporan-section">
         <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    &nbsp
                    <a href="{{ url('/tambah') }}" class="pull-right btn btn-info" style="margin-top:2px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Laporan</a>
                </h1>
            </div>



             @foreach($articles as $artikel) 
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading turqoise judul">
                      <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp Laporan {{$artikel->id}}
                    </div>
                      <figure><div id="imgc"><img src="{{url('uploads/'.$artikel->pict)}}"></div></figure>
                    <div class="panel-body">
                    <hr>
                        <label>Nama Pelapor </label>: {{$artikel->nama}}</br>
                        <label>Kategori </label> : {{App\Category::find($artikel->id_category)->category}}</br>
                        <label>Alamat</label> : {{$artikel->alamat}}</br>
                        <label>Deskripsi :</label><p>{{$value = str_limit($artikel->deskripsi, 30)}}</p>
                        <a href="detail/{{$artikel->id}}" class="btn btn-default">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
             </div>
             </div>
        </div>
            <center>{{$articles->links()}}</center>
    </section>
    <!-- Page Content -->

             <!-- About Section -->
    <section id="about" class="about-section">
            <!-- tes aja -->

            <div id="event">
    <div class="container">
        <div class="row">
            <div align="center">
                <h3> &nbsp </h3>
            <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7907.337220503928!2d110.35159540120472!3d-7.718660436883762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5fedcc32a6517ded!2sDinas+Perhubungan+Komunikasi+Dan+Informatika+Kabupaten+Sleman!5e0!3m2!1sen!2sid!4v1469179035118"></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Kontak Person</h3>
                <p>
                    Dinas Perhubungan Komunikasi Dan Informatika Kabupaten Sleman
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: (0274) 868772</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">name@example.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Senin - jumat: 9:00 AM to 5:00 PM</p>
            </div>
        </div>
    </div>
</div>
    </section>

        <!--footer-->
       <div id="footer">
    <div class="container">
        <div class="row footer-col">
            <div class="row-sm-height">
                <div class="col-xs-12 col-sm-4 col-sm-height col-sm-middle">
                    <div class="inner-pad-alt" align="center">
                        <div class="col-xs-6">
                            <img class="img-responsive" src="{{url('uploads/logo/logo.png')}}">
                        </div>
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-sm-height col-sm-middle" align="center">
                    <div class="inside">
                        <div class="inner-pad-exc">
                            <p class="footer-par"><strong>Website Pelaporan Masyarakat</strong><br>Dinas Perhubungan Komunikasi Dan Informatika Kabupaten Sleman<br>JL. KRT. Pringgodiningrat No. 70, Beran, Tridadi, Kec. Sleman, Daerah Istimewa Yogyakarta<br>(0274) 868772</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-sm-height col-sm-middle" align="center">
                    <div class="inside">
                        <div class="inner-pad-exc">
                             <div class="inner-pad-alt" align="center">
                        <div class="col-xs-2">
                            <img class="img-responsive" src="{{url('uploads/logo/facebook.png')}}">
                            <img class="img-responsive" src="{{url('uploads/logo/twitter.png')}}">
                            <img class="img-responsive" src="{{url('uploads/logo/gmail.png')}}">
                            <img class="img-responsive" src="{{url('uploads/logo/youtube.png')}}">
                        </div>
                        
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- hak -->

            <div id="copy">
    <div class="row copy-col">
        <div class="col-xs-12" align="center">
            <p class="copy"> © 2016 <strong>Kominfo Sleman</strong></p>
        </div>
    </div>
</div>
@endsection
@section('extensions')
@endsection