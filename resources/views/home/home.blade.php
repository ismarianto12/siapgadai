@extends('layouts.template')

@section('content')
    <style>
        table,
        td,
        th {

            padding: 10px 15px 10px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
        }

        .highcharts-title {
            font-family: 'Arial'
        }

        table {
            border-collapse: collapse;
            font-size: 25px;
        }

        .border_bottom {
            /* border-right: 1px solid #ddd; */
            text-align: center;
            border-color: red
        }

        .border_top {
            border-right: 1px solid #ddd;
            text-align: center;
            width: auto;
            border-top: 1px solid #ddd;
        }
    </style>
    <br /><br />

    <div class="page-inner">
        <h4 class="page-title">Dashboard Panel</h4>
        <div class="row">

            <div class="col-sm-12 col-md-12">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div>
                            <h3 class="text-bold">Selamat datang di aplikasi SiapGadai </h3>

                            <p>Silahkan Akses Menu Disamping Untuk Menggunakan Aplikasi. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-chart-pie text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Nasabah</p>
                                    <h4 class="card-title">{{ $tnasabah }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Barang Masuk</p>
                                    <h4 class="card-title">{{ $tbarangmasuk }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-success text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Barang Lunas</p>
                                    <h4 class="card-title">{{ $tbaranglunas }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-twitter text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Pelunasan</p>
                                    <h4 class="card-title">{{ Properti_app::formatRupiah($tpendapatan->total_pendapatan) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="barg"></div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('barg', {
            title: {
                text: 'Grafik Semua transaksi',
                style: {
                    fontSize: '18px' // Ukuran teks judul
                }
            },
            subtitle: {
                text: 'Data transaksi Tahun {{ date('Y') }}',
                style: {
                    fontSize: '14px' // Ukuran teks subjudul
                }
            },
            chart: {
                type: 'column'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Nilai Transaksi' // Label untuk sumbu Y
                }
            },
            plotOptions: {
                column: {
                    depth: 25 // Menambahkan kedalaman (depth) pada grafik kolom
                }
            },
            series: [{
                name: 'Jumlah Transaksi',
                data: [{{ implode(',', array_values(get_object_vars($transaksiChart))) }}]
            }]
        });

        Highcharts.chart('container', {
            title: {
                text: 'Grafik Jumlah Transaksi Lunas',
                style: {
                    fontSize: '18px'
                }
            },
            subtitle: {
                text: 'Data Peunasan Nasabah Tahun {{ date('Y') }}', // Subjudul grafik
                style: {
                    fontSize: '14px' // Ukuran teks subjudul
                }
            },
            chart: {
                type: 'area'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Volume data' // Label untuk sumbu Y
                }
            },
            plotOptions: {
                series: {
                    fillOpacity: 0.1
                }
            },
            series: [{
                name: 'Jumlah Pelunasan', 
                data: [{{ implode(',', array_values(get_object_vars($pelunasanChart))) }}]
            }]
        });
    </script>
    <script src="{{ asset('assets') }}/js/plugin/chart-circle/circles.min.js"></script>
@endsection
