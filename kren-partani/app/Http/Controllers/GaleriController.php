<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = galeri::all();
        $galeri = galeri::paginate(6); // 
        return view('admin.galeri.galeri', [
            "title" => 'Galeri'
        ], compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.galeri', [
            "title" => 'Tambah Galeri'
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
        if ($request->hasFile('gambar_galeri')) {
            $request->validate([
                'judul_galeri' => 'required',
                'deskripsi_galeri' => 'required',
                'gambar_galeri'    => 'required|image|mimes:jpeg,png,jpg|max:5000'
            ]);
            $fileName = time() . '.' . $request->gambar_galeri->extension();
            $request->gambar_galeri->move(public_path('image'), $fileName);

            $galeri = new galeri();
            $galeri->judul_galeri = $request->judul_galeri;
            $galeri->deskripsi_galeri = $request->deskripsi_galeri;
            $galeri->gambar_galeri = $fileName;

            $galeri->save();

            return redirect()->route('show-galeri');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_galeri)
    {
        $galeri = galeri::find($id_galeri);
        return view('admin.galeri.detail-galeri', [
            "title" => 'Ubah Galeri'
        ], ['galeri' => $galeri]);
        return view('admin.galeri.galeri', [
            "title" => 'Ubah Galeri'
        ], ['galeri' => $galeri]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_galeri)
    {
        $galeri = galeri::find($id_galeri);
        return view('admin.galeri.edit-galeri', [
            "title" => 'Ubah Galeri'
        ], ['galeri' => $galeri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_galeri)
    {
        $request->validate([
            'judul_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'gambar_galeri'    => 'required|mimes:jpeg,png,jpg|image|max:2048'
        ]);

        $galeri = galeri::where('id_galeri', $id_galeri)->first();
        $galeri->judul_galeri = $request->judul_galeri;
        $galeri->deskripsi_galeri = $request->deskripsi_galeri;

        if ($request->hasFile('gambar_galeri')) {
            $request->file('gambar_galeri')->move('image', $request->file('gambar_galeri')->getClientOriginalName());
            $galeri->gambar_galeri = $request->file('gambar_galeri')->getClientOriginalName();
            $galeri->update();

            return redirect('/show-galeri');

            // return redirect('/show-artikel')->with('success', 'Post created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_galeri)
    {
        $delete = DB::table('galeri')->where('id_galeri', $id_galeri)->delete();
        return redirect()->route('show-galeri');
    }
}
