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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if(\Session::has('addMataKuliah'))
                @if(\Session::get('addMataKuliah')['message'] == 'failed')
                    @php
                        $data = \Session::get('addMataKuliah')['data'];
                    @endphp
                    <script>
                        var data    = '<?php echo json_encode($data);  ?>';
                        data        = JSON.parse(data);
                        
                        var pesanError = '';
                        if(data['matakuliah'] != undefined)
                        {
                            pesanError += data['matakuliah'];
                            pesanError += '\r\n';
                        }
                        if(data['semester'] != undefined)
                        {
                            pesanError += data['semester'];
                            pesanError += '\r\n';
                        }        
                        if(data['id_jurusans'] != undefined)
                        {
                            pesanError += data['id_jurusans'];
                            pesanError += '\r\n';
                        }
                        if(data['hari'] != undefined)
                        {
                            pesanError += data['hari'];
                            pesanError += '\r\n';
                        }
                        if(data['jam_mulai'] != undefined)
                        {
                            pesanError += data['jam_mulai'];
                            pesanError += '\r\n';
                        }
                        if(data['jam_selesai'] != undefined)
                        {
                            pesanError += data['jam_selesai'];
                            pesanError += '\r\n';
                        }

                        if(
                            data['matakuliah']     == undefined &&     
                            data['semester']       == undefined &&     
                            data['id_jurusans']    == undefined &&     
                            data['hari']           == undefined && 
                            data['jam_mulai']      == undefined &&     
                            data['jam_selesai']    == undefined   
                        )
                        {
                            pesanError += data;
                        }
                        
                        // if(data['id'] !== null )
                        // {
                        //     pesanError += data['id'];
                        // }
                        
                        // if(data['jurusan'] !== null && pesanError !== ''){
                        // }
                        alert(pesanError);
                    </script>
                @else
                    @php
                        $data = \Session::get('addMataKuliah')['ins_message'];
                    @endphp
                    <script>
                        var data    = '<?php echo json_encode($data);  ?>';
                        data        = JSON.parse(data);
                        alert(data);
                    </script>
                @endif
            <script>
            </script>
            @else

            @endif
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card" style="border:4px solid black;">
                                <div class="card-header" style="border-bottom:3px solid black;">
                                    <h3 style="color:#9C9EA1; font-size: 16pt; font-weight: bold;" class="card-title">Mata Kuliah</h3>
                                    <input class="card-tools btn btn-danger float-sm-right ml-3" type="button" value="Download">
                                    <input class="card-tools btn btn-success float-sm-right" type="button" value="Tambah" data-toggle="modal" data-target="#modal-tambah-jurusan">
                                    <!-- Modal Tambah Jurusan -->
                                    <div class="modal fade" id="modal-tambah-jurusan">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tambah Jurusan</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ url('admin/mata-kuliahs') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Matakuliah</label>
                                                            <input type="text" name="matakuliah" class="form-control" placeholder="Bahasa Inggris" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Jurusan</label>
                                                            @if($jurusan['data'] === false)
                                                                <a href="{{ url('admin/jurusan') }}" class="form-control btn btn-success">Tambah Jurusan</a>
                                                            @else
                                                            <select name="id_jurusans" class="form-control" required>
                                                                @foreach($jurusan['data'] as $value)
                                                                <option value="{{ $value['id'] }}">{{ $value['jurusan'] }}</option>
                                                                @endforeach
                                                            </select>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Semester</label>
                                                            <input type="number" name="semester" class="form-control" placeholder="1" required>
                                                        </div>
                                                        <div id="jadwal">
                                                            <input type="hidden" id="jumlah_jadwal" name="jumlah_jadwal" value="1">
                                                            <div class="row" id="row_1">
                                                                @php
                                                                    {{ $nomor = 1;}}
                                                                @endphp
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">Hari</label>
                                                                        <select name="hari[]" class="form-control" required>
                                                                            <option value="Senin">Senin</option>
                                                                            <option value="Selasa">Selasa</option>
                                                                            <option value="Rabu">Rabu</option>
                                                                            <option value="Kamis">Kamis</option>
                                                                            <option value="Jumat">Jumat</option>
                                                                            <option value="Sabtu">Sabtu</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">Jam Mulai</label>
                                                                        <input type="time" name="jam_mulai[]" id="" class="form-control" value="00:00" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">Jam Selesai</label>
                                                                        <input type="time" name="jam_selesai[]" id="" class="form-control" value="00:00" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">Hapus</label>
                                                                        <button onclick="hapusJadwal(<?php echo $nomor; ?>)" type="button" id="hapusJadwal1" class="form-control btn btn-danger">Hapus</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button id="tambah_jadwal" class="btn btn-success w-40 float-sm-right" type="button">
                                                                        Tambah Jadwal
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="Submit" class="btn btn-primary">Tambah Matakuliah</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>

                                <div class="card-body table-responsive" style="text-align:center; background-color: #06B8FF;">
                                    <table id="example1" style="background-color: white;" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mata Kuliah</th>
                                                <th>Jurusan</th>
                                                <th>Jadwal</th>
                                                <th>Semester</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $jumlah = 0;
                                            ?>
                                            @if($matakuliah['data'] === false)
                                                <tr>
                                                    <td colspan="6">Belum Ada Matakuliah Yang Ditambahkan</td>
                                                </tr>
                                            @else
                                            @foreach($matakuliah['data'] as $value)                                            
                                            <?php $jumlah += 1; ?>
                                                <tr>
                                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align: middle;">{{ $value['matakuliah'] }}</td>      
                                                    <td style="vertical-align: middle;">{{ $value['jurusan'] }}</td>  
                                                    @php
                                                        {{ 
                                                            $hari       = explode('|', $value['hari']);
                                                            $jamMulai   = explode('|', $value['jam_mulai']);
                                                            $jamSelesai = explode('|', $value['jam_selesai']);
                                                        }}
                                                    @endphp  
                                                    <td>
                                                        @for($i = 0; $i < count($hari); $i++)
                                                            {{ $hari[$i] }} , {{ $jamMulai[$i] }}-{{ $jamSelesai[$i] }} <br>
                                                        @endfor
                                                    </td>  
                                                    <td style="vertical-align: middle;">{{ $value['semester'] }}</td>
                                                    <td style="vertical-align: middle;">                                                    
                                                        <button onclick="HapusMataKuliah('<?php echo $value['id'];?>')" style="color:white;" class="btn btn-danger">Hapus</button>
                                                    </td> 
                                                </tr>                                                

                                                <div class="modal fade" id="modal-edit-mata-kuliah-{{$loop->iteration}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Mata Kuliah</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ url('admin/mata-kuliahs/'.$value['id']) }}" method="POST">
                                                                <input name="_method" type="hidden" value="PUT">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="" class="float-sm-left">Mata Kuliah</label>
                                                                        <input type="text" name="matakuliah_{{ $value['id'] }}" id="matakuliah_{{ $value['id'] }}" class="form-control" placeholder="Bahasa Inggris" value="{{ $value['matakuliah'] }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="" class="float-sm-left">Jurusan</label>
                                                                        @if($jurusan['data'] === false)
                                                                            <a href="{{ url('admin/jurusan') }}" class="form-control btn btn-success">Tambah Jurusan</a>
                                                                        @else
                                                                        <select id="id_jurusans_{{ $value['id'] }}" name="id_jurusans_{{ $value['id'] }}" class="form-control" required>
                                                                            @foreach($jurusan['data'] as $valJurusan)
                                                                                @if($valJurusan['id'] == $value['id_jurusans'])
                                                                                    <option value="{{ $valJurusan['id'] }}" selected>{{ $valJurusan['jurusan'] }}</option>
                                                                                @else
                                                                                    <option value="{{ $valJurusan['id'] }}">{{ $valJurusan['jurusan'] }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        @endif
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="" class="float-sm-left">Semester</label>
                                                                        <input type="number" name="semester_{{ $value['id'] }}" id="semester_{{ $value['id'] }}" class="form-control" value="{{ $value['semester'] }}">
                                                                    </div>
                                                                    
                                                                    <div id="jadwal_{{ $value['id'] }}" >
                                                                        @php
                                                                            {{ $arr_hari         = array("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"); }}                                                                            
                                                                        @endphp          
                                                                        <input type="hidden" id="jumlah_{{$value['id']}}" value="{{ count($hari) }}">                 
                                                                        @for($i = 0; $i < count($hari); $i++)
                                                                        @php
                                                                            {{ $nomor = $i + 1; }}
                                                                        @endphp
                                                                        <div class="row" id="row_{{ $value['id'] }}_{{ $nomor }}">
                                                                            <div class="col-md-3"> 
                                                                                <div class="form-group">                                                 
                                                                                    <label for="" class="float-sm-left">Hari</label>
                                                                                    <select name="hari_{{ $value['id'] }}[]" class="form-control">
                                                                                    @for($j = 0; $j < count($arr_hari); $j++)               
                                                                                        @if( $arr_hari[$j] == $hari[$i] )
                                                                                            <option value="{{ $arr_hari[$j] }}" selected> {{ $arr_hari[$j] }} </option>
                                                                                        @else
                                                                                            <option value="{{ $arr_hari[$j] }}"> {{ $arr_hari[$j] }} </option>
                                                                                        @endif
                                                                                    @endfor
                                                                                    </select> 
                                                                                </div>                           
                                                                            </div>  
                                                                            <div class="col-md-3">
                                                                                <div class="form-group"> 
                                                                                    <label for="" class="float-sm-left">Jam Mulai</label>
                                                                                    <input type="time" name="jam_mulai_{{ $value['id'] }}[]" id="" class="form-control" value="{{ $jamMulai[$i] }}">
                                                                                </div> 
                                                                            </div>     
                                                                            <div class="col-md-3">
                                                                                <div class="form-group"> 
                                                                                    <label for="" class="float-sm-left">Jam Mulai</label>
                                                                                    <input type="time" name="jam_selesai_{{ $value['id'] }}[]" id="" class="form-control" value="{{ $jamSelesai[$i] }}">
                                                                                </div> 
                                                                            </div>     
                                                                            <div class="col-md-3">
                                                                                <div class="form-group"> 
                                                                                    <label for="" class="float-sm-left">Hapus</label>
                                                                                    <button type="button" class="form-control btn btn-danger" onclick="updateHapusJadwal(<?php echo $value['id'];?>, <?php echo $nomor; ?>)">Hapus</button>
                                                                                </div> 
                                                                            </div>                                
                                                                        </div>
                                                                        @endfor  
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <button onclick="updateTambahJadwal(<?php echo $value['id']; ?>)" class="btn btn-success w-40 float-sm-right" type="button">
                                                                                    Tambah Jadwal
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button onclick="updateData(<?php echo $value['id']; ?>)" type="button" class="btn btn-primary">Ubah Data Jurusan</button>
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
        // DELETE
        function HapusMataKuliah(id)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'delete',
                url: 'mata-kuliahs/'+id,
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

                    //alert(response);
                },
                error: function(response) {
                    alert('Gagal');
                }
            });
        }                                                

        var jumlah = '<?php echo $jumlah; ?>';
        for (let index = 1; index <= jumlah; index++) {
            $('#delete' + index + '').on('click', function(e) {
                
                e.preventDefault();

                var kode = $('#kode' + index + '').val();

                
            });
        }
        // ~~

        // ~~ Tambah Matakuliah ADD JADWAL
        $('#tambah_jadwal').click(function(){
            var jumlah   = parseInt( $('#jumlah_jadwal').val() ) + 1;
            var teksAdd  = '';
            teksAdd     += "<div class='row' id='row_"+jumlah+"'>";
            teksAdd     += "    <div class='col-md-3'>";
            teksAdd     += "        <div class='form-group'>";
            teksAdd     += "            <label for=''>Hari</label>";
            teksAdd     += "            <select name='hari[]' class='form-control'>";
            teksAdd     += "                <option value='Senin'>Senin</option>";
            teksAdd     += "                <option value='Selasa'>Selasa</option>";
            teksAdd     += "                <option value='Rabu'>Rabu</option>";
            teksAdd     += "                <option value='Kamis'>Kamis</option>";
            teksAdd     += "                <option value='Jumat'>Jumat</option>";
            teksAdd     += "                <option value='Sabtu'>Sabtu</option>";
            teksAdd     += "            </select>";
            teksAdd     += "        </div>";
            teksAdd     += "    </div>";
            teksAdd     += "    <div class='col-md-3'>";
            teksAdd     += "        <div class='form-group'>";
            teksAdd     += "            <label for=''>Jam Mulai</label>";
            teksAdd     += "            <input type='time' name='jam_mulai[]' id='' class='form-control' value='00:00'>";
            teksAdd     += "        </div>";
            teksAdd     += "    </div>";
            teksAdd     += "    <div class='col-md-3'>";
            teksAdd     += "        <div class='form-group'>";
            teksAdd     += "            <label for=''>Jam Selesai</label>";
            teksAdd     += "            <input type='time' name='jam_selesai[]' id='' class='form-control' value='00:00'>";
            teksAdd     += "        </div>";
            teksAdd     += "    </div>";
            teksAdd     += "    <div class='col-md-3'>";
            teksAdd     += "        <div class='form-group'>";
            teksAdd     += "            <label for='' class='float-sm-left'>Hapus</label>";
            teksAdd     += "            <button onclick='hapusJadwal("+jumlah+")' type='button' id='hapusJadwal"+jumlah+"' class='form-control btn btn-danger'>Hapus</button>";
            teksAdd     += "        </div>";
            teksAdd     += "    </div>";
            teksAdd     += "</div>";

            $('#jadwal').append(teksAdd);

           document.getElementById('jumlah_jadwal').value = jumlah;

        });

        function hapusJadwal(jumlah){
            $('#row_'+jumlah+'').remove();
        }
        // ~~


        // ~~ Update 

        // ~~  Update Fungsi Menambahkan Jadwal Di edit Matakuliah
        function updateTambahJadwal(id)
        {
            var jum = parseInt($('#jumlah_'+id).val()) + 1;
            document.getElementById('jumlah_'+id).value = jum;

            var teksAppend    = "";
            teksAppend       += "<div class='row' id='row_"+id+"_"+jum+"'>";
            teksAppend       += "<div class='col-md-3'>";
            teksAppend       += "<div class='form-group'>";
            teksAppend       += "<label for=''>Hari</label>";
            teksAppend       += "<select name='hari_"+id+"[]' class='form-control'>";
            teksAppend       += "<option value='Senin'>Senin</option>";
            teksAppend       += "<option value='Selasa'>Selasa</option>";
            teksAppend       += "<option value='Rabu'>Rabu</option>";
            teksAppend       += "<option value='Kamis'>Kamis</option>";
            teksAppend       += "<option value='Jumat'>Jumat</option>";
            teksAppend       += "<option value='Sabtu'>Sabtu</option>";
            teksAppend       += "</select>";
            teksAppend       += "</div>";
            teksAppend       += "</div>";
            teksAppend       += "<div class='col-md-3'>";
            teksAppend       += "<div class='form-group'>";
            teksAppend       += "<label for=''>Jam Mulai</label>";
            teksAppend       += "<input type='time' name='jam_mulai_"+id+"[]' class='form-control'>";
            teksAppend       += "</div>";
            teksAppend       += "</div>";
            teksAppend       += "<div class='col-md-3'>";
            teksAppend       += "<div class='form-group'>";
            teksAppend       += "<label for=''>Jam Selesai</label>";
            teksAppend       += "<input type='time' name='jam_selesai_"+id+"[]' class='form-control'>";
            teksAppend       += "</div>";
            teksAppend       += "</div>";
            teksAppend       += "<div class='col-md-3'>";
            teksAppend       += "<div class='form-group'>";
            teksAppend       += "<label for='' class='float-sm-left'>Hapus</label>";
            teksAppend       += "<button onclick='updateHapusJadwal("+id+", "+jum+")' type='button' class='form-control btn btn-danger'>Hapus</button>";
            teksAppend       += "</div>";
            teksAppend       += "</div>";
            teksAppend       += "</div>";

            $('#jadwal_'+id+'').append(teksAppend);
        }
        function updateHapusJadwal(id, nmr)
        {
            $('#row_'+id+'_'+nmr+'').remove();
        }

        function updateData(id)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var jurusan_        = $('#id_jurusans_'+id+'').val();

            var matakuliah_     = $('#matakuliah_'+id+'').val();  

            var semester_       = $('#semester_'+id+'').val();  

            // ~~ HARI  
            var hari_           = [];
            for (let index = 0; index < document.getElementsByName('hari_'+id+'[]').length; index++) {
                hari_.push(document.getElementsByName('hari_'+id+'[]')[index].value);
            }
            // ~~

            // ~~ JAM MULAI
            var jam_mulai_      = [];
            for (let index = 0; index < document.getElementsByName('jam_mulai_'+id+'[]').length; index++) {
                jam_mulai_.push(document.getElementsByName('jam_mulai_'+id+'[]')[index].value);
            }
            // ~~

            // ~~ JAM SELESAI
            var jam_selesai_      = [];
            for (let index = 0; index < document.getElementsByName('jam_selesai_'+id+'[]').length; index++) {
                jam_selesai_.push(document.getElementsByName('jam_selesai_'+id+'[]')[index].value);
            }
            // ~~

            $.ajax({
                type: 'PUT',
                url: 'http://localhost/Pendaftaran%20Online/web/api-glc/admin/mata-kuliahs/'+id,
                data: {
                    id_jurusans     : jurusan_,
                    matakuliah      : matakuliah_,
                    hari            : hari_,
                    jam_mulai       : jam_mulai_,
                    jam_selesai     : jam_selesai_,
                    semester        : semester_
                },
                success: function(data) {
                    if(data['success'] == false)
                    {
                        var pesan = '';
                        if(data['data']['id_jurusans'] != undefined)
                        {
                            pesan += data['data']['id_jurusans'];
                            pesan += '\r\n';
                        }

                        if(data['data']['matakuliah']      != undefined)
                        {
                            pesan += data['data']['matakuliah'];
                            pesan += '\r\n';
                        }          
                        if(data['data']['hari']            != undefined)
                        {
                            pesan += data['data']['hari'];
                            pesan += '\r\n';
                        }
                        if(data['data']['jam_mulai']       != undefined)
                        {
                            pesan += data['data']['jam_mulai'];
                            pesan += '\r\n';
                        }    
                        if(data['data']['jam_selesai']     != undefined)
                        {
                            pesan += data['data']['jam_selesai'];
                            pesan += '\r\n';
                        }    
                        if(data['data']['semester']        != undefined)
                        {
                            pesan += data['data']['semester'];
                            pesan += '\r\n';
                        }    

                        if(
                            data['data']['id_jurusans'] == undefined &&             
                            data['data']['matakuliah']  == undefined &&        
                            data['data']['hari']        == undefined &&    
                            data['data']['jam_mulai']   == undefined &&        
                            data['data']['jam_selesai'] == undefined &&            
                            data['data']['semester']    == undefined        
                        ){
                            pesan += data['data'];     
                            pesan += '\r\n';
                        }
                        alert(pesan);
                    }
                    else{
                        alert(data['upd_message']);
                        location.reload();
                    }
                },
                error: function(response) {
                    alert('Gagal');
                }
            });
        }
        // ~~
        


    </script>
</body>

</html>