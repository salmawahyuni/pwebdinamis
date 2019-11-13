<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
      <title>Data Blog</title>
      
      @include('template.head')
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.sidebar-left')
  
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hello World</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <h3>Halaman Data Blog</h3>  
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th><center>Nama</center></th>
                      <th style ="width : 25%" colspan = "3"><center>Aksi</center></th>
                    </tr>
                    @foreach ($varAngka as $isinya)
                    <tr>
                      <td><center>{{$isinya}}</center></td>
                      <td><center>
                        <a href="{{$isinya}}">
                          <i class="fas fa-glasses indigo">Lihat</i></a>
                          |
                        <a href="{{$isinya}}">
                          <i class="fas fa-edit green">Edit</i></a>  
                          |
                        <a href="{{$isinya}}">
                          <i class="fas fa-trash-alt red">Hapus</i></a>
                        </a>
                      </center></td>
                    </tr>
                    @endforeach
                  </thead>
                </table>
              </div>
            
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  @include('template.footer')
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
@include('template.script')
</body>
 
</html>