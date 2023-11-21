<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use App\Models\User;
use App\Models\Barang;
use App\Models\Artikel;
use App\Models\Pesanan;
use App\Models\Contactus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $dataCustomers = User::all()->where('usertype', 0);
        $artikel = Artikel::latest()->take(3)->get();

        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home', [
                "title" => "Dashboard"
            ]);
        } elseif ($usertype == '2') {
            return view('admin.home', [
                "title" => "Dashboard"
            ]);
        } else {
            return view('user.home',compact('artikel'));
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
            ->diffForHumans();
    }


    public function userManagement(Request $request)
    {
        if ($request->has('search')) {
            $dataUser = User::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $dataUser = User::orderBy('created_at', 'desc')
                ->where('usertype', 1)
                ->orWhere('usertype', 0)
                ->paginate(10);
        }
        return view('admin.user-management', [
            "title" => 'User Management | User'
        ], compact('dataUser'));
    }

    public function delete($id)
    {
        $roleUser = User::find($id);
        $roleUser->delete();
        return redirect()->route('user.role')->with('success', 'Data berhasil dinonaktifkan');
    }

    public function trash()
    {
        $trashesUser = User::onlyTrashed()->paginate(10);
        return view('admin.restore-user', [
            "title" => 'Restore User'
        ], compact('trashesUser'));
    }

    public function restore($id)
    {
        $restoreUser = User::onlyTrashed()->where('id', $id);
        $restoreUser->restore();
        return redirect()->back()->with('toast_success', 'Data berhasil di Aktifkan kembali');
    }

    public function restoreAll()
    {
        $restoreAll = User::onlyTrashed();
        $restoreAll->restore();
        return redirect()->back()->with('toast_success', 'Semua data berhasil di Aktifkan');
    }

    // public function trashAdmin() {
    //     $trashesAdmin = User::onlyTrashed()->paginate(10);
    //     return view('admin.restore.restore-admin', [
    //         "title" => 'Restore Admin'
    //     ], compact('trashesUser'));
    // }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }

    public function useragen()
    {
        $data = agen::all();
        return view('agen', [
            "title" => 'Agen & Pelayan'
        ], compact('data'));
    }

    public function viewagen()
    {
        $data = agen::all();
        return view('admin.agen.index', [
            "title" => 'Agen & Pelayan'
        ], compact('data'));
    }

    public function uploadagen(Request $request)
    {
        $request->validate([
            'name' => 'required|String|min:3|max:50',
            'speciality' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $dataAgen = Agen::create([
            'name' => $request->name,
            'speciality' => $request->speciality,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'image' => $request->image,
        ]);

        if ($request->hasFile('image')) {
            $request->file('image')->move('agenimage/', $request->file('image')->getClientOriginalName());
            $dataAgen->image = $request->file('image')->getClientOriginalName();
            $dataAgen->save();
        }

        return redirect('/viewagen')->with('success', 'Berhasil Menambahkan');
    }

    public function updateagen($id)
    {
        $data = agen::find($id);

        return view('admin.agen.updateagen', [
            "title" => 'Update Agen & Pelayan'
        ], compact('data'));
    }


    // Class editagen
    public function editagen(Request $request, $id)
    {
        $data = agen::find($id);

        $image = $request->image;

        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('agenimage', $imagename);

            $data->image = $imagename;
        }

        $data->name = $request->name;

        $data->speciality = $request->speciality;

        $data->facebook = $request->facebook;

        $data->instagram = $request->instagram;

        $data->twitter = $request->twitter;

        $data->save();

        return redirect('viewagen')->with('success', 'Profil Berhasil di update');
    }

    public function addagen()
    {
        return view('admin.agen.add', [
            "title" => "Tambah Agen & Pelayan"
        ]);
    }

    // Class deleteagen
    public function deleteagen($id)
    {
        $data = agen::find($id);

        $data->delete();

        return redirect('viewagen')->with('success', 'Berhasil Menghapus Orang');
    }

    // Class     contact
    public function contact()
    {
        return view('contactus', [
            "title" => 'Contact Us'
        ]);
    }

    // class reservation
    public function reservation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;

        $reservation->save();
        return redirect()->route('reservation')->with('toast_success', 'Your data has been saved');
    }

    // class viewreservation
    public function viewreservation()
    {
        $data = reservation::all();

        return view('admin.viewreservation', [
            "title" => "Reservation"
        ], compact('data'));
    }

    public function Editupload($id)
    {
        $dataPesan = Pesanan::find($id);
        return view('user.edit-upload', [
            "title" => 'Edit Bukti Pembayaran'
        ], compact('dataPesan'));
    }

    public function Edituploadprocess(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required',
        ]);

        $dataPesanan = Pesanan::where('id', $id)->first();

        if ($request->hasFile('bukti_pembayaran')) {
            $request->file('bukti_pembayaran')->move('productimage/', $request->file('bukti_pembayaran')->getClientOriginalName());
            $dataPesanan->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $dataPesanan->status = 2;
            $dataPesanan->update();
        }

        return redirect()->route('history.detail')->with('toast_success', 'Gambar sudah berhasil dikirim');
    }
    public function upload($id)
    {
        $dataPesan = Pesanan::find($id);
        return view('user.upload', [
            "title" => 'Upload Bukti Pembayaran'
        ], compact('dataPesan'));
    }


    public function uploadProcess(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'bukti_pembayaran' => 'required',
        ]);

        $dataPesanan = Pesanan::where('id', $id)->first();

        if ($request->hasFile('bukti_pembayaran')) {
            $request->file('bukti_pembayaran')->move('productimage/', $request->file('bukti_pembayaran')->getClientOriginalName());
            $dataPesanan->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $dataPesanan->status = 2;
            $dataPesanan->update();
        }

        return redirect()->route('history.detail')->with('toast_success', 'Gambar sudah berhasil dikirim');
    }

    public function contactus()
    {
        return view('user.contact-us');
    }

    public function contactUsProcess(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:3'
        ]);

        $contact = Contactus::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $contact->save();
        return view('user.thank-you');
    }

    public function contactUsAdmin()
    {
        $dataContact = Contactus::paginate(10);
        return view('admin.contact-us', [
            "title" => 'Contact Us'
        ], compact('dataContact'));
    }
    //artikel di home page

    public function indexhome()
    {
        $artikel = Artikel::latest()->take(3)->get();
        return view('user.home', compact('artikel'));
    }
    
}
