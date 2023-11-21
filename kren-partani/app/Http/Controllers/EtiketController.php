<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Tiket;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;

class EtiketController extends Controller
{
    // public function index($id)
    // {
    //     $tiket = Tiket::where('id', $id)->first();
    //     $jumlah = PesananDetail::all();
    //     return view('user.pesan.index', [
    //         "title" => 'Pemesanan Menu'
    //     ], compact('tiket', 'jumlah'));
    // }

    public function orderDetails()
    {
        $dataOrders = Pesanan::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.orders', [
            "title" => 'Data Pemesanan'
        ], compact('dataOrders'));
    }
}
