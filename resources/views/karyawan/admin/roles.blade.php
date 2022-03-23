<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset ('public/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset ('public/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="{{ asset('public/img/Logo GEC.png') }}" rel="shortcut icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('public/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <!-- <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="{{ asset('public/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a> -->
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user-circle"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- <span class="dropdown-item dropdown-header">15 Notifications</span> -->
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #06B8FF;">
            <!-- Brand Logo -->
            <a href="{{ url('/admin/dashboard') }}" class="brand-link" style="border-bottom:1px solid white;">
                <img src="{{ asset('public/img/Logo GEC.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text" style="color: white;">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ url('/admin/peserta_didik') }}" class="nav-link">
                                <i class="nav-icon fas fa-user" style="color:black;"></i>
                                <p class="brand-text" style="color:white;">Peserta Didik</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/admin/pendaftar_baru') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-edit" style="color:black;"></i>
                                <p class="brand-text" style="color:white;">Pendaftar Baru</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/admin/dosen') }}" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher" style="color:black;"></i>
                                <p class="brand-text" style="color:white;">Dosen</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/admin/kalender_perkuliahan') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt" style="color:black;"></i>
                                <p class="brand-text" style="color:white;">Kalender Perkuliahan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/admin/jurusan') }}" class="nav-link">
                                <i class="nav-icon fas fa-book" style="color:black;"></i>
                                <p class="brand-text" style="color:white;">Jurusan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/admin/alumni') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate" style="color:black;"></i>
                                <p class="brand-text" style="color:white;">Alumni</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @if(\Session::has('addRole'))
            @if(\Session::get('addRole')['success'] == false)
                @php
                    $data = \Session::get('addRole')['data'];
                @endphp
                <script>
                    var data    = '<?php echo json_encode($data);  ?>';
                    data        = JSON.parse(data);
                    
                    var pesanError = '';
                    if(data['nama_roles'] != undefined)
                    {
                        pesanError += data['nama_roles'];
                        pesanError += '\r\n';
                    }
                    alert(pesanError);
                </script>
            @else
                @php
                    $data = \Session::get('addRole')['ins_message'];
                @endphp
                <script>
                    var data    = '<?php echo json_encode($data);  ?>';
                    data        = JSON.parse(data);
                    alert(data);
                </script>
            @endif
        @elseif(\Session::has('updRole'))
            @if(\Session::get('updRole')['success'] == false)
                @php
                    $data = \Session::get('updRole')['data'];
                @endphp
                <script>
                    var data    = '<?php echo json_encode($data);  ?>';
                    data        = JSON.parse(data);
                    
                    var pesanError = '';
                    if(data['nama_roles'] != undefined)
                    {
                        pesanError += data['nama_roles'];
                        pesanError += '\r\n';
                    }
                    alert(pesanError);
                </script>
            @else
                @php
                    $data = \Session::get('updRole')['ins_message'];
                @endphp
                <script>
                    var data    = '<?php echo json_encode($data);  ?>';
                    data        = JSON.parse(data);
                    alert(data);
                </script>
            @endif
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Role</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card" style="border:4px solid black;">
                                <div class="card-header" style="border-bottom:3px solid black;">
                                    <h3 style="color:#9C9EA1; font-size: 16pt; font-weight: bold;" class="card-title">Role</h3>
                                    <input class="card-tools btn btn-danger float-sm-right ml-3" type="button" value="Download">
                                    <input class="card-tools btn btn-success float-sm-right" type="button" value="Tambah" data-toggle="modal" data-target="#modal-tambah-role">
                                    <!-- Modal Tambah Jurusan -->
                                    <div class="modal fade" id="modal-tambah-role">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Role</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('admin/role') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Nama Role</label>
                                                            <input type="text" name="nama_roles" id="" class="form-control" placeholder="Admin">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="Submit" class="btn btn-primary">Tambah Role</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                                <div class="card-body  table-responsive" style="text-align:center; background-color: #06B8FF;">
                                    <table id="example1" style="background-color: white;" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $jumlah = 0;                                                
                                            ?>
                                            @if($role['success'] ===  false)
                                                <tr>
                                                    <td colspan="3">Data Role Belum Diinputkan</td>
                                                </tr>
                                            @else
                                                @foreach($role['data'] as $roleData)
                                                    <?php $jumlah += 1; ?>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td style="width: 65%;">{{ $roleData['nama_roles'] }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-role-{{$loop->iteration}}">Edit</button>
                                                            <a style="color:white;" onclick="hapusData(<?php echo $roleData['id'];?>)" class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>                                                    

                                                    <div class="modal fade" id="modal-edit-role-{{$loop->iteration}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Role</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('admin/role/'.$roleData['id']) }}" method="POST">
                                                                    <input name="_method" type="hidden" value="PUT">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="" class="float-sm-left">Role</label>
                                                                            <input type="text" name="nama_roles" id="" class="form-control" placeholder="001" value="{{ $roleData['nama_roles'] }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="Submit" class="btn btn-primary">Ubah Data Jurusan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset ('public/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset ('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset ('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset ('public/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset ('public/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset ('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset ('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset ('public/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset ('public/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset ('public/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset ('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset ('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset ('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/js/demo.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    
    <script>
        var jumlah = '<?php echo $jumlah; ?>';
        for (let index = 1; index <= jumlah; index++) {
            $('#delete' + index + '').on('click', function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();

                var id = $('#kode' + index + '').val();

                // alert(kode);

                $.ajax({
                    type: 'delete',
                    url: 'http://localhost/Pendaftaran%20Online/web/api-glc/admin/role/'+id,
                    data: {
                    },
                    success: function(data) {
                        if(data['message'] == 'success')
                        {
                            alert(data['del_message']);
                            location.reload();
                        }
                        else{
                            alert(data['data']);
                            location.reload();
                        }
                    },
                    error: function(response) {
                        alert('Gagal');
                    }
                });
            });
        }

        function hapusData(id)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: 'http://localhost/Pendaftaran%20Online/web/api-glc/admin/role/'+id,
                data: {
                },
                success: function(data) {
                    if(data['message'] == 'success')
                    {
                        alert(data['del_message']);
                        location.reload();
                    }
                    else{
                        alert(data['data']);
                        location.reload();
                    }
                },
                error: function(response) {
                    alert('Gagal');
                }
            });
        }
    </script>
</body>

</html>