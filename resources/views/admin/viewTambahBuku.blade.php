@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row row-card-no-pd mt--3">
        <div class="p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="margin-top: -1cm">
                        <label for="">Nim:</label>
                        <input type="text" readonly value="" id="textfield" class="form-control">
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: -1cm">
                    <div class="form-group">
                        <label for="">Nama:</label>
                        <input type="text" readonly value="" id="textfield"  class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group" >
                        <label for="">Prodi:</label>
                        <input type="text" readonly value="" id="textfield" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" >
                        <label for="">Kelas:</label>
                        <input type="text" readonly value="" id="textfield" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" >
                        <label for="">Kelas:</label>
                        <input type="text" readonly value="" id="textfield" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" >
                        <label for="">Email:</label>
                        <input type="text" readonly value="" id="textfield" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" >
                        <label for="">Alamat:</label>
                        <input type="text" readonly value="" id="textfield" class="form-control">
                    </div>
                </div>
            </div> --}}
            <form action="/panel-admin/simpan-data-buku" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Judul:</label>
                    <input type="text" class="form-control" value="{{ old('judul') }}" name="judul">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Terbit:</label>
                    <input type="date" class="form-control" value="{{ old('tglTerbit') }}" name="tglTerbit">
                </div>
                <div class="form-group">
                    <label for="">Pengarang:</label>
                    <input type="text" class="form-control" value="{{ old('pengarang') }}" name="pengarang">
                </div>
                <div class="form-group">
                    <label for="">Stok:</label>
                    <input type="text" class="form-control" value="{{ old('stok') }}" name="stok">
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
