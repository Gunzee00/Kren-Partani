<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Review;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function index() {
        $reviewer = Review::all();
        return view('user.review', [
            "title" => 'Review'
        ], compact('reviewer'));
    }

    public function store($id) {
        $feedback = Pesanan::where('id', $id)->first();
        return view('user.feedback', [
            "title" => 'Berikan Ulasan'
        ], compact('feedback'));
    }

    public function reviewAdmin() {
        $adminReview = Review::paginate(10);
        return view('admin.review', [
            "title" => 'Review'
        ], compact('adminReview'));
    }

    public function deleteReviewAdmin($id) {
        $deleted = Review::find($id);
        $deleted->delete();
        return back()->with('toast_success', 'Review has beed deleted');
    }

    public function mendapatkan(Request $request, $id) {
        $request->validate([
                    'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                    'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm',
                    'review' => 'required|String|min:3'
                ]);
        $pesanan = Pesanan::find($id);
        $tiket = Tiket::find($id);
        $review = new Review();
        $review->pesanan_id = $pesanan->id;
        $review->user_id = Auth::user()->id;
        $review->tiket_id = $request->tiket_id;
        $review->review = $request->review;
        if($request->hasFile('img2')) {
            $request->file('img2')->move('productimage/', $request->file('img2')->getClientOriginalName());
            $review->img2 = $request->file('img2')->getClientOriginalName();
        }
        if($request->hasFile('video')) {
            $request->file('video')->move('upload/', $request->file('video')->getClientOriginalName());
            $review->video = $request->file('video')->getClientOriginalName();
        }
        $pesanan->status = 6;
        $pesanan->update();
        $review->save();
        return redirect()->route('review')->with('toast_success', 'Your review has been saved');
    }
}
