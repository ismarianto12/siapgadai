@extends('layouts.template')
@section('content')
    <style>
        iframe {
            width: 100%;
            height: 600px !important;
            border: 0;
        }
    </style>
    <div class="col-md-12">
        <!-- Modal -->
        <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document" style=" min-width: 85%;">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="title">
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="form_content">
                        <h3>Please Wait Pdf File ........</h3>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="card" style="margin-top: 40px">
            <div class="card-header">
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-responsive" style="width: 10%" />
                <h3>Transaksi Berhasil</h3>
                <i class="flaticon-success text-success" style="font-size: 50px !important;"></i>

                <h4 style="color: #000000">A. NO FAKTUR</h4>
                <hr />

                <div class="sectoin">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card-body">


                                <div class="form-group row">
                                    <label for="no_kwitansi" class="col-md-4 text-left">No. Kwitansi:</label>
                                    <div class="col-md-8">
                                        {{ $data->no_kwitansi }}

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="no_faktur" class="col-md-4 text-left">No. Faktur:</label>
                                    <div class="col-md-8">
                                        {{ $data->no_faktur }}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no_anggota" class="col-md-4 text-left">No. Anggota:</label>
                                    <div class="col-md-8">
                                        {{ $data->no_anggota }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tgl_jatuh_tempo" class="col-md-4 text-left">Tanggal Jatuh Tempo:</label>
                                    <div class="col-md-8">
                                        {{ $data->tanggal_jatuh_tempo }}

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_jatuh_tempo" class="col-md-4 text-left">Referal Code:</label>
                                    <div class="col-md-8">
                                        {{ $data->referal_code ? $data->referal_code : '-'  }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 style="color: #000000">B. Data Barang</h4>

                <hr />
                <div class="sasd">
                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-2 text-left">Jenis Barang</label>
                                <div class="col-md-10">
                                    {{ $data->nama_kategori }}

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Type Barang</label>
                                <div class="col-md-10">
                                    {{ $data->type }}

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Nama Barang</label>
                                <div class="col-md-10">
                                    {{ $data->nama_barang }}

                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-2 text-left">Tahun Barang</label>
                                <div class="col-md-10">
                                    {{ $data->keluaran_tahun }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">No. Imei</label>
                                <div class="col-md-10">
                                    {{ $data->no_imei }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Kelengkapan</label>
                                <div class="col-md-10">
                                    {{ $data->kelengkapan }}
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-md-2 text-left">Foto Barang</label>
                                <div class="col-md-10">
                                    <img src="{{ Url('./file_gadai/' . $data->foto) }}" class="form-control"
                                        style="width:90%" />
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <h4 style="color: #000">C. Data Nasabah</h4>
                <hr />
                <div class="_naasbah">
                    <div class="card-body">

                        <!-- First Row -->
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="nama_nasabah" class="col-md-2 text-left">Nama Nasabah:</label>
                                    <div class="col-md-8">
                                        {{ $data->nama }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nik" class="col-md-2 text-left">NIK:</label>
                                    <div class="col-md-8">
                                        {{ $data->nik }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-md-2 text-left">Jenis Kelamin:</label>
                                    <div class="col-md-8">
                                        {{ $data->jk === 'L' ? 'Laki laki' : 'Perempuan' }}

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-md-2 text-left">Alamat:</label>
                                    <div class="col-md-8">
                                        {{ $data->alamat }}
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="rt_rw" class="col-md-2 text-left">Rt/Rw:</label>
                                    <div class="col-md-4">
                                        {{ $data->rt_rw }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kelurahan" class="col-md-2 text-left">Kelurahan:</label>
                                    <div class="col-md-4">
                                        {{ $data->kelurahan }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kecamatan" class="col-md-2 text-left">Kecamatan:</label>
                                    <div class="col-md-4">
                                        {{ $data->kecamatan }}

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kabupaten_kota" class="col-md-2 text-left">Kabupaten/Kota:</label>
                                    <div class="col-md-4">
                                        {{ $data->kab_kota }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /><br /><br />
                        <!-- Second Row -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="maks_pinjaman" class="form-label">Maks Pinjaman:</label>
                                Rp. {{ Properti_app::formatRupiah($data->maks_pinjaman) }}
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_diambil" class="form-label">Jumlah yang diambil:</label>
                                Rp. {{ Properti_app::formatRupiah($data->jumlah_pinjaman) }}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer row"
                    style="
                position: fixed;
                bottom: 0;
                margin: 0 auto;
                width: 80%;
                z-index: 999;
                background: white;
            ">

                    <div class="col-md-4">
                        <button to="{{ Url('app/transaksi/cetak_barcode/' . $idTransaction) }}"
                            class="detail_pdf btn btn-info btn-block"><b>Cetak
                                Barcode barang</b></button>
                    </div>
                    <div class="col-md-4">
                        <button to="{{ Url('app/transaksi/cetak_kwitansi/' . $idTransaction) }}"
                            class="detail_pdf btn btn-danger btn-block"><b>Cetak Kwitansi</b></button>
                    </div>
                    <div class="col-md-4">
                        <button to="{{ Url('app/transaksi/syarat_ketentuan/' . $idTransaction) }}"
                            class="detail_pdf btn btn-info btn-block"><b>Cetak
                                Syarat dan kondisi</b></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.detail_pdf').on('click', function(e) {

                e.preventDefault();
                $('#formmodal').modal('show');
                var pdffile = $(this).attr('to');
                $('#form_content').html(`
                        <iframe src="${pdffile}" frameborder="0" allowfullscreen></iframe>

                `);
            });
        });
    </script>
@endsection
