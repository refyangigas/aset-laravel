<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Aset</title>
    @include('include.style')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar -->
                @include('include.sidebar')
            </div>
            <div class="col-md-6 offset-md-1">
                <!-- Form -->
                <h1 class="text-center mb-5 mt-5">Edit Data Aset</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputNomorSeri" class="form-label">Nomor Seri</label>
                                    <input type="text" name="nomor_seri" class="form-control"
                                        id="exampleInputNomorSeri" aria-describedby="emailHelp"
                                        value="{{ $data->nomor_seri }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputFoto" class="form-label">Dokumentasi Aset</label>
                                    <input type="file" name="foto" class="form-control" id="exampleInputFoto"
                                        aria-describedby="emailHelp" value="{{ $data->foto }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputNama" class="form-label">Nama Aset</label>
                                    <input type="text" name="nama_aset" class="form-control" id="exampleInputNama"
                                        aria-describedby="emailHelp" value="{{ $data->nama_aset }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputJumlah" class="form-label">Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control" id="exampleInputNama"
                                        aria-describedby="emailHelp" value="{{ $data->jumlah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputLokasi" class="form-label">Lokasi</label>
                                    <select name="lokasi" class="form-control" id="exampleInputLokasi">
                                        <option value="">--Pilih Lokasi--</option>
                                        @foreach ($lokasi as $l)
                                            <option value="{{ $l->id }}">{{ $l->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputKategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="kategori" aria-label="Default select example">
                                        <option selected>{{ $data->kategori }}</option>
                                        <option value="1">Perabotan</option>
                                        <option value="2">Elektronik</option>
                                        <option value="3">Perlengkapan</option>
                                        <option value="4">Transportasi</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputTahun" class="form-label">Tahun</label>
                                    <input type="text" name="tahun" class="form-control" id="exampleInputTahun"
                                        aria-describedby="emailHelp" placeholder="contoh:2003"
                                        value="{{ $data->tahun }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUmur" class="form-label">Umur</label>
                                    <input type="text" name="umur" class="form-control" id="exampleInputUmur"
                                        aria-describedby="emailHelp" placeholder="contoh:10"
                                        value="{{ $data->umur }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputHarga" class="form-label">Harga</label>
                                    <input type="text" name="harga" class="form-control" id="exampleInputHarga"
                                        aria-describedby="emailHelp" placeholder="contoh:9000"
                                        value="{{ $data->harga }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputStatus" class="form-label">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option selected>{{ $data->status }}</option>
                                        <option value="1">Aktif</option>
                                        <option value="2">Non-Aktif</option>
                                        <option value="3">Rusak</option>
                                        <option value="4">Perbaikan</option>
                                        <option value="5">Disewakan</option>
                                        <option value="6">Pemindahtanganan</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('include.footer')
    @include('include.script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let successMessage = '{{ session('success') }}';
            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: successMessage,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/aset";
                    }
                });
            }
        });
    </script>
</body>


</html>
