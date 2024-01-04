<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 10%;
        }

        #customers th,
        #customers td {
            border: 3px solid #040720;
            padding: 8px;
            text-align: left;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #040720;
            color: rgb(255, 255, 255);
        }

        #customers tr:hover {
            background-color: #f5f5f500;
        }
    </style>
</head>

<body>

    <h1>Data Aset</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nomor Seri</th>
            <th>Nama Aset</th>
            <th>Jumlah</th>
            <th>Lokasi</th>
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Umur</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($data as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->nomor_seri }}</td>
            <td>{{ $row->nama_aset }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->lokasi }}</td>
            <td>{{ $row->kategori }}</td>
            <td>{{ $row->tahun }}</td>
            <td>{{ $row->umur }}</td>
            <td>{{ $row->harga }}</td>
            <td>{{ $row->status }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>
