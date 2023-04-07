@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <form action="/panel-admin/simpan-data-anggota" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">NIM:</label>
                        <input type="text" class="form-control" value="{{ old('nim') }}" name="nim" placeholder="Masukkan Nim">
                    </div>
                    <div class="form-group">
                        <label for="">Nama:</label>
                        <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir:</label>
                        <input type="date" class="form-control" value="{{ old('tglLahir') }}" name="tglLahir">
                    </div>
                    <div class="form-group">
                        <label for="">Agama:</label>
                        <select name="agama" class="form-control" id="">
                            <option value="Islam">Islam</option>
                            <option value="Kriten Protestan">Kristen Protestan</option>
                            <option value="Kriten Katholik">Kristen Katholik</option>
                            <option value="Budhha">Budhha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info form-control" value="Simpan">
                        {{-- <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-info form-control">Kembali</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
