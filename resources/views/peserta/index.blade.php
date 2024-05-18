@extends('layout.templatepeserta')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('peserta') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('peserta/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">No</th>
                            <th class="col-md-4">Nama Peserta</th>
                            <th class="col-md-5">Id Program</th>
                            <th class="col-md-5">Usia Peserta</th>
                            <th class="col-md-5">Alamat</th>
                            <th class="col-md-5">Jenis Kelamin</th>
                            <th class="col-md-5">TTL</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama_peserta }}</td>
                            <td>{{ $item->$peserta->program->id }}</td>
                            <td>{{ $item->usia_peserta }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->ttl }}</td>
                            <td>
                                <a href='{{ url('peserta/'.$item->nama_peserta.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data')"class='d-inline'action="{{ url('program/'.$item->nama_peserta) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                          
                            </td>
                        </tr>  
                        <?php $i++ ?>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
               
          </div>
          <!-- AKHIR DATA -->
          @endsection
   