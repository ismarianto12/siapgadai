<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KWITANSI GADAI</title>
    <style>
        .custom-hr {
            border: none;
            height: 3px;
            width: 100%;
            background: linear-gradient(to left, #ccc 50%, #555 50%);
        }

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


        .content_table>th,
        td {
            padding-left: 25px;
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
                    <p>&nbsp;<strong>{{ Properti_app::getCabang($data->cabang_id, 'nama_cabang') }}&nbsp;</strong></p>
                </td>
                <td colspan="3">
                    <p style="text-align:center"><strong>KWITANSI PELUNASAN&nbsp;</strong></p>
                </td>
            </tr>
            <tr>
                <td><strong>No. Telp : {{ Properti_app::getCabang($data->cabang_id, 'no_telp') }}&nbsp;</strong></td>
                <td>
                    <p>No. Kwitansi</strong></p>
                </td>
                <td>:</td>
                <td>{{ $data->no_kwitansi }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p>No. Faktur&nbsp;</strong></p>
                </td>
                <td>&nbsp;</td>
                <td>{{ $data->no_faktur }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <p><strong>No. Anggota&nbsp;</strong></p>
                </td>
                <td>&nbsp;</td>
                <td>{{ $data->no_anggota }}</td>
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
                <td>{{ $data->tanggal_jatuh_tempo }}</td>
            </tr>
        </tbody>
    </table>

    <img src="{{ asset('assets/img/horizontal.png') }}" style="width: 100%;height:auto" />


    <table cellpadding="0" cellspacing="0" class="content_table">
        <tbody>
            <tr>
                <td style="vertical-align:top">
                    Nama
                </td>
                <td style="text-align:left">:&nbsp;&nbsp;{{ $data->nama }}</td>
                <td style="vertical-align:top">
                    Jenis Barang
                </td>

                <td style="text-align:left">:&nbsp;&nbsp;{{ $data->nama_barang }} - {{ $data->merek_barang }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Alamat
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->alamat }}</td>
                <td style="vertical-align:top">
                    Merk
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->merek_barang }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    RT / RW
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->rt_rw }}</td>
                <td style="vertical-align:top">
                    Type
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->type }}</td>

            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kelurahan
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->kelurahan }}</td>
                <td style="vertical-align:top">
                    No. Imei
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->no_imei }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kecamatan
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->kecamatan }}</td>

                <td style="vertical-align:top">
                    Kelengkapan
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->kelengkapan }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Kab / Kota
                </td>

                <td style="vertical-align:top">:&nbsp;&nbsp;{{ $data->kab_kota }}</td>

                <td style="vertical-align:top">
                    Maks Pinjaman
                </td>
                <td style="vertical-align:top">
                    : Rp. {{ Properti_app::formatRupiah($data->maks_pinjaman) }}
                </td>
            </tr>
            <tr>
                <td style="vertical-align:top">
                    Jumlah Pinjaman
                </td>
                <td style="vertical-align:top">
                    : Rp. {{ Properti_app::formatRupiah($data->jumlah_pinjaman) }}
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


    <div style="margin-top: 20px;margin-left:25px">
        <p>Menyetujui,</p>

        <table>
            <tr>
                <td>
                    <p style="text-align: center;">Staff SGI</p>
                    <p>(…....................)</p>
                    {{ Auth::user()->username }}

                </td>

                <td>
                    <p style="text-align: center;">Nasabah</p>
                    <p>(….....................)</p>
                    {{ $data->nama_nasabah }}

                </td>
            </tr>
        </table>



    </div>
</body>

</html>
