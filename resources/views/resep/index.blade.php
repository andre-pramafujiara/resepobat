@extends('layouts.main')

@section('container')
     <!-- TOMBOL TAMBAH DATA -->
     <div class="my-0.5 p-3 bg-body rounded shadow-sm">
        <a href='resep/create' class="btn btn-primary mb-3">+ Tambah Data</a>
      </div>

      <table class="table table-striped">
          <thead>
              <tr>
                  <th class="col-md-1">No</th>
                  <th class="col-md-1">Kode Obat</th>
                  <th class="col-md-2">Nama Obat</th>
                  <th class="col-md-2">Harga Satuan</th>
                  <th class="col-md-2">Jumlah</th>
                  <th class="col-md-1">Diskon</th>
                  <th class="col-md-1">PPN</th>
                  <th class="col-md-2">Total</th>
                  <th class="col-md-2">Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php $no = 1?>
            @foreach($dataresep as $data)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data->nama_obat }}</td>
                    <td>{{ $data->kode_obat }}</td>
                    <td>{{ $data->jumlah_obat }}</td>
                    <td>{{ $data->harga_obat }}</td>
                    <td>{{ $data->ppn_obat }}</td>
                    <td>{{ $data->diskon_obat }}</td>
                    <td>{{ $data->aturan_pakai }}</td>
                    <td>{{ $data->total }}</td>
                    <td>
                        <a href=' {{ url('/resep/'.$data->kode_obat) }}'  class="btn btn-info btn-sm">Detail</a>
                        <a href=' {{ url('resep/'.$data->kode_obat.'/edit') }}'  class="btn btn-warning btn-sm">Edit</a>

                        <form onsubmit="return confirm('Yakin menghapus data ?')" class="d-inline" action='{{ url('resep/'.$data->kode_obat) }}' method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
    
                    </td>
                </tr>
                <?php 
					$no++;
                    ?>
            @endforeach
              
          </tbody>
      </table>
      {{ $dataresep->links() }}
     
</div>
<!-- AKHIR DATA -->
@endsection
