@extends('layouts.template')
@section('content')
    <div class="col-md-12">

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
                                        {{ $data->jatuh_tempo }}

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_jatuh_tempo" class="col-md-4 text-left">Referal Code:</label>
                                    <div class="col-md-8">
                                        {{ $data->jatuh_tempo }}

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
                                    <select name="jenis_barang" class="form-control" required>
                                        <option value=""></option>
                                        @foreach (Properti_app::masterBarang() as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Type Barang</label>
                                <div class="col-md-10">
                                    <input type="text" name="type" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Nama Barang</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_barang" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-2 text-left">Tahun Barang</label>
                                <div class="col-md-10">
                                    <input type="number" name="keluaran_tahun" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">No. Imei</label>
                                <div class="col-md-10">
                                    <input type="text" name="no_imei" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Kelengkapan</label>
                                <div class="col-md-10">
                                    <input type="text" name="kelengkapan" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 text-left">Foto Barang</label>
                                <div class="col-md-10">
                                    <input type="file" name="foto_barang" class="form-control" required />
                                </div>
                            </div>
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
                                        <input type="text" id="nama_nasabah" name="nama_nasabah" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nik" class="col-md-2 text-left">NIK:</label>
                                    <div class="col-md-8">
                                        <input type="text" id="nik" name="nik" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-md-2 text-left">Jenis Kelamin:</label>
                                    <div class="col-md-8">
                                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                            @foreach (Properti_app::Jk() as $item => $val)
                                                <option value="{{ $item }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-md-2 text-left">Alamat:</label>
                                    <div class="col-md-8">
                                        <textarea id="alamat" name="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="rt_rw" class="col-md-2 text-left">Rt/Rw:</label>
                                    <div class="col-md-4">
                                        <input type="text" id="rt_rw" name="rt_rw" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kelurahan" class="col-md-2 text-left">Kelurahan:</label>
                                    <div class="col-md-4">
                                        <textarea id="kelurahan" name="kelurahan" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kecamatan" class="col-md-2 text-left">Kecamatan:</label>
                                    <div class="col-md-4">
                                        <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kabupaten_kota" class="col-md-2 text-left">Kabupaten/Kota:</label>
                                    <div class="col-md-4">
                                        <input type="text" id="kabupaten_kota" name="kabupaten_kota"
                                            class="form-control" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br /><br /><br />
                        <!-- Second Row -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="maks_pinjaman" class="form-label">Maks Pinjaman:</label>
                                Rp. {{ $data->jumlah_pinjaman }}
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_diambil" class="form-label">Jumlah yang diambil:</label>
                                Rp. {{ $data->jumlah_pinjaman }}

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
                    <div class="col-md-6">
                        <a href="{{ Url('app/transaksi/cetak_kwitansi/' . $idTransaction) }}"
                            class="btn btn-danger btn-block" target="_blank"><b>Cetak Kwitansi</b></a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ Url('app/transaksi/syarat_ketentuan/' . $idTransaction) }}"
                            class="btn btn-info btn-block" target="_blank"><b>Cetak
                                Syarat dan kondisi</b></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
