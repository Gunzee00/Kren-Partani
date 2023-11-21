<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailMenuController extends Controller
{
    public function detailbandrek()
    {
        return view('user.detailmenu.bandrek',[
            "title" => 'Informasi Menu'
        ]);
    }
}
