@extends('layouts.admin')
<title>Admin Panel</title>
@section('content')

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <li>
                            <a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/panel') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Pelaporan<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{ url('/cekkategori') }}"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span></i> Kategori</a>
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
                    <li class="active"><i class="glyphicon glyphicon-book"></i> Pelaporan</li>
                </ol>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pelaporan Terbaru
                            <div class="pull-right">
                                  <a href="{{ url('/tambah') }}" class="pull-right btn btn-info" style="margin-top:-7px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Laporan</a>
                                
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
                    @foreach($articles as $artikel) 
                <div class="row newsfeed">
                    <div class="col-md-3"> <img src="{{'uploads/'.$artikel->pict}}" style="width:125px;height:100px;"> </div>
                    <div class="col-md-9 content">
                    
                        <label>Nama Pelapor : </label> <a href="detail/{{$artikel->id}}">{{$artikel->nama}}</a> </br>
                        <label>Kategori :</label> {{App\Category::find($artikel->id_category)->category}}</label></br>
                        <label>Alamat : </label> {{$artikel->alamat}}</label></br>
                        <label>Deskripsi :</label><p>{{$artikel->deskripsi}}</p>
                        <ol class="breadcrumb">
                         <a href="{{ url('/edit') }}/{{$artikel->id}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah</a> /
                        <a href="{{ url('/hapus') }}/{{$artikel->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
                         </ol>
                                                
                      </br></br>
                        </div>
                        </div>
                    @endforeach
                <center>{{$articles->links()}}</center>
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


@endsection
