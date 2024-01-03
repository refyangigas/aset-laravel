<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Aset::with("lokasi")->Where('nama_aset', 'LIKE', '%' . $request->search . '%')->paginate(10);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Aset::with("lokasi")->paginate(10);
            Session::put('halaman_url', request()->fullUrl());
        }
        $totalharga = Aset::sum('harga');
        $totalaset = Aset::sum('jumlah');
        return view('dataaset', compact('data', "totalharga", "totalaset"));
    }

    public function tambahaset()
    {
        $lokasi = Lokasi::all();
        return view('tambahdata', compact("lokasi"));
    }

    public function insertdata(Request $request)
    {
        // Dapatkan semua data dari form
        $data = $request->all();

        // Bersihkan nilai harga dari karakter non-numerik, hanya menyisakan angka dan titik desimal
        $harga = str_replace(['Rp ', '.', ','], '', $data['harga']);

        // Ubah nilai harga ke dalam format numerik
        $data['harga'] = (float) $harga;

        // Disarankan untuk menambahkan nilai lokasi_id ke data yang akan disimpan
        // Sesuaikan ini dengan logika aplikasi Anda untuk menentukan nilai lokasi_id
        $data['lokasi_id'] = $request->input('lokasi'); // Ini contoh, pastikan nilai ini valid

        // Buat data aset baru dengan data yang sudah dimodifikasi
        $newAset = Aset::create($data);

        // Proses penyimpanan foto jika ada
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoaset/', $request->file('foto')->getClientOriginalName());
            $newAset->foto = $request->file('foto')->getClientOriginalName();
            $newAset->save();
        }

        return redirect()->route('tambahaset')->with('success', 'Data Berhasil ditambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Aset::find($id);
        $lokasi = Lokasi::all();
        return view('tampildata', compact('data', 'lokasi'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Aset::find($id);

        // Update atribut lainnya kecuali 'foto'
        $data->update($request->except('foto'));

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

        return redirect()->route('tampilkandata', ['id' => $id])->with('success', 'Data Berhasil diedit');
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
