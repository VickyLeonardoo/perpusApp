@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-info">Kembali</a>
                <hr>
                <form action="/panel-admin/update-buku-{{ $buku->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Judul:</label>
                        <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="">Pengarang:</label>
                        <input type="text" class="form-control" name="pengarang" value="{{ $buku->pengarang }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Terbit:</label>
                        <input type="date" class="form-control" name="tglTerbit" value="{{ $buku->tglTerbit }}">
                    </div>
                    <div class="form-group">
                        <label for="">Stok:</label>
                        <input type="text" class="form-control" name="stok" value="{{ $buku->stok }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
