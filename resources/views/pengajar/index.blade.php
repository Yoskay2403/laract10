@extends('layout.templatepengajar')
        <!-- START DATA -->
        @section('konten')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('pengajar') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('pengajar/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Nama Pengajar</th>
                            <th class="col-md-2">Detail Pengajar</th>
                            <th class="col-md-2">Id Peserta</th>
                            <th class="col-md-2">Id Program</th>
                            <th class="col-md-2">Foto Pengajar</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama_pengajar }}</td>
                            <td>{{ $item->detail_pengajar }}</td>
                            <td>{{ $item->id_peserta }}</td>
                            <td>{{ $item->id_program }}</td>
                            <td>{{ $item->foto_pengajar }}</td>
                            <td>
                                <a href='{{ url('pengajar/'.$item->nama_pengajar.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data')"class='d-inline'action="{{ url('pengajar/'.$item->nama_pengajar) }}" method="post">
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
   