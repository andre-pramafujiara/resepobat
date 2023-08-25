@extends('layouts.main')

@section('container')


<!-- resources/views/obat/create.blade.php -->
<form action="{{ url('resepobat') }}" method="POST">
    @csrf
    <div class="my-0.5 p-0 bg-body rounded shadow-sm">

        <div class="my-0.5 p-5 bg-body rounded shadow-sm">
            <div class="row">
                <div class="col-md-6">
        
                    <div class="mb-3">
                        <label for="no_rm" class="form-label">No RM:</label>
                        <input type="text" name="no_rm" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien:</label>
                        <input type="text" name="nama_pasien" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="subtotal" class="form-label">Total Harga:</label>
                        <input type="number" name="subtotal" class="form-control" required>
                    </div>
                </div>
        
                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="no_resep" class="form-label">No Resep:</label>
                        <input type="text" name="no_resep" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal:</label>
                        <input type="date" name="tgl" class="form-control" required>
                    </div>
        
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                
            </div>
            <button type="button" id="btn-add" class="btn btn-success mb-3">+ Tambah Obat</button>
     

                <div id="dynamic-inputs">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama_obat[]" placeholder="Nama Obat">
                        <input type="text" class="form-control" name="kode_obat[]" placeholder="Kode Obat">
                        <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah Obat">
                        <input type="number" class="form-control" name="harga_obat[]" placeholder="Harga Obat">
                        <input type="number" class="form-control" name="ppn_obat[]" placeholder="PPN Obat">
                        <input type="number" class="form-control" name="diskon_obat[]" placeholder="Diskon Obat">
                        <input type="text" class="form-control" name="aturan_pakai[]" placeholder="Aturan Pakai">
                        <input type="number" class="form-control" name="total[]" placeholder="Harga Total">
                        <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                    </div>
                </div>
        
                <div class="container">
                    <div class="buttons">
        
                        <button type="button" class="btn btn-secondary">
                            <a href="{{ url('resepobat') }}" style="text-decoration: none; color: white;">Kembali</a>
                          </button>
        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                
                <style>
        
                    #dynamic-inputs {
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }
                
                    .input-group {
                        margin-bottom: 10px;
                    }
                
                    .btn-remove {
                        margin-top: auto;
                        margin-bottom: auto;
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
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addButton = document.getElementById('btn-add');
        const dynamicInputs = document.getElementById('dynamic-inputs');

        addButton.addEventListener('click', function () {
            const newInput = document.createElement('div');
            newInput.innerHTML = `
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nama_obat[]" placeholder="Nama Obat">
                    <input type="text" class="form-control" name="kode_obat[]" placeholder="Kode Obat">
                    <input type="number" class="form-control" name="jumlah_obat[]" placeholder="Jumlah Obat">
                    <input type="number" class="form-control" name="harga_obat[]" placeholder="Harga Obat">
                    <input type="number" class="form-control" name="ppn_obat[]" placeholder="PPN Obat">
                    <input type="number" class="form-control" name="diskon_obat[]" placeholder="Diskon Obat">
                    <input type="text" class="form-control" name="aturan_pakai[]" placeholder="Aturan Pakai">
                    <input type="number" class="form-control" name="total[]" placeholder="Harga Total">
                    <button type="button" class="btn btn-danger btn-remove">Hapus</button>
                </div>

                <style>
                    /* Custom styles for a visually appealing appearance */
                    .input-group {
                        display: flex;
                        align-items: center;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        padding: 10px;
                        margin-bottom: 10px;
                        position: relative;
                    }

                    .input-group .form-control {
                        flex: 1;
                    }

                    .btn-remove {
                        margin-left: auto;
                        background-color: #dc3545;
                        border: none;
                    }

                    .btn-remove:hover {
                        background-color: #c82333;
                    }
                </style>

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