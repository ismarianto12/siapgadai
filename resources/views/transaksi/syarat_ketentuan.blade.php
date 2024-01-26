<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .custom-hr {
            border: none;
            height: 1px;
            width: 100%;
            background-color: #ccc;
            /* Warna abu-abu */
            background-image: linear-gradient(to right, #ccc 50%, #555 50%);
            /* Gradien */
        }
    </style>
</head>

<body>

    <div class="WordSection1">
        <div class="WordSection1">
            <p style="margin-right:1px; text-align:center"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><strong>SURAT BUKTI GADAI (SBG)</strong></span></span></p>

            <img src="{{ asset('assets/img/horizontal.png') }}" style="width: 100%;height:auto" />
            <p>&nbsp;</p>

            <p style="margin-left:7px"><span style="font-size:10pt"><span style="font-family:Tahoma,sans-serif">Pada
                        hari
                        &hellip; tanggal &hellip; bulan &hellip; tahun &hellip; telah dibuat dan ditandatangani
                        Perjanjian
                        tentang gadai oleh dan antara (selanjutnya disebut sebagai
                        &ldquo;Perjanjian&rdquo;):</span></span>
            </p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p style="margin-left:7px"><span style="font-size:11pt"><span style="font-family:Tahoma,sans-serif"><span
                            dir="ltr" lang="id"
                            style="font-size:10.0pt">[</span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </u><span dir="ltr" lang="id" style="font-size:10.0pt">]</span></span></span></p>

            <p style="margin-left:7px"><span style="font-size:10pt"><span
                        style="font-family:Tahoma,sans-serif">(selanjutnya
                        disebut sebagai &ldquo;Perusahaan&rdquo;)</span></span></p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>



            <table>
                <tbody>
                    <tr>
                        <td>
                            Nama Lengkap&nbsp;
                        </td>
                        <td>
                            :
                        </td>
                        <th>
                            {{ $data->nama }}
                        </th>
                    </tr>
                    <tr>
                        <td>
                            No. HP Yang aktif&nbsp;
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $data->no_hp }}

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pin/Pola/Password jaminan&nbsp;
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $data->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tujuan Gadai
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            {{ $data->tujuan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>
                &nbsp;
            </p>



            <p style="margin-left:7px"><span style="font-size:10pt"><span
                        style="font-family:Tahoma,sans-serif">(selanjutnya
                        disebut sebagai &ldquo;Nasabah&rdquo;)</span></span></p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            <p style="margin-left:7px"><span style="font-size:10pt;font-weight:bold">
                    <span style="font-family:Tahoma,sans-serif">

                        Syarat dan Ketentuan:</span></span></p>

            <ol>
                <li style="text-align:left"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Nasabah memahami dan menyetujui
                                seluruh syarat dan ketentuan yang telah dibuat oleh Perusahaan.</span></span></span>
                </li>
                <li style="text-align:left"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Nasabah menyetujui uraian-uraian
                                mengenai barang dan biaya-biaya yang menjadi kewajiban Nasabah yaitu
                                meliputi:</span></span></span>
                    <ol style="list-style-type:lower-alpha">
                        <li style="text-align:left"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">barang yang dijaminkan (selanjutnya disebut sebagai
                                        &ldquo;Barang&rdquo;) yaitu</span></span></span></li>
                        <li style="text-align:left"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">nilai transaksi (selanjutnya disebut sebagai
                                        &ldquo;Transaksi&rdquo;) yaitu</span></span></span></li>
                        <li style="text-align:left"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">jasa titip (selanjutnya disebut sebagai &ldquo;Biaya
                                        Titip&rdquo;) yaitu</span></span></span></li>
                        <li style="text-align:left"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">Biaya Administrasi yaitu</span></span></span></li>
                        <li style="text-align:left"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">Biaya Penalti yaitu</span></span></span></li>
                    </ol>
                </li>
                <li style="text-align:left"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Nilai pinjaman nasabah
                                Rp.</span></span></span></li>
            </ol>

            <p style="margin-left:55px"><span style="font-size:10pt"><span
                        style="font-family:Tahoma,sans-serif">(selanjutnya disebut sebagai
                        &ldquo;Pinjaman&rdquo;)</span></span></p>

            <ol start="4">
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Nasabah wajib untuk membayar seluruh biaya-biaya yang tercantum
                                berdasarkan Perjanjian ini secara penuh dan tepat waktu kepada Perusahaan dengan
                                cara-cara
                                yang disediakan oleh Perusahaan.</span></span></span></li>
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">SBG wajib disimpan dan dibawa oleh Nasabah pada saat akan
                                melakukan perpanjangan dan/atau pelunasan Pinjaman. Jika SBG hilang maka Nasabah wajib
                                melaporkan kepada kantor cabang Perusahaan yang menerbitkannya.</span></span></span>
                </li>
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Jika Nasabah hendak untuk melakukan pengambilan Barang maka
                                Nasabah wajib melakukan konfirmasi 1 (satu) hari sebelumnya pada saat jam operasional
                                kepada
                                Perusahaan.</span></span></span></li>
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Untuk Jam pengambilan barang dari pukul 08.00 &ndash; 17.30 di
                                setiap hari nya.</span></span></span></li>
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Apabila Barang telah disiapkan dan Nasabah membatalkan secara
                                sepihak pengambilan Barang tersebut, barang akan dikembalikan ke gudang Perusahaan dan
                                wajib
                                melakukan konfirmasi ulang 1 (satu) hari sebelumnya pada saat jam operasional kepada
                                Perusahaan.</span></span></span></li>
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Jika Nasabah hendak melakukan pelunasan Pinjaman maka Nasabah
                                wajib datang secara mandiri atau melalui kuasanya yang kemudian menyerahkan SBG dan
                                menunjukan Kartu Tanda Penduduk (KTP) atau surat kuasa asli yang ditandatangani Nasabah
                                di
                                atas meterai dan disertai KTP asli penerima kuasa tersebut.</span></span></span></li>
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Skema pelunasan Pinjaman:</span></span></span></li>
            </ol>

            <p style="margin-left:55px; margin-right:8px; text-align:justify"><span style="font-size:10pt"><span
                        style="font-family:Tahoma,sans-serif">Hari ke-1 sampai ke-7 untuk Pelunasan nasabah membayar
                        3,75%
                        + Pokok Pinjaman, Hari ke-8 sampai ke-14 untuk Pelunasan nasabah membayar 7,5% + Pokok Pinjaman,
                        Hari ke-15 sampai ke-21 untuk Pelunasan nasabah membayar 11,25% + Pokok Pinjaman, Hari ke-22
                        sampai
                        ke-28 untuk Pelunasan nasabah membayar 15% + Pokok Pinjaman, nasabah bisa memperpanjang dengan
                        masa
                        7 hari dari jatuh tempo dengan membayar jasa titip 10% dari pokok pinjaman terhitung setelah
                        hari
                        ke-28 yaitu waktu jatuh tempo tiba.</span></span></p>

            <ol start="11">
                <li style="text-align:justify"><span style="font-size:11pt"><span
                            style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                style="font-size:10.0pt">Barang jaminan tersegel dan tidak digunakan oleh SGI, maka
                                pihak
                                SGI <strong>TIDAK BERTANGGUNG JAWAB </strong>atas kerusakan barang elektronik yang
                                digadaikan.</span></span></span></li>
            </ol>
        </div>


        <ol start="12">
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Pembayaran seluruh biaya-biaya yang
                            timbul berdasarkan Perjanjian ini hanya dapat dilakukan dengan menggunakan uang tunai di
                            kantor
                            cabang Perusahaan.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Nasabah menyetujui memberikan kuasa
                            kepada pihak SIAP GADAI INDONESIA untuk menjual jaminan <strong>TANPA KONFIRMASI
                            </strong>apabila nasabah tidak memperpanjang atau melunasi pinjaman yang telah jatuh tempo,
                            sesuai dengan pasal 24 POJK 31/2016.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Barang jaminan yang tertera di SURAT
                            BUKTI GADAI (SBG) adalah benar milik nasabah dan/atau kepemilikan sebagaimana pasal 1977 KUH
                            Perdata dan menjamin bukan berasal dari kejahatan, tidak dalam obyek sengketa dan/atau sita
                            jaminan. Dan oleh karenanya, membebaskan SGI dari segala tuntutan dan/atau gugatan dari
                            pihak
                            manapun (termasuk ahli waris nasabah) terkait persetujuan tersebut.</span></span></span>
            </li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Nasabah wajib melunasi Pinjaman dan
                            mengambil Barang jika Barang terbukti secara sah menjadi barang bukti dalam proses
                            hukum.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Bila Nasabah meninggal dunia pada saat
                            perjanjian gadai sebelum/sesudah jatuh tempo, maka ahli waris/anggota keluarga dalam satu
                            Kartu
                            Keluarga diwajibkan untuk membayar pokok pinjaman beserta jasa dan denda untuk dapat
                            melakukan
                            pelunasan gadai serta tidak dapat melakukan perpanjangan gadai.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Jaminan yang telah melewati masa Jatuh
                            Tempo yaitu di hari ke-29 setelah kontrak ini di tanda tangani untuk yang tidak
                            diperpanjang/dilunasi, maka semua data akan diformat ulang/dihapus tanpa konfirmasi apapun
                            dari
                            pihak SGI.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Jika Nasabah telah melunasi Pinjaman
                            maka Barang wajib langsung dilakukan pengambilan. Apabila Barang tidak diambil oleh Nasabah
                            setelah pelunasan Pinjaman maka Perusahaan berhak mengenakan Biaya Jasa Titip sesuai dengan
                            aturan yang berlaku.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Tahoma,sans-serif">

                        <span dir="ltr" lang="id" style="font-size:10.0pt">Nasabah bisa mendapatkan
                            pengembalian uang kelebihan apabila telah
                            dilakukan penjualan barang jaminan yang telah lewat jatuh tempo dengan ketentuan harga laku
                            &ndash; sisa pinjaman &ndash; 20% dari nilai sisa pinjaman &ndash; biaya administrasi
                            &ndash;
                            pinalti maupun jasa titip barang tersebut sesuai peraturan, untuk menanyakan perihal uang
                            kelebihan tersebut nasabah bisa langsung datang ke outlet SGI tempat barang tersebut di
                            jaminkan, jangka waktu terakhir pengambilan uang kelebihan adalah 365 hari setelah tanggal
                            jatuh
                            tempo. Lebih dari tanggal tersebut uang tersebut digunakan untuk biaya operasional
                            SGI.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Apabila kedepannya ada sengketa, maka
                            penyelesaian sengketa akan disesuaikan dengan ketentuan POJK 1/POJK. 07/2013 yaitu melalui
                            LAPS
                            SJK atau pengadilan negeri Kota Depok.</span></span></span></li>
            <li style="text-align:justify"><span style="font-size:11pt"><span
                        style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                            style="font-size:10.0pt">Kami selaku Pihak SGI melindungi
                            seluruh data pribadi nasabah yang diberikan baik secara tertulis maupun tidak tertulis
                            sesuai
                            peraturan UU No. 27 Tahun 2022.</span></span></span></li>
        </ol>

        <p style="margin-left:55px; text-align:justify"><span style="font-size:10pt"><span
                    style="font-family:Tahoma,sans-serif">Layanan Customer Care : <a
                        href="http://www.siapgadai.com/">www.siapgadai.com</a></span></span></p>

        <p>&nbsp;</p>

        <p>&nbsp;</p>

        <p style="text-align: right"> JAKARTA , {{ Properti_app::tgl_indo(date('Y-m-d')) }}
        </p>

        <p>&nbsp;</p>

        <table cellspacing="0" class="Table" style="border-collapse:collapse; margin-left:96px">
            <tbody>
                <tr>
                    <td style="height:56px; vertical-align:top; width:283px">



                        <p style="margin-right:109px; text-align:center"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">PT. SIAP GADAI INDONESIA</span></span></span></p>
                    </td>
                    <td style="height:56px; vertical-align:top; width:245px">
                        <p style="margin-left:109px; text-align:center"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">NASABAH</span></span></span></p>
                    </td>
                </tr>
                <tr>
                    <td style="height:56px; vertical-align:top; width:283px">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p style="margin-right:109px; text-align:center"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">(</span><span dir="ltr" lang="id"
                                        style="font-size:10.0pt"><span
                                            style="font-family:&quot;Times New Roman&quot;,serif">.............................
                                        </span></span><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">)</span></span></span></p>
                    </td>
                    <td style="height:56px; vertical-align:top; width:245px">
                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p style="margin-left:109px; text-align:center"><span style="font-size:11pt"><span
                                    style="font-family:Tahoma,sans-serif"><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">(</span><span dir="ltr" lang="id"
                                        style="font-size:10.0pt"><span
                                            style="font-family:&quot;Times New Roman&quot;,serif">.............................
                                        </span></span><span dir="ltr" lang="id"
                                        style="font-size:10.0pt">)</span></span></span></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p>&nbsp;</p>
    </div>

    <p>&nbsp;</p>

</body>

</html>
