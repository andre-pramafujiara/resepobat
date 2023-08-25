<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Resep::orderBy('id','asc')->paginate(5);
        return view('resep.index')->with('dataresep', $data);
        //return 'hi';
      //  return view('resep.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'hi';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nama_obat' => 'required|string|max:255',
            'kode_obat' => 'required|string|max:255',
            'jumlah_obat' => 'required|integer',
            'harga_obat' => 'required|double',
            'ppn_obat' => 'required|double',
            'diskon_obat' => 'required|double',
            'aturan_pakai' => 'required|string|max:255',
        ]);

        $jumlah_obat = $request->input('jumlah_obat');
        $harga_obat = $request->input('harga_obat');
        $ppn_obat = $request->input('ppn_obat');
        $diskon_obat = $request->input('diskon_obat');
        $total = (($harga_obat + $ppn_obat) * $jumlah_obat) - (($harga_obat + $ppn_obat) * $jumlah_obat * $diskon_obat / 100);

        $data =[
            'nama_obat' => $request->nama_obat,
            'kode_obat' => $request->kode_obat,
            'jumlah_obat' => $request->jumlah_obat,
            'harga_obat' => $request->harga_obat,
            'ppn_obat' => $request->ppn_obat,
            'diskon_obat' => $request->diskon_obat,
            'total' => $total,
            'aturan_pakai' => $request->aturan_pakai,
            'gender' => $request->gender,
        ];

        Resep::create($data);

return redirect()->to('employee')->with('success', 'Berhasil menamphkan data ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
