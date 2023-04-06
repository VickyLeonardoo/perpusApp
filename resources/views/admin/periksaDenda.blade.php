@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-info">Kembali</a>
                <h3>Pengembalian Buku No Peminjaman {{ $peminjam->noPeminjaman }}</h3>
                <hr>
                <form action="/panel-admin/pengembalian-peminjaman-{{ $peminjam->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">No Anggotas:</label>
                        <input type="text" class="form-control" readonly name="noAnggota" value="{{ $peminjam->anggota->noAnggota }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nim:</label>
                        <input type="text" class="form-control" readonly name="nim" value="{{ $peminjam->anggota->nim }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama:</label>
                        <input type="text" class="form-control" readonly name="nama" value="{{ $peminjam->anggota->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Judul Buku:</label>
                        <input type="text" class="form-control" readonly name="judulBuku" value="{{ $peminjam->buku->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="">Pengarang:</label>
                        <input type="text" class="form-control" readonly name="pengarang" value="{{ $peminjam->buku->pengarang }}">
                    </div>
                    <div class="form-group">
                        <label for="">Denda:</label>
                        <input type="text" class="form-control" readonly name="denda" value="{{ $denda }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
