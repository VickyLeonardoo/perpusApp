@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row row-card-no-pd mt--3">
            <div class="table-responsive p-0 container-fluid" style="margin-right: 1cm; margin-left: 1cm; margin-top: 1cm">
                <a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn btn-info">Kembali</a>
                <hr>
                <form action="/panel-admin/update-anggota-{{ $anggota->noAnggota }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">No Anggotas:</label>
                        <input type="text" class="form-control" disabled name="noAnggota" value="{{ $anggota->noAnggota }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nim:</label>
                        <input type="text" class="form-control" name="nim" value="{{ $anggota->nim }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama:</label>
                        <input type="text" class="form-control" name="nama" value="{{ $anggota->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir:</label>
                        <input type="date" class="form-control" name="tglLahir" value="{{ $anggota->tglLahir }}">
                    </div>
                    <div class="form-group">
                        <label for="">Agama:</label>
                        <select name="agama" class="form-control" id="">
                            <option value="{{ $anggota->agama }}" selected>{{ $anggota->agama }}</option>
                            <option value="" disabled>----</option>
                            <option value="Islam">Islam</option>
                            <option value="Kriten Protestan">Kristen Protestan</option>
                            <option value="Kriten Katholik">Kristen Katholik</option>
                            <option value="Budhha">Budhha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
