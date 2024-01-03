@extends('dashboard.dashboard')
<title>Data Aset</title>

@section('content')
    <h3>Data Aset</h3>
    <div class="container">
        <div class="row g-3 align-items-center mt-1 mb-3">
            <div class="col-auto">
                <a href="/tambahaset" class="btn btn-success">Tambah+</a>
            </div>
            <div class="col-auto">
                <form action="/aset" method="GET">
                    <div class="input-group">
                        <input type="search" id="inputSearch" name="search" class="form-control" aria-describedby="Search"
                            placeholder="Search">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-auto">
                <a href="/exportpdf" class="btn btn-primary">Export PDF</a>
            </div>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Seri</th>
                        <th scope="col">Dokumentasi Aset</th>
                        <th scope="col">Nama Aset</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->nomor_seri }}</td>

                            <td>
                                <img src="{{ asset('fotoaset/'.$row->foto)}}" alt="" style="width:50px;">
                                {{-- <img src="{{ $row->foto }}" alt="" style="width:50px;"> --}}
                            </td>
                            <td>{{ $row->nama_aset }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>{{ $row->lokasi->nama }}</td>
                            <td>{{ $row->kategori }}</td>
                            <td>{{ $row->tahun }}</td>
                            <td>{{ $row->umur }}</td>
                            <td>Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="/tampilkandata/{{ $row->id }}" type="button"
                                    class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-nama="{{ $row->nama_aset }}">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>

    @include('include.script')
    <script>
        $('#inputSearch').keyup(function() {
            var query = $(this).val()
                .toLowerCase(); // Mendapatkan nilai dari input pencarian dan konversi ke lower case
            $('tbody tr').filter(function() {
                // Melakukan filter pada setiap baris tabel
                $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
            });
        });
    </script>
    <script>
<script>
    $('.delete').click(function(event) {
        event.preventDefault(); // Mencegah tindakan default dari link

        var asetid = $(this).data('id'); // Menggunakan data() untuk mendapatkan nilai data-id
        var nama = $(this).data('nama'); // Menggunakan data() untuk mendapatkan nilai data-nama

        Swal.fire({
            title: "Yakin?",
            text: "Kamu akan menghapus aset dengan nama " + nama + " ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan permintaan penghapusan ke backend
                $.ajax({
                    method: 'GET',
                    url: '/delete/' + asetid,
                    success: function(response) {
                        // Tampilkan pesan sukses
                        Swal.fire("Data berhasil dihapus", {
                            icon: "success",
                        }).then(() => {
                            // Muat ulang halaman setelah penghapusan
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan kesalahan jika permintaan gagal
                        Swal.fire("Terjadi kesalahan", "Data tidak terhapus", "error");
                    }
                });
            }
        });
    });
</script>
<script>
    $('.delete').click(function(event) {
        event.preventDefault(); // Mencegah tindakan default dari link

        var asetid = $(this).data('id'); // Menggunakan data() untuk mendapatkan nilai data-id
        var nama = $(this).data('nama'); // Menggunakan data() untuk mendapatkan nilai data-nama

        Swal.fire({
            title: "Yakin?",
            text: "Kamu akan menghapus aset dengan nama " + nama + " ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                // Lakukan permintaan penghapusan ke backend
                $.ajax({
                    method: 'GET',
                    url: '/delete/' + asetid,
                    success: function(response) {
                        // Tampilkan pesan sukses
                        Swal.fire("Data berhasil dihapus", {
                            icon: "success",
                        }).then(() => {
                            // Muat ulang halaman setelah penghapusan
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan kesalahan jika permintaan gagal
                        Swal.fire("Terjadi kesalahan", "Data tidak terhapus", "error");
                    }
                });
            }
        });
    });
</script>
    </script>
@endsection
