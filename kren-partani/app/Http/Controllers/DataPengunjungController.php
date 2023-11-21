<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\datapengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapengunjung = datapengunjung::all();
        $datapengunjung = datapengunjung::paginate(10); // 
        return view('admin.data_pengunjung.datapengunjung', [
            "title" => 'Data Pengunjung'
        ], compact('datapengunjung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data_pengunjung.datapengunjung', [
            "title" => 'Tambah Data Pengunjung'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required',
            'nik' => 'required',
            'tempat_tinggal'    => 'required'
        ]);

        $data = new datapengunjung();
        $data->nama_pengunjung = $request->nama_pengunjung;
        $data->nik = $request->nik;
        $data->tempat_tinggal = $request->tempat_tinggal;
        $data->save();

        return redirect()->route('show-datapengunjung');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id_data)
    // {
    //     $data = datapengunjung::find($id_data);
    //     return view('galeri.detail-galeri', ['galeri' => $galeri]);
    //     return view('galeri.galeri', ['galeri' => $galeri]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_data)
    {
        $data = datapengunjung::find($id_data);
        return view('admin.data_pengunjung.edit-datapengunjung', [
            "title" => 'Update Data Pengunjung'
        ], ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_data)
    {
        $data = datapengunjung::findOrFail($id_data);
        $data->nama_pengunjung = $request->nama_pengunjung;
        $data->nik = $request->nik;
        $data->tempat_tinggal = $request->tempat_tinggal;
        $data->save();
        return redirect('/show-datapengunjung');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id_data)
    // {
    //     $delete = DB::table('data_pengunjung')->where('id_data', $id_data)->delete();
    //     return redirect()->route('show-data');
    // }
    public function destroy($id_data)
    {
        $delete = DB::table('data_pengunjung')->where('id_data', $id_data)->delete();
        return redirect()->route('show-datapengunjung');
    }
}
