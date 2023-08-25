@extends('layouts.main')

@section('container')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title text-center mb-0">Detail Data Obat Berdasarkan No RM: {{ $dataresepobat->first()->no_rm }}</h5>
    </div>
    
    <div class="card-body">
        <div class="table-responsive mb-4">
            <table class="table">
                <tr>
                    <th>No Resep</th>
                    <td>:</td>
                    <td>{{ $dataresepobat->first()->no_resep }}</td>
                </tr>

                <tr>
                    <th>No RM</th>
                    <td>:</td>
                    <td>{{ $dataresepobat->first()->no_rm }}</td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td>:</td>
                    <td>{{ $dataresepobat->first()->nama_pasien }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td>{{ $dataresepobat->first()->alamat }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>:</td>
                    <td>{{ $dataresepobat->first()->tgl }}</td>
                </tr>

                <tr>
                    <th>Sub Total Harga</th>
                    <td>:</td>
                    <td>{{ $dataresepobat->first()->subtotal }}</td>
                </tr>
            </table>
        </div>

        <h3 class="mb-3">Informasi Obat</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Obat</th>
                    <th>Kode Obat</th>
                    <th>Jumlah Obat</th>
                    <th>Harga Obat</th>
                    <th>PPN Obat</th>
                    <th>Diskon Obat</th>
                    <th>Aturan Pakai</th>
                    <th>Total Harga</th>
                </tr>
                @foreach ($dataresepobat as $dataObat)
                    <tr>
                        <td>{{ $dataObat->nama_obat }}</td>
                        <td>{{ $dataObat->kode_obat }}</td>
                        <td>{{ $dataObat->jumlah_obat }}</td>
                        <td>{{ $dataObat->harga_obat }}</td>
                        <td>{{ $dataObat->ppn_obat }} %</td>
                        <td>{{ $dataObat->diskon_obat }} %</td>
                        <td>{{ $dataObat->aturan_pakai }}</td>
                        <td>{{ $dataObat->total }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="container1">
            <div class="buttons">
                <button type="button" class="btn btn-secondary">
                    <a href="{{ url('resepobat') }}" style="text-decoration: none; color: white;">Kembali</a>
                </button>
            </div>
        </div>

    </div>
</div>
<style>
    
    .container1 {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .buttons {
        margin-top: 20px;
    }
</style>

    
@endsection