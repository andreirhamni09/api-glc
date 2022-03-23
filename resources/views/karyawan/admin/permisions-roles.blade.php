<?php $jumlah += 1; ?>
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $value['id'] }}</td>
    <td>{{ $value['jurusan'] }}</td>
    <td>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-jurusan-{{$loop->iteration}}">Edit</button>
        <input type="hidden" id="kode{{ $loop->iteration }}" value="{{$value['id']}}">
        <a style="color:white;" id="delete{{ $loop->iteration }}" class="btn btn-danger">Hapus</a>
    </td>
</tr>

<div class="modal fade" id="modal-edit-jurusan-{{$loop->iteration}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jurusan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/jurusan/'.$value['id']) }}" method="POST">
                <input name="_method" type="hidden" value="PUT">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="float-sm-left">Kode Jurusan</label>
                        <input type="text" name="id" id="" class="form-control" placeholder="001" value="{{ $value['id'] }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="float-sm-left">Nama Jurusan</label>
                        <input type="text" name="jurusan" id="" class="form-control" placeholder="Manajemen Informatika" value="{{ $value['jurusan'] }}">
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