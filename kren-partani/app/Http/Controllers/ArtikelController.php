<?php

namespace App\Http\Controllers;


use App\Models\Artikel;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $artikel = Artikel::all();
        $artikel = Artikel::paginate(3); // 
        return view('admin.artikel.artikel', [
            "title" => 'Artikel'
        ], compact('artikel'));
    }


    public function create()
    {
        return view('admin.artikel.add-artikel', [
            "title" => 'Tambah Artikel'
        ]);
    }


    public function store(Request $request)
    {
        // return $request->file('image')->store('artikel-images');    //     $request->file('gambar')->move('image/', $request->file('gambar')->getClientOriginalName());
        //     $artikel->gambar = $request->file('gambar')->getClientOriginalName();
        //     $artikel->save();

        //     return redirect()->route('articles.artikel')->with('success', 'Artikel berhasil ditambahkan!');
        // }


        if ($request->hasFile('gambar')) {
            $request->validate([
                'judul_artikel' => 'required',
                'deskripsi' => 'required',
                'gambar'    => 'required|mimes:jpeg,png,jpg|image|max:2048'
            ]);
            $fileName = time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('image'), $fileName);


            $artikel = new Artikel();

            $artikel->judul_artikel = $request->judul_artikel;
            $artikel->deskripsi = $request->deskripsi;
            $artikel->gambar = $fileName;

            $artikel->save();

            return redirect('/show-artikel')->with('success', 'Artikel created successfully.');
        }

        // {
        //     $request->validate([
        //         'judul_artikel' => 'required',
        //         'deskripsi' => 'required',
        //         'gambar'    => 'required|mimes:jpeg,png,jpg|image|max:2048'
        //     ]);
        //     $artikel = new Artikel();
        //     $artikel->judul_artikel = $request->judul_artikel;
        //     $artikel->deskripsi = $request->deskripsi;
        //     $artikel->gambar = $request->gambar;
        //     if ($request->hasFile('image')) {
        //         $image = $request->file('image');
        //         $imageName = time() . '.' . $request->gambar->getClientOriginalExtension();
        //         $path = storage_path("app/public/image");
        //         $image->move($path, $imageName);
        //         $artikel->image = $imageName;
        //     }
        //     $artikel->save();

        //     // Session::flash('success','Partner logo is successfully saved');
        //     return redirect('/show-artikel')->with('success', 'Artikel created successfully.');
        // }



        // $artikel = Artikel::create([
        //     'judul_artikel' => $request->judul_artikel,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $request->gambar,
        // ]);




        // $request->validate([
        //     'judul_artikel' => 'required',
        //     'deskripsi' => 'required',
        //     'gambar' => 'required',
        // ]);

        // Artikel::create([
        //     'judul_artikel' => $request->input('judul_artikel'),
        //     'deskripsi' => $request->input('deskripsi'),
        //     'gambar' => $request->input('gambar'),
        // ]);

        // return redirect()->route('articles.artikel')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Artikel $id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        return view('admin.artikel.detail-artikel', [
            "title" => 'Ubah Artikel'
        ], ['artikel' => $artikel]);
        return view('admin.artikel.artikel', [
            "title" => 'Ubah Artikel'
        ], ['artikel' => $artikel]);
    }

    public function edit($id_artikel)
    {

        $artikel = Artikel::find($id_artikel);
        return view('admin.artikel.edit-artikel', [
            "title" => 'Ubah Artikel'
        ], ['artikel' => $artikel]);
    }

    // public function update(Request $request, $id_artikel)
    // {
    //     $request->validate([
    //         'judul_artikel' => 'required',
    //         'deskripsi' => 'required',
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000'
    //     ]);
    //     $artikel = Artikel::find(1);
    //     if ($request->has('image')) {
    //         $path = 'image/';

    //         File::delete($path . $artikel->gambar);

    //         $fileName = time() . '.' . $request->gambar->extension();
    //         $request->gambar->move(publicw_path('image'), $fileName);

    //         $artikel->gambar = $fileName;
    //         $artikel->save();
    //     }
    //     $artikel->judul_artikle = $request('judul_artikel');
    //     $artikel->deskripsi = $request('deskripsi');
    //     $artikel->gambar = $request('gambar');
    //     $artikel->save();



    //     return redirect('/artikel');
    // }

    public function update(Request $request, $id_artikel)
    {
        $request->validate([

            'judul_artikel' => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'required|mimes:jpeg,png,jpg|image|max:2048'
        ]);

        $artikel = Artikel::where('id_artikel', $id_artikel)->first();
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('image', $request->file('gambar')->getClientOriginalName());
            $artikel->gambar = $request->file('gambar')->getClientOriginalName();
            $artikel->update();
            return redirect('/show-artikel');
        }
        // $request->validate([
        //     'judul_artikel' => 'required',
        //     'deskripsi' => 'required',
        //     'id_artikel' => 'required',
        //     'gambar'    => 'required|image|mimes:jpeg,png,jpg'
        // ]);

        // $artikel = Artikel::find($id_artikel);
        // if ($request->has('gambar')) {
        //     $path = 'image/';
        //     Storage::delete($path . $artikel->gambar);
        //     $fileName = time() . '.' . $request->gambar->extension();
        //     $request->gambar->move(public_path('image'), $fileName);
        //     $artikel->gambar = $fileName;
        //     $artikel->save();
        // }
        // $artikel->judul_artikel = $request->judul_artikel;
        // $artikel->gambar = $request->gambar;
        // $artikel->deskripsi = $request->deskripsi;
        // $artikel->id_artikel = $request->id_artikel;
        // $artikel->save();

        // return redirect('/show-artikel');


        // return redirect('/show-artikel')->with('success', 'Artikel created successfully.');
    }

    public function destroy($id_artikel)
    {

        $delete = DB::table('artikel')->where('id_artikel', $id_artikel)->delete();
        return redirect('/show-artikel')->with('success', 'Artikel berhasil di hapus.');
    }
}
