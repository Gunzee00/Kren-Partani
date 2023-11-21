<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        $gallerys = Gallery::all();
        return view('admin.gallery.index', [
            "title" => 'Gallery'
        ], compact('gallerys'));
    }

    public function getStore() {
        return view('admin.gallery.add', [
            "title" => 'Tambah Gallery'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|String|min:3',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gallery = Gallery::create([
            'title' => $request->title,
            'img' => $request->img,
        ]);

        if($request->hasFile('img')) {
            $request->file('img')->move('gallery/', $request->file('img')->getClientOriginalName());
            $gallery->title = $request->title;
            $gallery->img = $request->file('img')->getClientOriginalName();
            $gallery->save();
        }

        return redirect()->route('gallerys')->with('toast_success', 'Image has been saved');
    }

    public function getUpdate($id) {
        $updateGallery = Gallery::find($id);
        return view('admin.gallery.edit', [
            "title" => 'Update Gallery'
        ], compact('updateGallery'));
    }

    public function getUpdateProcess(Request $request, $id) {
        $request->validate([
            'title' => 'required|String|min:3',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $galleryProcess = Gallery::where('id', $id)->first();
        $galleryProcess->title = $request->title;
        if($request->hasFile('img')) {
            $request->file('img')->move('gallery/', $request->file('img')->getClientOriginalName());
            $galleryProcess->img = $request->file('img')->getClientOriginalName();
        }
        $galleryProcess->update();

        return redirect()->route('gallerys')->with('toast_success', 'Data has been updated');
    }

    public function deleteGallery($id) {
        $deleteGallery = Gallery::find($id);
        $deleteGallery->delete();
        return redirect()->route('gallerys')->with('toast_success', 'Data has been deleted');
    }

    public function userGallery() {
        $dataGallery = Gallery::all();
        return view('user.gambar', compact('dataGallery'));
    }
}
