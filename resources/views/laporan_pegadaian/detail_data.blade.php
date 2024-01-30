<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Tambahkan CSS Bootstrap jika diperlukan -->
</head>

<body>
    <div class="container">
        <h2>Deatail transaksi Gadai - {{ $data['nama'] }} </h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ID:</td>
                    <td>{{ $data['id'] }}</td>
                </tr>
                <tr>
                    <td>No Kwitansi:</td>
                    <td>{{ $data['no_kwitansi'] }}</td>
                </tr>
                <tr>
                    <td>Nama Barang:</td>
                    <td>{{ $data['nama_barang'] }}</td>
                </tr>
                <tr>
                    <td>Jumlah Pinjaman:</td>
                    <td>{{ $data['jumlah_pinjaman'] }}</td>
                </tr>
            </tbody>
        </table>

    </div>

    <!-- Tambahkan JavaScript Bootstrap jika diperlukan -->

</body>

</html>
