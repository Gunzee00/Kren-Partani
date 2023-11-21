<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function index()
    {
        $dataMenu = Tiket::paginate(4);
        return view('admin.menu.index', [
            "title" => 'Tambah Tiket'
        ], compact('dataMenu'));
    }

    public function menu()
    {
        return view('admin.menu.add', [
            "title" => "Tambah Data Menu"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_tiket' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'stok' => 'required',
            'gambar_tiket' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Tiket::create([
            'jenis_tiket' => $request->jenis_tiket,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'stok' => $request->stok,
            'gambar_tiket' => $request->gambar_tiket,
        ]);

        if ($request->hasFile('gambar_tiket')) {
            $request->file('gambar_tiket')->move('productimage/', $request->file('gambar_tiket')->getClientOriginalName());
            $menu->gambar_tiket = $request->file('gambar_tiket')->getClientOriginalName();
            $menu->save();
        }

        return redirect()->route('menu')->with('toast_success', 'Sukses, Tiket berhasil ditambahkan');
    }

    public function getUpdate($id)
    {
        $dataMenuUpdate = Tiket::find($id);
        return view('admin.menu.edit', [
            "title" => 'Edit Data Menu'
        ], compact('dataMenuUpdate'));
    }


    //update yang lama
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_tiket' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'stok' => 'required',
        ]);
        $update = ['jenis_tiket' => $request->jenis_tiket, 'harga' => $request->harga, 'keterangan' => $request->keterangan, 'stok' => $request->stok];
        if ($files = $request->file('gambar_tiket')) {
            $destinationPath = 'productimage/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalName();
            $files->move($destinationPath, $profileImage);
            $update['gambar_tiket'] = "$profileImage";
        }
        $update['jenis_tiket'] = $request->get('jenis_tiket');
        $update['harga'] = $request->get('harga');
        $update['keterangan'] = $request->get('keterangan');
        $update['stok'] = $request->get('stok');
        Tiket::where('id', $id)->update($update);
        return Redirect::to('menu')
            ->with('toast_success', 'Sukses, Tiket berhasil di update');
    }


    //delete yang lama
    // public function delete($id)
    // {
    //     $data = Tiket::find($id);
    //     $data->delete();
    //     return redirect()->route('menu')->with('toast_success', 'Tiket berhasil dihapus');
    // }

    public function delete($id)
{
    $tiket = Tiket::find($id);

    // Cek apakah tiket sudah digunakan dalam pesanan
    $pesananDetail = PesananDetail::where('tiket_id', $id)->first();
    if ($pesananDetail) {
        return redirect()->route('menu')->with('toast_error', 'Tiket tidak dapat dihapus karena sudah digunakan dalam pesanan.');
    }

    $tiket->delete();

    return redirect()->route('menu')->with('toast_success', 'Tiket berhasil dihapus');
}

    public function menuUser()
    {
        $dataMenu = Tiket::all();
       
        $kamar = Kamar::all();
        
        return view('user.menu', [
            "title" => 'List Menu'
        ], compact('dataMenu','kamar'));
    }

    public function show($id_kamar)
    {
        $kamar = Kamar::find($id_kamar);
        return view('user.detail-kamar', [
            "title" => 'Detail Kamar'
        ], ['kamar' => $kamar]);
        return view('admin.kamar.kamar', [
            "title" => 'Detail Kamar'
        ], ['kamar' => $kamar]);
    }
  
//     $kamar = Kamar::find($id_kamar);
//     return view('user.detail-kamar', [
//         "title" => 'Lihat Kamar',
//     ], compact('kamar'));
// }
}
