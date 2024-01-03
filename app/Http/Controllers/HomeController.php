<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $totalharga = Aset::sum('harga');
        return view('home', compact("totalharga"));
    }
}
