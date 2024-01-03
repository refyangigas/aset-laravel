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
                                <img src="{{ asset('fotoaset/' . $row->foto) }}" alt="" style="width:50px;">
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
                                    data-nama="{{ $row->nama_aset }}">Hapus</a>
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
        $(document).ready(function() {
            $('.delete').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var nama = $(this).data('nama');

                // Tampilkan konfirmasi SweetAlert2
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus " + nama +
                        ". Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, lakukan penghapusan dengan mengarahkan ke route delete
                        window.location.href = '/delete/' + id;
                    }
                });
            });
        });
    </script>
@endsection
