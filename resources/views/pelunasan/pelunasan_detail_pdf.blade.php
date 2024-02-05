<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Pelunasan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>



<body>
    <div class="container">
        <h2>Tanda Terima Pelunasan Gadai - {{ $data['nama'] }} </h2>
        <?php
        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($data['no_anggota'], 'C39+') . '" alt="barcode"  style="width:30%" />';
        ?>
        <br />
        <table class="table table-bordered" style="margin-top:40px">
            <tbody>
                <tr>

                    <td colspan="2" style="background: orange">
                        <div class="alert alert-danger">Data Nasabah</div>
                    </td>

                </tr>

                <tr>
                    <td>Nama</td>
                    <td>{{ $data['nama'] }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $data['nik'] }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> {{ $data['jk'] === 'L' ? 'Laki laki' : 'Perempuan' }}
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> {{ $data['alamat'] }}
                    </td>
                </tr>

                <tr>
                    <td>Rt/Rw</td>
                    <td> {{ $data['rt_rw'] }}
                    </td>
                </tr>

                <tr>
                    <td>Kelurahan</td>
                    <td> {{ $data['kelurahan'] }}
                    </td>
                </tr>

                <tr>
                    <td>Kecamatan</td>
                    <td> {{ $data['kecamatan'] }}
                    </td>
                </tr>

                <tr>
                    <td>Kabupaten / Kota</td>
                    <td> {{ $data['kab_kota'] }}
                    </td>
                </tr>
                <tr>

                    <td colspan="2" style="background: orange">
                        <div class="alert alert-danger">Data Barang</div>
                    </td>

                </tr>
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
                    <td>{{ Properti_app::formatRupiah($data['jumlah_pinjaman']) }}</td>
                </tr>

                <tr>

                    <td colspan="2" style="background: orange">
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
                        <small>*)</small>
                    </td>

                    <td>
                        {{ $data['persentase_pinjaman'] }}%

                    </td>

                </tr>
                <tr>
                    <td>
                        Limit
                    </td>

                    <td>
                        {{ Properti_app::formatRupiah($data['maks_pinjaman']) }}

                    </td>

                </tr>
                <tr>

                    <td>
                        Jumlah Diambil
                    </td>

                    <td>
                        {{ Properti_app::formatRupiah($data['jumlah_pinjaman']) }}
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
                        Status Bayar
                    </td>
                    <td>
                        <h4> Lunas</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        Durasi Pijaman
                    </td>
                    <td>
                        {{ $data['durasi_pinjam'] }}
                    </td>
                </tr>
            </tbody>
        </table>


  

        <h3>Terima Kasih Sudah Bertransaksi</h3>


        Jakarta , {{ Properti_app::tgl_indo(date('Y-m-d')) }}

        <br />
        <p>

            (.............................)
        </p>
        <br />
        <div style="margin-left:40px"> {{ Auth::user()->username }}</div>
    </div>

    <!-- Tambahkan JavaScript Bootstrap jika diperlukan -->

</body>

</html>
