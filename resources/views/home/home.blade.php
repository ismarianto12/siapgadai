@extends('layouts.template')

@section('content')
    {{-- @dd(is_array($transaksiChart)); --}}
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
                            <h3 class="text-bold">Selamat datang di aplikasi </h3>
                            <p>Silahkan Akses Menu Disamping Untuk Menggunakan Aplikasi. </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 _appcover"
              onclick="redirectToURLWithParameter('{{ url('master/nasabah') }}', 'ref', 'originDash')"> 
                <div class="card card-stats card-round">
                    <div class="card-body">
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
            <div class="col-sm-6 col-md-3 _appcover"
                onclick="redirectToURLWithParameter('{{ url('laporan/pegadaian') }}', 'status', '1')">
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
            <div class="col-sm-6 col-md-3 _appcover"
                onclick="redirectToURLWithParameter('{{ url('laporan/pendapatan') }}', 'ref', 'originDash')">
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
            <div class="col-sm-6 col-md-3 _appcover"
                onclick="redirectToURLWithParameter('{{ url('laporan/pendapatan') }}', 'ref', 'originDash')">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-dollar text-primary"></i>
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
    <div class="page-inner" style="margin-top:-44px">
        <div class="row">
            <div class="col-sm-6 col-md-3 _appcover"  onclick="redirectToURLWithParameter('{{ url('laporan/pegadaian') }}', 'status', '1')">
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-tool text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Nasabah Approve</p>
                                    <h4 class="card-title">{{ Properti_app::Dashboard_count('approve') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 _appcover"
                onclick="redirectToURLWithParameter('{{ url('laporan/pegadaian') }}', 'status', '5')">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-symbol text-info"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Nasabah Datang</p>
                                    <h4 class="card-title">{{ Properti_app::Dashboard_count('datang') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 _appcover"
                onclick="redirectToURLWithParameter('{{ url('laporan/pegadaian') }}', 'status', '5')">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-circle
                                    text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Nasabah Cancel</p>
                                    <h4 class="card-title">{{ Properti_app::Dashboard_count('cancel') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 _appcover"
                onclick="redirectToURLWithParameter('{{ url('laporan/pegadaian') }}', 'ref', 'originDash')">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-circle
                                    text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Total Piutang Berjalan</p>
                                    <h4 class="card-title" onclick="location.href='{{ url('master/identitas') }}'">
                                        {{ Properti_app::PiutangBerjalan() }}
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
        function redirectToURLWithParameter(url, parameterName, parameterValue) {
            // Membuat URL lengkap dengan parameter
            var fullURL = url + '?' + encodeURIComponent(parameterName) + '=' + encodeURIComponent(parameterValue);

            // Melakukan redirect ke URL lengkap
            window.location.href = fullURL;
        }
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
                data: [

                    @if ($transaksiChart)
                        {{ implode(',', array_values(get_object_vars($transaksiChart))) }}
                    @else
                        {{ implode(',', array_fill(0, 11, 0)) }}
                    @endif

                ]
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
                data: [
                    @if ($pelunasanChart)
                        {{ implode(',', array_values(get_object_vars($pelunasanChart))) }}
                    @else
                        {{ implode(',', array_fill(0, 11, 0)) }}
                    @endif
                ]
            }]
        });
    </script>
    <script src="{{ asset('assets') }}/js/plugin/chart-circle/circles.min.js"></script>
@endsection
