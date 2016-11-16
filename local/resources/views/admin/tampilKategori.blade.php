@extends('layouts.admin')
<title>Daftar Kategori</title>
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
                            <a href="{{ url('/cekkategori') }}"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span></i> Kategori<span class="fa arrow"></span></a>
                          <!-- /.nav-second-level -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/formKategori') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Kategori</a>
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
                    <li class="active"><i class="glyphicon glyphicon-tag"></i> Kategori</li>
                </ol>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-folder-open"></i>&nbsp Kategori
                            <div class="pull-right">
                               
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             @if(Session::has('status'))
                       <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                    
                 
                   
                <div class="panel-body">
                 
                    @foreach($kate as $kategori) 
                <div class="row newsfeed">
                
                    <div class="col-md-3"> <img src="{{'uploads/'.$kategori->img}}" style="width:125px;height:100px;"> </div>
                    <div class="col-md-9 content">
                    
                        <h5>{{$kategori->category}}</h5>
                             <ol class="breadcrumb">
                       <a href="{{ url('/editCat') }}/{{$kategori->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah</a> 
                       <!--  <a href="{{ url('/hapusCat') }}/{{$kategori->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a> -->
                         </ol>
                             
                     
                        </div>
                        </div>
                         </br></br>
                    @endforeach
                        </div>
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
