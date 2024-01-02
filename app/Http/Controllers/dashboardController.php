<?php

namespace App\Http\Controllers;

use App\Models\Aset;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $totalharga = Aset::sum('harga');
        return view('dashboard.dashboard', compact("totalharga"));
    }
}
