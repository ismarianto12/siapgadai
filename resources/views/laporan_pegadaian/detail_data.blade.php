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
        <?php
        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($data['no_anggota'], 'C39+') . '" alt="barcode"   />';
        ?>
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

                <tr>

                    <td colspan="2">
                        <div class="alert alert-danger">Data Pinjaman</div>
                    </td>

                </tr>
                <tr>
                    <td>
                        Taksiran Harga
                    </td>

                    <td>
                        {{ Properti_app::formatRupiah($data['taksiran_harga']) }}

                    </td>

                </tr>
                <tr>
                    <td>
                        Persentase pinjaman
                    </td>

                    <td>
                        {{ $data['persentase_pinjaman'] }}

                    </td>

                </tr>
                <tr>
                    <td>
                        Limit
                    </td>

                    <td>
                        {{ $data['maks_pinjaman'] }}

                    </td>

                </tr>
                <tr>

                    <td>
                        Jumlah Diambil
                    </td>

                    <td>
                        {{ $data['jumlah_pinjaman'] }}
                    </td>

                </tr>
                <tr>

                    <td>

                        Tanggal Jatuh Tempo
                    </td>

                    <td>
                        {{ Properti_app::tgl_indo($data['tanggal_jatuh_tempo']) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Durasi Pijaman
                    </td>
                    <td>
                        {{ $data['keterangan'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{ Url('app/cetak_tagihan/' . $data['id']) }}" target="_blank" class="btn btn-info btn-md">Cetak
            Tagihan</a>
        <a href="{{ Url('app/transaksi/cetak_tagihan/' . $data['id']) }}" target="_blank"
            class="btn btn-success btn-md">Kirim Pesan
            Wa</a>

    </div>

    <!-- Tambahkan JavaScript Bootstrap jika diperlukan -->

</body>

</html>
