<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Aset::Where('nama_aset', 'LIKE', '%' . $request->search . '%')->paginate(3);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Aset::paginate(3);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('dataaset', compact('data'));
    }

    public function tambahaset()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $data = Aset::create($request->all());
        // Ambil nilai harga dari form
        $harga = $request->input('harga');

        // Bersihkan nilai harga dari karakter non-numerik, hanya menyisakan angka dan titik desimal
        $harga = str_replace(['Rp ', '.', ','], '', $harga);

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoaset/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('aset')->with('success', 'Data Berhasil ditambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Aset::find($id);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Aset::find($id);

        // Update atribut lainnya kecuali 'foto'
        $data->update($request->except('foto'));
        if (session('halaman_url')) {
            return Redirect(session('halaman_url'))->with('success', 'Data Berhasil diedit');
        }

        if ($request->hasFile('new_foto')) {
            // Hapus foto lama jika ada
            if ($data->foto) {
                // Hapus foto lama dari penyimpanan (folder fotoaset)
                $fotoPath = public_path('fotoaset/') . $data->foto;
                if (file_exists($fotoPath)) {
                    unlink($fotoPath);
                }
            }

            // Simpan foto yang baru
            $newFoto = $request->file('new_foto');
            $newFotoName = $newFoto->getClientOriginalName();
            $newFoto->move('fotoaset/', $newFotoName);

            // Update atribut 'foto' dengan nama foto yang baru
            $data->foto = $newFotoName;
        }

        $data->save();

        return redirect()->route('aset')->with('success', 'Data Berhasil diedit');
    }


    public function delete($id)
    {
        $data = Aset::find($id);
        $data->delete();
        return redirect()->route('aset')->with('success', 'Data Berhasil dihapus');
    }

    public function exportpdf()
    {
        $data = Aset::all();
        view()->share('data', $data);
        $pdf = Pdf::loadView('dataaset-pdf');

        return $pdf->download('DataAset.pdf');
    }
}
