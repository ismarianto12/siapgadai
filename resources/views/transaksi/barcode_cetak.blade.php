<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print HTML dengan Konten di Tengah</title>
    <style>
        @page {
            size: 43mm 60mm;
            margin: 0;
        }

        body {
            background-color: #737373;
        }


        @print {
            @page {
                size: 43mm 60mm;
                margin: 0;
            }

            body {
                background-color: #737373;
            }

            .print_area {
                width: 33mm;
                height: 25mm;
                margin: 0 auto;
                border: 0.1px solid #ddd;
                background-color: #ffff;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 5mm;
            }
        }

        .print_area {
            width: 65mm;
            height: 30mm;
            margin: 0 auto;
            border: 0.1px solid #ddd;
            background-color: #ffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5mm;
        }

        p {
            color: #333;
            margin: 0;
            text-align: center;
            /* Rata tengah teks */
        }
    </style>
</head>

<body>
    <div class="print_area">

        <script>
            // Menggunakan window.onload untuk menetapkan fungsi yang akan dijalankan setelah halaman dimuat
            window.onload = function() {
                // Mencetak halaman otomatis ketika halaman dimuat
                window.print();
            };
        </script>
 
        <div style="margin-top: -30px;margin-left:10px">
            <p>
                <?php
                echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($data->no_anggota, 'C39+') . '" alt="barcode"   />';
                ?>
                <br />
                <b> {{ $data->nama }}</b>
                {{ $data->no_faktur }} -
                {{ Str::ucfirst(strtolower($data->nama_barang)) }} - {{ $data->no_imei }}
                <br />

                {{ $data->alamat }}
            </p>

        </div>

    </div>
</body>

</html>
