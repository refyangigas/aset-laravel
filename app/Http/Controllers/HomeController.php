<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $totalharga = Aset::sum('harga');
        $totalaset = Aset::sum('jumlah');
        $asetByYear = Aset::selectRaw('tahun, COUNT(*) as jumlah_aset')
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')
            ->get();
        return view('home', compact("totalharga", "asetByYear", "totalaset"));
    }
}
