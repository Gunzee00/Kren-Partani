<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function index()
    {
        return view('admin.AboutUs.index', [
            'aboutuss' => AboutUs::all()
        ], [
            "title" => 'About Us'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AboutUs.add', [
            "title" => "Add About Us"
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutus = AboutUs::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $request->gambar,
        ]);

        if($request->hasFile('gambar')) {
            $request->file('gambar')->move('aboutusimage/', $request->file('gambar')->getClientOriginalName());
            $aboutus->gambar = $request->file('gambar')->getClientOriginalName();
            $aboutus->save();
        }

        return redirect()->route('aboutus')->with('toast_success', 'Data berhasil ditambahkan');
    }
        
    public function edit($id) {
        $dataAboutUsUpdate = AboutUs::find($id);
        return view('admin.AboutUs.edit', [
            "title" => "Edit About Us"
        ], compact('dataAboutUsUpdate'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('gambar')) {
            $destinationPath = 'aboutusimage/'; // upload path
            $aboutusimage = date('YmdHis') . "." . $files->getClientOriginalName();
            $files->move($destinationPath, $aboutusimage);
            $update['gambar'] = "$aboutusimage";
            }
            $update['judul'] = $request->get('judul');
            $update['deskripsi'] = $request->get('deskripsi');
            AboutUs::where('id',$id)->update($update);
        return redirect()->route('aboutus')->with('toast_success','Sukses meng-update about us');
    }

    public function destroy($id)
    {
        $aboutus = AboutUs::find($id);
        $aboutus->delete();
        return redirect('aboutus')->with('toast_success', 'Data berhasil dihapus');
    }

    public function indexuser()
    {   
        $aboutUsUser = AboutUs::all()->sortByDesc('updated_at');
        return view('user.AboutUs.index', compact('aboutUsUser'));
        
    }

}
