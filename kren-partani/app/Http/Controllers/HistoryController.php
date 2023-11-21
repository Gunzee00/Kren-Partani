<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;
use App\Models\PenjualanTiket;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //print pdf


    public function index()
    {
        // $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get()->sortByDesc('updated_at');
        $pesanans = Pesanan::where('user_id', Auth::user()->id)
    ->where('status', '!=', 0)
    ->orderByDesc('updated_at')
    ->paginate(5);
        // $pesanans = DB::table('pesanans')->join('photos','pesanans.id','=','photos.pesanan_id')
        // ->select('pesanans.*','photos.gambar')
        // ->get();
        // return $pesanans;
        // $pesanans = Pesanan::paginate(5);  // 
        return view('user.history.index', [
            "title" => 'Pesanan'
        ], compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        $gambar_penjualan = PenjualanTiket::where('pesanan_id', $pesanan->id)->get();

        return view('user.history.detail', [
            "title" => 'Pesanan | Detail Pemesanan'
        ], compact('pesanan', 'pesanan_details', 'gambar_penjualan'));
    }

    public function history()
    {
        $historyPesanan = DB::table('pesanans')->where('user_id', Auth::user()->id)
            ->where('status', '=', 6)
            ->orderBy('updated_at', 'desc')->paginate(10);
        return view('user.history.history', [
            "title" => 'History Pemesanan'
        ], compact('historyPesanan'));
    }

    public function historyDetail($id)
    {
        $historyPesanan = Pesanan::where('id', $id)->first();
        $historyDetailPesanan = PesananDetail::where('pesanan_id', $historyPesanan->id)->get();
        return view('user.history.detail-history', [
            "title" => 'Detail History Pemesanan'
        ], compact('historyPesanan', 'historyDetailPesanan'));
    }
}
