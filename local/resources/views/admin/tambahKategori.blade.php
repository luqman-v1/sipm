@extends('layouts.admin')
<title>Tambah Kategori</title>
@section('content')
@if (Auth::guest())
  <div class="section">
        <div class="wrapper">
            <div class="panel panel-default">
              <div class="panel-heading turqoise"></div>
                    @if(Session::has('status'))
                       <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
              <div class="panel-body">
                 <center><h2>Halaman yang diminta tidak bisa ditampilkan</h2></center>
            </div>  
            </div>      
        </div>
    </div>

  @else

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <li>
                            <a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/panel') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Pelaporan</a>
                        </li>
                        <li>
                            <a href="{{ url('/cekkategori') }}"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span></i> Kategori</a>
                          <!-- /.nav-second-level -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/formKategori') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Kategori<span class="fa arrow"></span></a>
                                </li>
                                
                            </ul>
                          
                        </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    </br>
                <ol class="breadcrumb">
                    <li><i class="glyphicon glyphicon-user"></i> Admin
                    </li> 
                    <li class="active"><i class="glyphicon glyphicon-plus"></i> Tambah Kategori</li>
                </ol>
                </div>
            </div>
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-folder-open"></i>&nbsp Tambah Kategori
                            <div class="pull-right">
                               
                            </div>
                        </div>
                        <!-- pesan -->
                        <div class="panel-body">
                             @if(Session::has('message'))
                       <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- error validasi -->
                     @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

                <div class="panel-body">
                 <div class="row">
        <div class="col-md-12">
        </div>
                </div>

                <form action="{{route('tambahKategori')}}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
              <input required type="text" name="kategori" value="{{old('kategori')}}" class="form-control" placeholder="Nama Kategori">
            </div>
            <div class="form-group">
              <input type="file" name="image" >
            </div>
            <div class="form-group">
              <input type="Submit" class="btn btn-success " value="Simpan" >
            </div>
          </div>
          </form>
                        <!-- /.panel-body -->
                    </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@endif
@endsection
