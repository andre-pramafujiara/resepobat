@extends('layouts.main')

@section('container')


<div class="container">
    <div class="card my-5 p-5 bg-body rounded shadow-sm">
        <h1 class="mb-4">Edit Data Obat (No RM: {{ $dataresepobat->first()->no_rm }})</h1>
        <form action="{{ route('resepobat.update', $dataresepobat->first()->no_rm) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="no_rm" class="form-label">No RM:</label>
                        <input type="text" name="no_rm" value="{{ $dataresepobat->first()->no_rm }}" class="form-control" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien:</label>
                        <input type="text" name="nama_pasien" value="{{ $dataresepobat->first()->nama_pasien }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="subtotal" class="form-label">Sub Total:</label>
                        <input type="number" name="subtotal" value="{{ $dataresepobat->first()->subtotal }}" class="form-control" required>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="no_resep" class="form-label">No Resep:</label>
                        <input type="text" name="no_resep" value="{{ $dataresepobat->first()->no_resep }}" class="form-control" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal:</label>
                        <input type="date" name="tgl" value="{{ $dataresepobat->first()->tgl }}" class="form-control" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea name="alamat" rows="3" class="form-control" required>{{ $dataresepobat->first()->alamat }}</textarea>
                    </div>
                </div>
            </div>
            
            <button type="button" id="btn-add" class="btn btn-success mb-3">Tambah Obat</button>

            <!-- Kolom-kolom input dinamis -->
            <div id="dynamic-inputs">
                @foreach ($dataresepobat as $dataObat)
                    <div class="input-group mb-3">
                        <input type="text" name="nama_obat[]" value="{{ $dataObat->nama_obat }}" class="form-control" placeholder="Nama Obat">
                        <input type="text" name="kode_obat[]" value="{{ $dataObat->kode_obat }}" class="form-control" placeholder="Kode Obat">
                        <input type="number" name="jumlah_obat[]" value="{{ $dataObat->jumlah_obat }}" class="form-control" placeholder="Jumlah Obat">
                        <input type="number" name="harga_obat[]" value="{{ $dataObat->harga_obat }}" class="form-control" placeholder="Harga Obat">
                        <input type="number" name="ppn_obat[]" value="{{ $dataObat->ppn_obat }}" class="form-control" placeholder="PPN Obat">
                        <input type="number" name="diskon_obat[]" value="{{ $dataObat->diskon_obat }}" class="form-control" placeholder="Diskon Obat">
                        <input type="text" name="aturan_pakai[]" value="{{ $dataObat->aturan_pakai }}" class="form-control" placeholder="Aturan Pakai">
                        <input type="number" name="total[]" value="{{ $dataObat->total }}" class="form-control" placeholder="Harga Obat">
                        <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                    </div>
                @endforeach
            </div>

            
            <div class="container">
                <div class="buttons">
    
                    <button type="button" class="btn btn-secondary">
                        <a href="{{ url('resepobat') }}" style="text-decoration: none; color: white;">Kembali</a>
                      </button>
    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
        </form>
    </div>
</div>

<style>
    /* Custom styles for a visually appealing appearance */
    .input-group {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
    }

    .btn-remove {
        background-color: #dc3545;
        border: none;
        color: white;
        padding: 5px 10px;
        cursor: pointer;
    }

    .btn-remove:hover {
        background-color: #c82333;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .buttons {
        margin-top: 20px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addButton = document.getElementById('btn-add');
        const dynamicInputs = document.getElementById('dynamic-inputs');

        addButton.addEventListener('click', function () {
            const newInput = document.createElement('div');
            newInput.innerHTML = `
                <div class="input-group">
                    <input type="text" name="nama_obat[]" class="form-control" placeholder="Nama Obat">
                    <input type="text" name="kode_obat[]" class="form-control" placeholder="Kode Obat">
                    <input type="number" name="jumlah_obat[]" class="form-control" placeholder="Jumlah Obat">
                    <input type="number" name="harga_obat[]" class="form-control" placeholder="Harga Obat">
                    <input type="number" name="ppn_obat[]" class="form-control" placeholder="PPN Obat">
                    <input type="number" name="diskon_obat[]" class="form-control" placeholder="Diskon Obat">
                    <input type="text" name="aturan_pakai[]" class="form-control" placeholder="Aturan Pakai">
                    <input type="number" name="total[] "class="form-control" placeholder="Harga Total">
                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                </div>
            `;
            dynamicInputs.appendChild(newInput);
        });

        dynamicInputs.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('btn-remove')) {
                e.target.parentElement.remove();
            }
        });
    });
</script>
  
@endsection