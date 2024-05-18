@extends('layout.templatepengajar')
 <!-- START FORM -->
 @section('konten')

 <form action='{{ url('pengajar') }}' method='post'>
    @csrf
    <a href='{{ url('pengajar') }}' class="btn btn-secondary"><< kembali </a>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Pengajar</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama_pengajar' placeholder='Masukan Nama Pengajar' value="{{ Session::get('nama_pengajar') }}" id="nama_pengajar">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Detail Pengajar</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='detail_pengajar' placeholder='Masukan Detail Pengajar' value="{{ Session::get('detail_pengajar') }}" id="detail_pengajar">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Id Peserta</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_peserta' placeholder='Masukan Id Peserta' value="{{ Session::get('id_peserta') }}" id="id_peserta">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Id Program</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='id_program' placeholder='Masukan Id Program' value="{{ Session::get('id_program') }}" id="id_program">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Foto Pengajar</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='foto_pengajar' value="{{ Session::get('foto_pengajar') }}" id="foto_pengajar">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection
