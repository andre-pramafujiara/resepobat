@extends('layouts.main')

@section('container')
<h2 class="text-center">FORM PENGINPUTAN DATA KARYAWAN</h2>
<!-- START FORM -->
<form action ="{{ url('employee') }}" method='post'>
@csrf
    <div class="my-0.5 p-5 bg-body rounded shadow-sm">
        <a href="{{ url('employee') }}" class="btn btn-warning mb-2">Kembali</a>
        <div class="mb-3 row">
            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nip' id="nip">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="callnama" class="col-sm-2 col-form-label">Nama Panggilan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='callname' id="callname">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="birth_place" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='birth_place' id="birth_place">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='birth_date' id="birth_date">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">--Pilih Jnis Kelamin--</option>
                    <option value="0">Perempuan</option>
                    <option value="1">Laki-Laki</option>						
                </select>
            </div>
             
            {{-- <div class="col-sm-10">
                <input type="text" class="form-control" name='gender' id="gender">
            </div> --}}
        </div>
        <div class="mb-3 row">
            <label for="religion" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <select name="religion" id="religion" class="form-control" required>
                    <option value="">--Pilih Agama--</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>						
                </select>
                {{-- <input type="text" class="form-control" name='religion' id="religion"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="telp" class="col-sm-2 col-form-label">Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='telp' id="telp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='email' id="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="marital_status" class="col-sm-2 col-form-label">Status Perkawinan</label>
            <div class="col-sm-10">
                <select name="marital_status" id="marital_status" class="form-control" required>
                    <option value="">--Pilih Status Pernikahan--</option>
                    <option value="menikah">Menikah</option>
                    <option value="belum menikah">Belum Menikah</option>						
                </select>
                {{-- <input type="text" class="form-control" name='marital_status' id="marital_status"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="blood" class="col-sm-2 col-form-label">Gologan Darah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='blood' id="blood">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="citizen" class="col-sm-2 col-form-label">Citizen</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='citizen' id="citizen">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_identity" class="col-sm-2 col-form-label">No Identitas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='no_identity' id="no_identity">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='npwp' id="npwp">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bank" class="col-sm-2 col-form-label">BANK</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='bank' id="bank">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bank_account_number" class="col-sm-2 col-form-label">Akun Bank</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='bank_account_number' id="bank_account_number">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address_identity" class="col-sm-2 col-form-label">Alamat KTP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='address_identity' id="address_identity">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="province_identity" class="col-sm-2 col-form-label">Provinsi</label>
            <div class="col-sm-10">
                <select class="form-control" id="province_identity" name="province_identity">
                    <option value="">--Pilih Provinsi--</option>
                    @foreach ($provinces as $province_identity)
                        <option value="{{ $province_identity->id }}">{{ $province_identity->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" name='province_identity' id="province_identity"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="city_identity" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
            <div class="col-sm-10">
                <select class="form-control" id="city_identity" name="city_identity">
                    <option value="">--Pilih Kabupaten/Kota--</option>
                    
                </select>
                {{-- <input type="text" class="form-control" name='city_identity' id="city_identity"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="subdistrict_identity" class="col-sm-2 col-form-label">Kecamatan</label>
            <div class="col-sm-10">
                <select class="form-control" id="subdistrict_identity" name="subdistrict_identity">
                    <option value="">--Pilih Kecamatan--</option>
                </select>
                {{-- <input type="text" class="form-control" name='subdistrict_identity' id="subdistrict_identity"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ward_identity" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-10">
                <select class="form-control" id="ward_identity" name="ward_identity">
                    <option value="">--Pilih Kel/Desa--</option>
                </select>
                {{-- <input type="text" class="form-control" name='ward_identity' id="ward_identity"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rt_identity" class="col-sm-2 col-form-label">RT</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='rt_identity' id="rt_identity">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rw_identity" class="col-sm-2 col-form-label">RW</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='rw_identity' id="rw_identity">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address_now" class="col-sm-2 col-form-label">Alamat Domisili</label>
            <div class="col-sm-10">
                
                <input type="text" class="form-control" name='address_now' id="address_now">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="province_now" class="col-sm-2 col-form-label">Provinsi</label>
            <div class="col-sm-10">
                <select class="form-control" id="province_now" name="province_now">
                    <option value="">--Pilih Provinsi--</option>
                    @foreach ($provinces as $province_now)
                        <option value="{{ $province_now->id }}">{{ $province_now->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" name='province_now' id="province_now"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="city_now" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
            <div class="col-sm-10">
                <select class="form-control" id="city_now" name="city_now">
                    <option value="">--Pilih Kabupaten--</option>
                </select>
                {{-- <input type="text" class="form-control" name='city_now' id="city_now"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="subdistrict_now" class="col-sm-2 col-form-label">Kecamatan</label>
            <div class="col-sm-10">
                <select class="form-control" id="subdistrict_now" name="subdistrict_now">
                    <option value="">--Pilih Kecamatan--</option>
                </select>
                {{-- <input type="text" class="form-control" name='subdistrict_now' id="subdistrict_now"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ward_now" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
            <div class="col-sm-10">
                <select class="form-control" id="ward_now" name="ward_now">
                    <option value="">--Pilih Desa/Kelurahan--</option>
                </select>
                {{-- <input type="text" class="form-control" name='ward_now' id="ward_now"> --}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rt_now" class="col-sm-2 col-form-label">RT</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='rt_now' id="rt_now">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rw_now" class="col-sm-2 col-form-label">RW</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='rw_now' id="rw_now">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
        
      </form>
    </div>
    <!-- AKHIR FORM -->

    
@endsection