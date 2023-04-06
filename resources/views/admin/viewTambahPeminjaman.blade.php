@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row row-card-no-pd mt--3">
        <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
            <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-info">Kembali</a>
            <hr>
            <form method="post" action="/panel-admin/simpan-peminjaman">
                @csrf
                <div class="form-group">
                    <label for="">Nomor Peminjaman</label>
                    <input type="text" class="form-control" name="noPeminjaman" readonly value="{{ $noPeminjaman }}">
                </div>
                <div class="form-group">
                    <label for="">Peminjam</label>
                    <select id="selectize-dropdown" name="anggota_id">
                        <option value="{{ old('anggota_id') }}">Masukkan Nim</option>
                        @foreach ($anggota as $data)
                        <option value="{{ $data->id }}">{{ $data->nim }} - {{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Judul Buku</label>
                    <select id="selectizes-dropdown" name="buku_id">
                        <option value=""></option>
                        @foreach ($buku as $data)
                        <option value="{{ $data->id }}">{{ $data->judul }} - {{ $data->pengarang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Buku</label>
                    <input type="number" class="form-control" name="jumlahBuku" placeholder="Masukkan Jumlah Buku..">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" name="tglPeminjaman">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info    form-control" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
