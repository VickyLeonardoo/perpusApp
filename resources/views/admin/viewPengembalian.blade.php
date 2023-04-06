@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <br><br>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>No Peminjaman</th>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    ?>
                    <tbody>
                        @foreach ($pengembalian as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->peminjaman->noPeminjaman }}</td>
                            <td>{{ $data->peminjaman->anggota->nim }} - {{ $data->peminjaman->anggota->nama }}</td>
                            <td>{{ $data->peminjaman->buku->judul }}</td>
                            <td>{{ $data->peminjaman->buku->pengarang }}</td>
                            <td>{{ $data->peminjaman->tglPeminjaman }}</td>
                            <td> {{ date('d-M-y',strtotime($data->tglKembali)) }}</td>
                            <td>Rp. {{ $data->denda }}</td>
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
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
