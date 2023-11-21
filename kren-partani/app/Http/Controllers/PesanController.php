<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Tiket;
use App\Models\Pesanan;
use PDF;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $tiket = Tiket::where('id', $id)->first();
        $jumlah = PesananDetail::all();
        return view('user.pesan.index', [
            "title" => 'Pemesanan Menu'
        ], compact('tiket', 'jumlah'));
    }


    public function pesan(Request $request, $id)
    {
        $request->input();
        $tiket     = Tiket::where('id', $id)->first();
        $tanggal_pemesanan    = Carbon::now();

        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek order detail

        // Validate whether it exceeds the stock quantity
        if ($request->jumlah_pesan > $tiket->stok) {
            return redirect('pesan/' . $id)->with('toast_error', 'Anda sudah melebihi batas stok');
        } elseif (!empty($cek_pesanan)) {
            $cek_pesanan_detail   = PesananDetail::where('tiket_id', $tiket->id)->where('pesanan_id', $cek_pesanan->id)->first();
            if (!empty($cek_pesanan_detail)) {
                if ($request->jumlah_pesan + $cek_pesanan_detail->jumlah > $tiket->stok) {
                    return redirect()->back()->with('toast_info', 'Stok yang ada dipesanan anda, sudah melebihi stok yang tersedia. Silahkan cek kerangjang anda!');
                }
            }
        }

        // Cek Validation
        $cek_order = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // Save to database pesanan
        if (empty($cek_order)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal_pemesanan = $tanggal_pemesanan;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(1000, 9999);
            $pesanan->tanggal_tiket = $request->tanggal_tiket;
            $pesanan->tiket_id = $tiket->id;
            $pesanan->jumlah_pesan = $request->jumlah_pesan;
            // $pesanan->gambar = $request->gambar;
            // $pesanan->jenis_tiket = $request->jenis_tiket;
            $pesanan->save();
        }

        // Save to database pesanan_detail

        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek order detail
        $cek_pesanan_detail   = PesananDetail::where('tiket_id', $tiket->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->tiket_id = $tiket->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $tiket->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail   = PesananDetail::where('tiket_id', $tiket->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah         = $pesanan_detail->jumlah + $request->jumlah_pesan;

            // Harga sekarang
            $harga_pesanan_detail_baru      = $tiket->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga   = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        // total number
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $tiket->harga * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('checkout')->with('toast_success', 'Berhasil Menambah Keranjang');
    }

    //detail pemesanan user

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        // return view('admin.orders-detail', [
        //     "title" => 'Pesanan | Detail Pemesanan',
        // ], compact('pesanan', 'pesanan_details'));
        // $pesanan_details = PesananDetail::find($id);
        $pdf = PDF::loadView('admin.orders-detail', ['pesanan_details' => $pesanan_details]);

        // $pdf = PDF::loadView('pdf.invoice', $pesanan_details);

        return $pdf->download('tiket.pdf');
    }


    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if (!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('user.pesan.checkout', [
            "title" => 'Check Out'
        ], compact('pesanan', 'pesanan_details',));
    }

    public function delete($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        // Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('checkout')->with('toast_error', 'Berhasil Menghapus dari keranjang');;
    }



    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        //konfirmasi kian
        // if (empty($user->alamat)) {
        //     return redirect('profile')->with('toast_error', 'Lengkapi Alamat Anda');
        // }

        // if (empty($user->nohp)) {
        //     return redirect('profile')->with('toast_error', 'Lengkapi No Hp Anda');
        // }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $tiket = Tiket::where('id', $pesanan_detail->tiket_id)->first();
            $tiket->stok = $tiket->stok - $pesanan_detail->jumlah;
            $tiket->update();
        }


        return redirect('history/' . $pesanan_id)->with('success', 'CheckOut berhasil silahkan lakukan pembayaran');
    }

    public function orderDetails()
    {
        $dataOrders = Pesanan::orderBy('updated_at', 'desc')->where('status', 2)->paginate(10);
        return view('admin.orders', [
            "title" => 'Data Pemesanan'
        ], compact('dataOrders'));
    }

    //download pdf

    public function downloadPDF($id)
    {
        // $pesanan = Pesanan::find($id);
        // $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        // return $pesanan_details;

        // $pdf = new Dompdf();
        // $html = view('pdf.invoice', [
        //     "title" => 'Pesanan | Detail Pemesanan',
        // ], compact('pesanan', 'pesanan_details'))->render();

        // $pdf->loadHtml($html);
        // $pdf->setPaper('A4', 'portrait');
        // $pdf->render();
        // return $pdf->stream();

        // $pdf = PDF::loadview('pdf.invoice', ['pegawai' => $pegawai]);
        // return $pdf->download('laporan-pegawai-pdf');
        // $pesanan_details = PesananDetail::where('pesanan_id', $id)->first();
        // $pdf = PDF::loadView('pdf.invoice', ['pesanan_details' => $pesanan_details]);
        // return $pdf->download('pdf.invoice');

        $pesanan_details = PesananDetail::find($id);
        $pdf = PDF::loadView('pdf.invoice', ['pesanan_details' => $pesanan_details]);

        // $pdf = PDF::loadView('pdf.invoice', $pesanan_details);

        return $pdf->download('test.pdf');
    }


    public function confirmOrdersProcess($id)
    {
        $dataConfirmProcess = Pesanan::where('id', $id)->first();
        $dataConfirmProcess->status = 3;
        $dataConfirmProcess->update();
        return redirect()->route('oder.deatail')->with('toast_success', 'Pesanan berhasil di konfirmasi');
    }
    //menolak pemesanan
    public function rejectOrderProcess($id)
    {
        $dataRejectProcess = Pesanan::where('id', $id)->first();
        $dataRejectProcess->status = 6;
        // return $dataRejectProcess;
        $dataRejectProcess->update();
        return redirect()->route('oder.deatail')->with('toast_success', 'Pesanan berhasil di tolak');
    }
    public function orderResult(Request $request)
    {
        if ($request->has('search')) {
            $dataResult = Pesanan::where('kode', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $dataResult = Pesanan::orderBy('created_at', 'desc')->where('status', 5)->paginate(10);
        }
        return view('admin.order-result', [
            "title" => 'Pemesanan Selesai'
        ], compact('dataResult'));
    }

    public function orderResultUpload($id)
    {
        $orderResultUpload = Pesanan::find($id);
        return view('admin.order-upload-result', [
            "title" => 'Hasil Upload Gambar'
        ], compact('orderResultUpload'));
    }

    public function resultFile($id)
    {
        $dataResultFile = Pesanan::find($id);
        return view('admin.result-file', [
            "title" => 'Hasil File'
        ], compact('dataResultFile'));
    }

    public function confirmPhoto()
    {
        $dataConfirmPhoto = Pesanan::where('status', '3')->paginate(10);
        return view('admin.confirm-photo', [
            'title' => 'Confirm Photo'
        ], compact('dataConfirmPhoto'));
    }

    public function confirmPhotoProcess(Request $request, $id)
    {
        $request->validate([
            'img' => 'required'
            // 'pdf.*' => 'required|pdf|mimes:pdf|max:3048'
        ]);

        $dataConfirmPhotoProcess = Pesanan::where('id', $id)->first();

        if ($request->hasFile('img')) {
            $images = $request->file('img');
            foreach ($images as $image) {
                $filename = $image->getClientOriginalName();
                $image->move('pdf/', $filename);
                $dataConfirmPhotoProcess->penjualan_tiket()->create(['gambar_penjualan' => $filename]);
            }

            $dataConfirmPhotoProcess->status = 4;
            $dataConfirmPhotoProcess->save();
        }

        return redirect()->route('confirm.photo')->with('toast_success', 'Tiket berhasil di kirimkan');
    }
}

    // public function tracking()
    // {
    //     $dataTracking = Pesanan::where('status', '4')->paginate(10);
    //     return view('admin.tracking', [
    //         "title" => 'Tracking'
    //     ], compact('dataTracking'));
    // }

    // public function formTracking($id)
    // {
    //     $dataFormTracking = Pesanan::find($id);
    //     return view('admin.form-tracking', [
    //         "title" => 'Form Tracking'
    //     ], compact('dataFormTracking'));
    // }

    // public function formTrackingProcess(Request $request, $id)
    // {
    //     // return $request;
    //     // dd($request->all());
    //     $request->validate([
    //         'nama_pengirim' => 'required',
    //         'tlpn' => 'required',
    //         'angkutan' => 'required',
    //         'jenis' => 'required',
    //         'plat' => 'required',
    //         'kurir' => 'required',
    //         'resi' => 'required',
    //     ]);

    //     $formTracking = Pesanan::where('id', $id)->first();
    //     $formTracking->nama_pengirim = $request->nama_pengirim;
    //     $formTracking->tlpn = $request->tlpn;
    //     $formTracking->angkutan = $request->angkutan;
    //     $formTracking->jenis = $request->jenis;
    //     $formTracking->plat = $request->plat;
    //     $formTracking->kurir = $request->kurir;
    //     $formTracking->resi = $request->resi;
    //     $formTracking->status = 5;
    //     $formTracking->update();

    //     return redirect()->route('order.tracking')->with('toast_success', 'Data berhasil tersimpan');
    // }
