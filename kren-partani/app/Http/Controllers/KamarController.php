<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $kamar = Kamar::paginate(3); // 
        return view('admin.kamar.kamar', [
            "title" => 'Tambah Kamar'
        ], compact('kamar'));
    }

    public function create()
    {
        return view('admin.kamar.kamar', [
            "title" => "Tambah Kamar"
        ]);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('gambar_kamar')) {
            $request->validate([
                'nama_kamar' => 'required',
                'deskripsi' => 'required',
                'status' => 'required',
                'nomor_telepon' => 'required',
                'gambar_kamar'   => 'required|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            $fileName = time() . '.' . $request->gambar_kamar->extension();
            $request->gambar_kamar->move(public_path('image'), $fileName);
            $kamar = new Kamar();
            $kamar->nama_kamar = $request->nama_kamar;
            $kamar->deskripsi = $request->deskripsi;
            $kamar->status = $request->status;
            $kamar->nomor_telepon = $request->nomor_telepon;
            $kamar->gambar_kamar = $fileName;

            $kamar->save();

            return redirect()->route('show-kamar')->with('toast_success', 'Sukses, Kamar berhasil di tambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kamar)
    {
        $kamar = Kamar::find($id_kamar);
        return view('admin.kamar.detail-kamar', [
            "title" => 'Detail Kamar'
        ], ['kamar' => $kamar]);
        return view('admin.kamar.kamar', [
            "title" => 'Detail Kamar'
        ], ['kamar' => $kamar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kamar)
    {
        $kamar = Kamar::find($id_kamar);
        return view('admin.kamar.edit-kamar', [
            "title" => 'Update Kamar'
        ], ['kamar' => $kamar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kamar)
    {
        $request->validate([
            'nama_kamar' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'nomor_telepon' => 'required',
            'gambar_kamar'    => 'required|mimes:jpeg,png,jpg|image|max:2048'
        ]);

        $kamar = Kamar::where('id_kamar', $id_kamar)->first();
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->status = $request->status;
        $kamar->nomor_telepon = $request->nomor_telepon;

        if ($request->hasFile('gambar_kamar')) {
            $request->file('gambar_kamar')->move('image', $request->file('gambar_kamar')->getClientOriginalName());
            $kamar->gambar_kamar = $request->file('gambar_kamar')->getClientOriginalName();
            $kamar->update();
            return redirect('/show-kamar') ->with('toast_success', 'Sukses, Kamar berhasil di update');;
           

            // return redirect('/show-artikel')->with('success', 'Post created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kamar)
    {
        $delete = DB::table('kamar')->where('id_kamar', $id_kamar)->delete();
        return redirect()->route('show-kamar')->with('toast_success', 'Kamar berhasil di hapus');
    }
}
