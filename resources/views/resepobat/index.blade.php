@extends('layouts.main')

@section('container')

     <div class="my-0.5 p-3 bg-body rounded shadow-sm">
        <a href='resepobat/create' class="btn btn-primary mb-3">+ Tambah Data</a>
      </div>

      <table class="table table-striped">
          <thead>
              <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-1">Nomor RM</th>
                <th class="col-md-2">Nama Pasien</th>
                <th class="col-md-2">Nomor Resep</th>
                <th class="col-md-2">Alamat</th>
                <th class="col-md-1">Tanggal</th>
                <th class="col-md-2">Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php $no = 1?>
            @foreach($dataresepobat as $data)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $data->no_rm }}</td>
                    <td>{{ $data->nama_pasien }}</td>
                    <td>{{ $data->no_resep }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->tgl }}</td>
                    <td>
                        <a href=' {{ url('/resepobat/'.$data->no_rm) }}'  class="btn btn-info btn-sm">Detail</a>
                        <a href=' {{ url('resepobat/'.$data->no_rm.'/edit') }}'  class="btn btn-warning btn-sm">Edit</a>

                        <form onsubmit="return confirm('Yakin menghapus data ?')" class="d-inline" action='{{ url('resepobat/'.$data->no_rm) }}' method="post">
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
      {{-- {{ $dataresepobat->links() }} --}}
     
</div>

@endsection
