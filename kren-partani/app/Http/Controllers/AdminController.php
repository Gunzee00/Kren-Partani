<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $dataAdmin = User::paginate(10);
        return view('admin.admin.index', [
            "title" => 'User Management | Admin'
        ], compact('dataAdmin'));
    }

    public function store() {
        return view('admin.admin.add' ,[
            "title" => 'Add Admin'
        ]);
    }

    public function storeProcess(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin->usertype = 1;
        $admin->save();
        return redirect()->route('admin')->with('toast_succcess', 'Admin berhasil di tambahkan');
    }

    public function edit($id) {
        $editAdmin = User::find($id);
        return view('admin.admin.edit', [
            "title" => 'Edit Admin'
        ], compact('editAdmin'));
    }

    public function editProcess(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $editAdmin = User::where('id', $id)->first();
        $editAdmin->name = $request->name;
        $editAdmin->email = $request->email;
        $editAdmin->password = Hash::make($request->password);
        $editAdmin->update();
        return redirect()->route('admin')->with('toast_success', 'Data admin berhasil di update');
    }
    
}
