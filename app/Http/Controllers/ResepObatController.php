<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\ResepObat;
use Illuminate\Support\Facades\DB;

class ResepObatController extends Controller
{
  
    public function index()
    {

        $dataresepobat = ResepObat::select('no_resep', 'no_rm', 'alamat', 'tgl', DB::raw('MAX(nama_pasien) as nama_pasien'))
                             ->groupBy('no_resep', 'no_rm', 'alamat', 'tgl')
                             ->get();
        return view('resepobat.index', compact('dataresepobat'));
    }

  
    public function create()
    {

        $provinces = Province::all();
        return view('resepobat.create', compact('provinces'));
    }


     public function store(Request $request )
     {
         $validatedData = $request->validate([
            'nama_pasien' => 'required',
            'no_resep' => 'required',
            'no_rm' => 'required',
            'alamat' => 'required',
            'tgl' => 'required',
            'subtotal' => 'required',
            'nama_obat.*' => 'required|string',
            'kode_obat.*' => 'required|string',
            'jumlah_obat.*' => 'required|integer',
            'harga_obat.*' => 'required|numeric',
            'ppn_obat.*' => 'required|numeric',
            'diskon_obat.*' => 'required|numeric',
            'aturan_pakai.*' => 'required|string',
            'total.*' => 'required|string',
         ]);
     
         foreach ($validatedData['nama_obat'] as $index => $nama_obat) {
             $dataObat = new ResepObat([
                'nama_pasien' => $request->nama_pasien,
                'no_resep' => $request->no_resep,
                'no_rm' => $request->no_rm,
                'alamat' => $request->alamat,
                'tgl' => $request->tgl,
                'subtotal' => $request->subtotal,
                'nama_obat' => $nama_obat,
                'kode_obat' => $validatedData['kode_obat'][$index],
                'jumlah_obat' => $validatedData['jumlah_obat'][$index],
                'harga_obat' => $validatedData['harga_obat'][$index],
                'ppn_obat' => $validatedData['ppn_obat'][$index],
                'diskon_obat' => $validatedData['diskon_obat'][$index],
                'aturan_pakai' => $validatedData['aturan_pakai'][$index],
                'total' => $validatedData['total'][$index],

            ]);
     
             $dataObat->save();
         }
     
         return redirect()->route('resepobat.create')->with('success', 'Data obat berhasil disimpan.');
     }
     
    
    public function show($no_rm)
    {
       
        $dataresepobat = ResepObat::where('no_rm', $no_rm)->get();
        return view('resepobat.show', compact('dataresepobat'));
        
    }

   
    public function edit($no_rm)
    {
        $dataresepobat = ResepObat::where('no_rm', $no_rm)->get();
        return view('resepobat.edit', compact('dataresepobat'));
    }


    public function update(Request $request, $no_rm)
    {
   
        $validatedData = $request->validate([
            'nama_pasien' => 'required',
            'no_resep' => 'required',
            'no_rm' => 'required',
            'alamat' => 'required',
            'tgl' => 'required',
            'subtotal' => 'required',
            'nama_obat.*' => 'required|string',
            'kode_obat.*' => 'required|string',
            'jumlah_obat.*' => 'required|integer',
            'harga_obat.*' => 'required|numeric',
            'ppn_obat.*' => 'required|numeric',
            'diskon_obat.*' => 'required|numeric',
            'aturan_pakai.*' => 'required|string',
            'total.*' => 'required|string',
         ]);

         $dataresepobat = ResepObat::where('no_rm', $no_rm)->get();

         foreach ($dataresepobat as $index => $dataObat) {
            $dataObat->update([
                'nama_pasien' => $request->nama_pasien,
                'no_resep' => $request->no_resep,
                'no_rm' => $request->no_rm,
                'alamat' => $request->alamat,
                'tgl' => $request->tgl,
                'subtotal' => $request->subtotal,
                'nama_obat' => $validatedData['nama_obat'][$index],
                'kode_obat' => $validatedData['kode_obat'][$index],
                'jumlah_obat' => $validatedData['jumlah_obat'][$index],
                'harga_obat' => $validatedData['harga_obat'][$index],
                'ppn_obat' => $validatedData['ppn_obat'][$index],
                'diskon_obat' => $validatedData['diskon_obat'][$index],
                'aturan_pakai' => $validatedData['aturan_pakai'][$index],
                'total' => $validatedData['total'][$index],
            ]);
        }
        
        return redirect()->route('resepobat.index')->with('success', 'Data berhasil diperbarui.');
       
    }

   
    public function destroy($id)
    {

        ResepObat::where('no_rm', $id)->delete();
        return redirect()->to('resepobat')->with('success', 'Berhasil menghapus data ');
    }


}
