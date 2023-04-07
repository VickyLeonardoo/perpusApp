@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <a href="/panel-admin/tambah-data-anggota" class="btn btn-info">Tambah Data</a>
                <br><br>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nomor Anggota</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <tbody>
                        @foreach ($anggota as $data)
                        <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->noAnggota }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ date('d-M-y', strtotime($data->tglLahir)) }}</td>
                                <td>{{ $data->agama }}</td>
                                <td style="text-align: center;">
                                    <a href="/panel-admin/edit-anggota-{{ $data->noAnggota }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalHapus{{ $data->id}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nomor</th>
                            <th>Nomor Anggota</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @foreach ($anggota as $data)
        <div class="modal fade" id="modalHapus{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/panel-admin/hapus-data-anggota-{{ $data->id }}" method="POST">
                        @csrf
                    <div class="modal-body">
                        Ingin Menghapus Anggota <strong>{{ $data->nama }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <input type="submit" class="btn btn-primary" value="Hapus">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
