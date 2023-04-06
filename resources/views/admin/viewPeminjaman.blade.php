@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <a href="/panel-admin/tambah-peminjaman" class="btn btn-info">Tambah Data</a>
                <br><br>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>No Peminjaman</th>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Pengembalian</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <?php $i = 1;


                    ?>
                    <tbody>
                        @foreach ($peminjaman as $data)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->noPeminjaman }}</td>
                            <td>{{ $data->anggota->nim }} - {{ $data->anggota->nama }}</td>
                            <td>{{ $data->buku->judul }}</td>
                            <td>{{ $data->buku->pengarang }}</td>
                            <td>{{ date('d-M-Y',strtotime($data->tglPeminjaman)) }}</td>
                            <td>{{ date('d-M-Y',strtotime($data->batasPeminjaman)) }}</td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modalPengembalian{{ $data->id}}">
                                       Pengembalian
                                    </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nomor</th>
                            <th>No Peminjaman</th>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Pengembalian</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @foreach ($peminjaman as $data)
        <div class="modal fade" id="modalPengembalian{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/panel-admin/periksa-peminjaman-{{ $data->id }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tglPengembalian" value="{{ $data->anggota->nama }}">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Cek Peminjaman">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
