<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Surat</title>
    <style>
        /* Gaya CSS dapat ditambahkan di sini */
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .address {
            text-align: right;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            /* border: 1px solid black; */
        }

        th,
        td {
            /* padding: 10px; */
            text-align: left;
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td>
                    <img src="{{ asset('assets/img/logo.png') }}" style="width: 50%" />
                    <p>&nbsp;<strong>Jalan Raya Kali Krukut&nbsp;</strong></p>
                </td>
                <td colspan="3">
                    <p style="text-align:center"><strong>KWITANSI PELUNASAN&nbsp;</strong></p>
                </td>
            </tr>
            <tr>
                <td><strong>No. Telp : 0852-1007-1462&nbsp;</strong></td>
                <td>
                    <p>No. Kwitansi</strong></p>
                </td>
                <td>:</td>
                <td>32131</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p>No. Faktur&nbsp;</strong></p>
                </td>
                <td>&nbsp;</td>
                <td>1231313</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p><strong>No. Anggota&nbsp;</strong></p>
                </td>
                <td>&nbsp;</td>
                <td>131231</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p><strong>Tanggal&nbsp;</strong></p>
                </td>
                <td>&nbsp;</td>
                <td>-&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p><strong>Jatuh Tempo&nbsp;</strong></p>
                </td>
                <td>&nbsp;</td>
                <td>2023-1230-123</td>
            </tr>
        </tbody>
    </table>

    <hr />

    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="vertical-align:top">
                    Nama
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="text-align:left">{{ $data->nama }}</td>
                <td style="vertical-align:top">
                    Nama Barang
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="text-align:left"> {{ $data->nama_barang }} {{ $data->merk }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Alamat
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="vertical-align:top">{{ $data->alamat }}</td>
                <td style="vertical-align:top">
                    Merk
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="vertical-align:top">{{ $data->alamat }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    RT / RW
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="vertical-align:top"></td>
                <td style="vertical-align:top">
                    Type
                </td>
                <td style="vertical-align:top">
                    :
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kelurahan
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="vertical-align:top"></td>
                <td style="vertical-align:top">
                    No. Imei
                </td>
                <td style="vertical-align:top">
                    :
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kecamatan
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="vertical-align:top"></td>
                <td style="vertical-align:top">
                    Kelengkapan
                </td>
                <td style="vertical-align:top">
                    :
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kab / Kota
                </td>
                <td style="vertical-align:top">
                    :
                </td>
                <td style="vertical-align:top"></td>
                <td style="vertical-align:top">
                    Maks Pinjaman
                </td>
                <td style="vertical-align:top">
                    : Rp.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Jumlah Pinjaman
                </td>
                <td style="vertical-align:top">
                    : Rp.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Administrasi
                </td>
                <td style="vertical-align:top">
                    : Rp.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Jasa Titip
                </td>
                <td style="vertical-align:top">
                    : Rp.
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Total
                </td>
                <td style="vertical-align:top">
                    : Rp.
                </td>
            </tr>
        </tbody>
    </table>


    <div style="margin-top: 20px;">
        <p>Menyetujui,</p>
        <p>Nasabah</p>
        <table>
            <tr>
                <td>
                    <p style="text-align: center;">Staff SGI</p>
                    <p>(…....................)</p>

                </td>

                <td>
                    <p style="text-align: center;">Nasabah</p>
                    <p>(….....................)</p>
                </td>
            </tr>
        </table>



    </div>
</body>

</html>
