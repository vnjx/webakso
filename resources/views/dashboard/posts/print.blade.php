<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>

    <title>Cetak Laporan Penjualan</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>WEBAKSO</b></p>
        <p align="center">Laporan Penjualan</p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Barang Keluar</th>
                    <th scope="col">Bagian Asal</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Upload</th>
                    <th scope="col">Tanggal Edit</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr>
                      <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration}}</td>
                      <td style="text-align: center; vertical-align: middle;">{{ $post->title }}</td>
                      <td style="text-align: center; vertical-align: middle;">{{ $post->origin->divisi }}</td>
                      <td style="text-align: center; vertical-align: middle;">{{ $post->qty }}</td>
                      <td style="text-align: center; vertical-align: middle;">{{ $post->created_at }}</td>
                      <td style="text-align: center; vertical-align: middle;">{{ $post->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</body>
</html>