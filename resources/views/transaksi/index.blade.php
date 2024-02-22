@extends('layouts.template')
@section('content')
    @include('layouts.breadcum')

    <div class="modal fade" id="formmodal" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" style=" min-width: 65%;">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="title">
                        <i class="flaticon-right-arrow-4" style="font-size: 30px"></i> Data Transaksi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="form_content">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nik</th>
                                    <th>Nomor Anggota</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row row-card-no-pd">
            <div class="col-sm-4 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <p
                        style="
        margin-left: 30px;
        margin-top: 10px;
        background: #6c665b5e;
        border-right: 10px solid orange;
        padding: 10px;
    ">
                        - Max bunga 10% perbulan (perminggu kena 2,5% sampai dengan minggu ke-4)<br>
                        - Denda bunga 5% (pada saat lebih dari 1 bulan. sampai dengan waktu 7 hari setelah jatuh tempo)<br>
                        - Administrasi tetap dipotong diawal (dikenakan 10rb untuk administrasi)</p>
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="flaticon-chart-pie text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <h3 class="card-category">Tanggal</h3>
                                    <h4 class="card-title">@php echo Properti_app::tgl_indo(date('Y-m-d')) @endphp</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
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
                                    <p class="card-category">Kasir</p>
                                    <h4 class="card-title">{{ ucfirst(Auth::user()->username) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
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
                                    <p class="card-category">Cabang</p>
                                    <h4 class="card-title">
                                        {{ Properti_app::getCabang(Auth::user()->cabang_id, 'nama_cabang') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <form class="simpan" method="POST" enctype="multipart/form-data">
            <div class="alert alert-info">
                <h4 style="color: #000000">A. NO FAKTUR</h4>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-6">

                        <div class="card-body">


                            <div class="form-group row">
                                <label for="no_kwitansi" class="col-md-4 text-left">No. Kwitansi:</label>
                                <div class="col-md-8">
                                    <input type="text" id="no_kwitansi" name="no_kwitansi" class="form-control"
                                        required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_faktur" class="col-md-4 text-left">No. Faktur:</label>
                                <div class="col-md-8">
                                    <input type="text" id="no_faktur" name="no_faktur" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_faktur" class="col-md-4 text-left">Lama Pelunasan:</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="perhitungan_biaya_id" id="perhitungan_biaya_id"
                                        required>
                                        @foreach (Properti_app::ParameterHitung() as $perhitungan)
                                            <option value="{{ $perhitungan->id }}">{{ $perhitungan->keterangan }} -
                                                {{ $perhitungan->persentase }}%</option>
                                        @endforeach
                                    </select>
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
                                    <input type="text" id="no_anggota" name="no_anggota" class="form-control"
                                        required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_jatuh_tempo" class="col-md-4 text-left">Tanggal Jatuh Tempo:</label>
                                <div class="col-md-8">
                                    <input type="date" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo"
                                        class="datepicker form-control" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_jatuh_tempo" class="col-md-4 text-left">Referal Code:</label>
                                <div class="col-md-8">
                                    <input type="text" id="referal_code" name="referal_code" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-info">
                <h4 style="color: #000000">B. Data Barang</h4>
            </div>

            <div class="card">
                <div class="card-body row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Kategori Gadai</label>
                            <div class="col-md-10">
                                <select name="kategori_barang_id" id="kategori_barang_id" class="form-control" required>
                                    <option value=""></option>
                                    @foreach (Properti_app::KategoriGadai() as $kategori)
                                        <option value="{{ $kategori->id }}">
                                            {{ $kategori->nama_kategori }} -
                                            {{ $kategori->kode_kategori }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Jenis Barang</label>
                            <div class="col-md-10">
                                <div id="render_barang">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Type Barang</label>
                            <div class="col-md-10">
                                <input type="text" name="type" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Tahun Barang</label>
                            <div class="col-md-10">
                                @php
                                    $currentYear = date('Y');
                                    $years = range($currentYear, 1980);
                                @endphp

                                <select name="keluaran_tahun" class="form-control" required>
                                    <option value="">Pilih Tahun Barang</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 text-left">Taksiran Harga</label>
                            <div class="col-md-10">
                                <input type="double" name="taksiran_harga" id="taksiran_harga"
                                    class="number_format form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-6 text-left">Persentase Pinjaman</label>
                            <div class="col-md-6">
                                <div class="input-group">

                                    <input type="text" name="persentase_pinjaman" id="persentase_pinjaman"
                                        class="form-control" required />
                                    <span class="input-group-addon">%</span>

                                </div>
                                <small id="keterangan_persentase" style="color:red"></small>


                            </div>
                            <div class="invalid-feedback" id="customError_persentase"></div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Merk Barang</label>
                            <div class="col-md-10">
                                <input type="text" name="merek_barang" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">No. Imei</label>
                            <div class="col-md-10">
                                <input type="text" name="no_imei" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-left">Kelengkapan</label>
                            <div class="col-md-10">
                                <textarea type="text" name="kelengkapan" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-left">Foto Barang</label>
                            <div class="col-md-10">
                                <input type="file" name="foto_barang" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Administrasi
                                <small>Persentase admin fee </small>

                            </label>
                            <div class="col-md-10 row">
                                <input type="text" name="administrasi" id="persentase_pinjaman"
                                    class="number_format form-control" required value="10" placeholder="10%" readonly
                                    style="width: 20%" /> %
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger d-flex justify-content-between">
                <div class="align-items-left">
                    <h4 style="color: #000">C. Data Nasabah</h4>
                </div>
                <div class="align-items-right">
                    <button class="btn btn-danger btn-round ml-auto btn-sm" onclick="clearall()">
                        <i class="fa fa-plus"></i>
                        Buat Baru
                    </button>
                    <button class="btn btn-primary btn-round ml-auto btn-sm" id="pilihyang_ada">
                        <i class="fa fa-plus"></i>
                        Pilih yang sudah ada
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="nama_nasabah" class="col-md-4 text-left">Nama Nasabah:</label>
                                <div class="col-md-8">
                                    <input type="text" id="nama_nasabah" name="nama_nasabah" class="form-control"
                                        required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nik" class="col-md-4 text-left">NIK:</label>
                                <div class="col-md-8">
                                    <input type="text" id="nik" name="nik" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik" class="col-md-4 text-left">Foto KTP:</label>
                                <div class="col-md-8">
                                    <input type="file" id="foto_ktp" name="foto_ktp" class="form-control"
                                        required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_kelamin" class="col-md-4 text-left">Jenis Kelamin:</label>
                                <div class="col-md-8">
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                        @foreach (Properti_app::Jk() as $item => $val)
                                            <option value="{{ $item }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 text-left">Alamat:</label>
                                <div class="col-md-8">
                                    <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="rt_rw" class="col-md-3 text-left">Rt/Rw:</label>
                                <div class="col-md-9">
                                    <input type="text" id="rt_rw" name="rt_rw" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kelurahan" class="col-md-3 text-left">Kelurahan:</label>
                                <div class="col-md-9">
                                    <textarea id="kelurahan" name="kelurahan" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kecamatan" class="col-md-3 text-left">Kecamatan:</label>
                                <div class="col-md-9">
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                        required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kecamatan" class="col-md-3 text-left">No Handphone:</label>
                                <div class="col-md-9">
                                    <input type="number" id="no_hp" name="no_hp" class="form-control" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kabupaten_kota" class="col-md-3 text-left">Kabupaten/Kota:</label>
                                <div class="col-md-9">
                                    <input type="text" id="kabupaten_kota" name="kabupaten_kota" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kabupaten_kota" class="col-md-3 text-left">Tujuan Gadai:</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="tujuan_gadai" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br /><br /><br />
                </div>
            </div>


            <div class="card-footer row"
                style="
        position: fixed;
        bottom: 0;
        margin: 0 auto;
        width: 93%;
        z-index: 999;
        background: white;
    ">

                <div id="render_error"></div>

                <div class="container row">

                    <div class="col-md-6">
                        <label for="maks_pinjaman" class="form-label">Maks Pinjaman:</label>
                        <input type="hidden" name="inputmaksimal_pinjam" id="inputmaksimal_pinjam" />
                        <h1 class="maksimal_pinjaman"></h1>
                        <small> *) Setiap transaksi dikenakan biaya admin 10.000</small>
                    </div>

                    <div class="col-md-6">
                        &nbsp; <label for="jumlah_diambil" class="form-label">Jumlah yang diambil:</label>
                        &nbsp;<input type="text" id="jumlah_diambil" name="jumlah_diambil"
                            class="number_format form-control" required />
                        <p
                            style="
                            font-size: 12px;
                            font-style: italic;
                        ">
                            Pastikan nomimal pinjaman harus sama atau kurang dari maksimal.</p>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 25px">
                    <button class="cancel_transaction btn btn-danger btn-block"><b>Batal</b></button>
                </div>
                <div class="col-md-6" style="margin-top: 25px">
                    <button class="btn btn-info btn-block"><b>Simpan</b></button>
                </div>
            </div>

        </form>

        <script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>
        <script type="text/javascript">
            $(document).on('ready', function() {
                $('#render_barang').html('<h5 class="alert alert-danger">Loading data barang ....</h5>');
                $('select[name="kategori_barang_id"]').on('change', function(e) {
                    e.preventDefault();
                    id = $(this).val();
                    if (id) {
                        $.post('{{ route('app.transaksi.get_barang') }}', {
                            id: id,
                        }, function(data) {
                            passing = '';
                            $.each(data, function(index, barang) {
                                passing += "<option value=" + barang.id + ">" + barang
                                    .nama_barang + "</option>";
                            });
                            console.log(passing);
                            $('#render_barang').html(`
                         <select name="id_barang" class="form-control" required>${passing}</select>
                        `);
                        }, 'JSON').error(function() {
                            alert('tidak ada response');
                        })
                    } else {
                        Swal.fire('info', 'silahkan pilih kategori gadai', 'info');
                    }
                })

                function clearall() {
                    $('input[name="nama_nasabah"]').val("").prop('readonly', false);
                    $('input[name="nik"]').val("").prop('readonly', false);
                    $('input[name="jenis_kelamin"]').val("").prop('readonly', false);
                    $('textarea[name="alamat"]').val("").prop('readonly', false);
                    $('input[name="rt_rw"]').val("").prop('readonly', false);
                    $('textarea[name="kelurahan"]').val("").prop('readonly', false);
                    $('input[name="kecamatan"]').val("").prop('readonly', false);
                    $('input[name="no_hp"]').val("").prop('readonly', false);
                    $('input[name="kabupaten_kota"]').val("").prop('readonly', false);
                }

                function formatCurrency(input) {
                    let value = input.value.replace(/[^\d]/g, '');

                    value = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(value);

                    input.value = value;
                }

                var elements = document.querySelectorAll('.wrapper');
                elements.forEach(function(element) {
                    element.classList.add('sidebar_minimize');
                });

                $(function() {


                    $('#pilihyang_ada').on('click', function(e) {
                        e.preventDefault();
                        $('#formmodal').modal('show');
                    });



                    function getall(data) {

                        console.log(data, 'function');
                        // $('input[name="foto_barang"]').val(data?.foto_barang);
                        $('input[name="nama_nasabah"]').val(data?.nama).prop('readonly', true);
                        $('input[name="nik"]').val(data?.nik).prop('readonly', true);
                        $('input[name="jenis_kelamin"]').val(data?.jenis_kelamin).prop('readonly', true);
                        $('textarea[name="alamat"]').val(data?.textarea).prop('readonly', true);
                        $('input[name="rt_rw"]').val(data?.rt_rw).prop('readonly', true);
                        $('textarea[name="kelurahan"]').val(data?.kelurahan).prop('readonly', true);
                        $('input[name="kecamatan"]').val(data?.kecamatan).prop('readonly', true);
                        $('input[name="no_hp"]').val(data?.no_hp).prop('readonly', true);
                        $('input[name="kabupaten_kota"]').val(data?.kab_kota).prop('readonly', true);
                    }

                    $('#datatable').on('click', '.checkpelunasan', function(e) {
                        e.preventDefault();
                        clearall();
                        var id = $(this).data('nasabah_id');

                        Swal.fire({
                            title: 'Please Wait ...',
                            allowOutsideClick: false,
                            showCancelButton: false,
                            showConfirmButton: false,
                        });
                        Swal.showLoading();
                        $.ajax({
                            url: "{{ route('api.call_detail_nasabah') }}",
                            method: "POST",
                            data: {
                                nasabah_d: id
                            },
                            success: function(data) {
                                Swal.close();
                                console.log(data.data[0], 'detail data')
                                getall(data?.data[0])
                                $('#formmodal').modal('hide');

                            },
                            error: function(data) {
                                Swal.fire('error', 'gagal mengambil data nasabah', 'error');
                            }
                        });


                    })

                    $('.number_format').keyup(function(event) {
                        if (event.which >= 37 && event.which <= 40) return;
                        $(this).val(function(index, value) {
                            return value
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        });
                    });

                    function calculateTaksiranHarga() {
                        var persentasePinjaman = parseFloat($('#persentase_pinjaman').val()) || 0;
                        var hargaBarang = $('#taksiran_harga').val();
                        var rhargaBarang = hargaBarang?.replace(/\./g, '');
                        console.log(rhargaBarang, 'dasd')
                        var taksiranHarga = (persentasePinjaman / 100) * parseFloat(rhargaBarang);
                        $('input[name="inputmaksimal_pinjam"]').val(taksiranHarga);
                        var formattedTaksiranHarga = formatRupiah(taksiranHarga.toFixed(0));
                        $('.maksimal_pinjaman').text(formattedTaksiranHarga);
                    }

                    function formatRupiah(angka) {
                        if (angka == '') {
                            $.notify({
                                icon: 'flaticon-alarm-1',
                                title: 'Silahkan Input Harga Barang',
                                message: err,
                            }, {
                                type: 'secondary',
                                placement: {
                                    from: "top",
                                    align: "right"
                                },
                                time: 3000,
                                z_index: 2000
                            });
                        } else {
                            var reverse = angka?.toString().split('').reverse().join('');
                            var ribuan = reverse?.match(/\d{1,3}/g);
                            var formatted = ribuan?.join('.').split('').reverse().join('');
                            return formatted === undefined ? 'Silahkan masukan nilai' :
                                'Rp ' + formatted;
                        }
                    }

                    function validatePercentageInput() {
                        var input = $('#persentase_pinjaman').val();
                        var regex = /^(100(\.0{1,2})?|\d{1,2}(\.\d{1,2})?)$/;

                        if (!regex.test(input)) {
                            $('#persentase_pinjaman').addClass('is-invalid');
                        } else {
                            var keluaranTahunValue = $('select[name="keluaran_tahun"]').val();
                            console.log(keluaranTahunValue, 'tahun valuenya');
                            // console.log($('#persentase_pinjaman').val(), 'tahun valuenya');
                            calculateTaksiranHarga()
                            $('#persentase_pinjaman').removeClass('is-invalid');

                            // if (keluaranTahunValue < 2020) {
                            //     console.log(keluaranTahunValue < 2020, 'benar');
                            //     if ($('#persentase_pinjaman').val() >= 25 || $('#persentase_pinjaman').val() <=
                            //         30) {
                            //         $('#persentase_pinjaman').removeClass('is-invalid');
                            //         calculateTaksiranHarga()

                            //     } else {
                            //         $('#persentase_pinjaman').addClass('is-invalid');
                            //         Swal.fire('error', 'Barang dibawah 2020 Persentase antara 25 dan 30 ',
                            //             'error');

                            //     }

                            // } else if (keluaranTahunValue >= 2030) {
                            //     if ($('#persentase_pinjaman').val() >= 40 || $('#persentase_pinjaman').val() <=
                            //         50) {
                            //         $('#persentase_pinjaman').removeClass('is-invalid');
                            //         calculateTaksiranHarga()

                            //     } else {
                            //         $('#persentase_pinjaman').addClass('is-invalid');
                            //         Swal.fire('error', 'Barang dibawah 2020 Persentase antara 40 dan 50 ',
                            //             'error');

                            //     }
                            // }

                        }
                    }

                    $('input[name="taksiran_harga"]').on('input', function() {
                        var persentaseInput = $('#persentase_pinjaman').val();
                        var regex = /^(100(\.0{1,2})?|\d{1,2}(\.\d{1,2})?)$/;
                        if ($('select[name="keluaran_tahun"]').val() == '') {
                            Swal.fire('error', 'Tahun wajib di pilih', 'error');
                        } else {
                            if (persentaseInput.trim() === '') {
                                $('#persentase_pinjaman').addClass('is-invalid');
                                $('.invalid-feedback').html('Silahkan isi persentase pinjaman.');
                            } else if (!regex.test(persentaseInput)) {
                                $('#persentase_pinjaman').addClass('is-invalid');
                                $('.invalid-feedback').html(
                                    'Pastikan angka persen di antara 0 dan 100.');
                            } else {
                                $('#persentase_pinjaman').removeClass('is-invalid');
                                $('.invalid-feedback').html('');

                                calculateTaksiranHarga();
                            }
                        }
                    });

                    $('select[name="keluaran_tahun"]').on('change', function() {
                        var fkeluaran_tahun = $(this).val();

                        if (fkeluaran_tahun < 2020) {
                            $('#keterangan_persentase').html(
                                'Barang di bawah 2020, nominal maksimal 25-30%');
                            console.log("Barang di bawah 2020, nominal maksimal 25-30%");
                        } else if (fkeluaran_tahun >= 2030) {
                            $('#keterangan_persentase').html(
                                'Barang di atas atau sama dengan 2030, nominal maksimal 40-50%');
                        } else {
                            $('#keterangan_persentase').html(
                                'Barang di atas atau sama dengan 2030, nominal maksimal 40-50%');

                        }
                    });


                    $('input[name="jumlah_diambil"]').on('input', function() {
                        var inputmaksimal_pinjam = parseInt($('input[name="inputmaksimal_pinjam"]')
                            .val());
                        var jumlah_ambil = $(this).val();
                        var valueJambil = parseInt(jumlah_ambil?.replace(/\./g, ''));
                        console.log(valueJambil, 'adsa');
                        console.log(inputmaksimal_pinjam, 'maks')
                        console.log(valueJambil > inputmaksimal_pinjam, 'maks')
                        if (valueJambil <= inputmaksimal_pinjam) {
                            $('#jumlah_diambil').removeClass('is-invalid');
                        } else {
                            Swal.fire('error',
                                'Gagal Pastikan maksimal pinjaman harus sama atau lebih kecil dari nilai maksimal',
                                'error');
                            $('#jumlah_diambil').addClass('is-invalid');
                        }
                    });

                    $('#persentase_pinjaman').on('input', function() {
                        validatePercentageInput();
                    });
                    $('.simpan').on('submit', function(e) {
                        e.preventDefault();
                        Swal.fire({
                            title: "Pastikan Semua data sudah benar",
                            html: "<p>Pastikan semua data sudah benar dan koreksi terlebih dahulu sebelum submit.</p><p>Silahkan Pilih Status Nasabah Berikut :.</p>",
                            showCancelButton: true,
                            showDenyButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Approve",
                            denyButtonText: "Datang",
                            cancelButtonText: "Cancel / Periksa Inputan", // Teks pada tombol batal
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var datastring = new FormData(this);
                                datastring.append('status_nasabah', 1);

                                Swal.fire({
                                    title: 'Menyimpan data transaksi...',
                                    allowOutsideClick: false,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                });
                                Swal.showLoading();

                                $.ajax({
                                    url: "{{ route('app.save_transaksi') }}",
                                    method: "POST",
                                    data: datastring,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    beforeSend: function() {
                                        $.notify({
                                            icon: 'flaticon-loading-1',
                                            title: 'Processing',
                                            message: 'Sedang Memproses Penyimpanan Data .....',
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "center",
                                                align: "right"
                                            },
                                            time: 1000,
                                            z_index: 2000
                                        });

                                    },
                                    success: function(data) {
                                        var id_transaction = data.idtransaksi;
                                        $.pjax({
                                            container: '#pjax-container',
                                            url: '{{ Url('app/detail_transaksi') }}/' +
                                                id_transaction,
                                            push: false
                                        });


                                        Swal.fire('success', 'Transaksi berhasil',
                                            'success');

                                        $.notify({
                                            icon: 'flaticon-alarm-1',
                                            title: 'Info',
                                            message: 'Berhasil di Simpan',
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "center",
                                                align: "right"
                                            },
                                            time: 1000,
                                            z_index: 2000
                                        });
                                    },
                                    error: function(data) {
                                        console.log(data);
                                        var div = $('#container');
                                        setInterval(function() {
                                            var pos = div.scrollTop();
                                            div.scrollTop(pos + 2);
                                        }, 10)
                                        err = '';
                                        respon = data.responseJSON?.messages;

                                        Swal.fire('error', respon, 'error');

                                        // $.each(respon.errors, function(index, value) {
                                        //     err += "<li>" + value + "</li>";
                                        // });

                                        $('#render_error').html(
                                            `<div class="alert alert-danger">${respon}</div>`
                                        );

                                        Swal.fire('error', respon, 'error data');
                                        $.notify({
                                            icon: 'flaticon-alarm-1',
                                            title: 'Opp Seperti nya lupa inputan berikut :',
                                            message: respon,
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "top",
                                                align: "right"
                                            },
                                            time: 3000,
                                            z_index: 2000
                                        });

                                    }
                                })

                            } else if (result.isDenied) {
                                var datastring = new FormData(this);
                                datastring.append('status_nasabah', 4);
                                Swal.fire({
                                    title: 'Menyimpan data transaksi...',
                                    allowOutsideClick: false,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                });
                                Swal.showLoading();

                                $.ajax({
                                    url: "{{ route('app.save_transaksi') }}",
                                    method: "POST",
                                    data: datastring,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    beforeSend: function() {
                                        $.notify({
                                            icon: 'flaticon-loading-1',
                                            title: 'Processing',
                                            message: 'Sedang Memproses Penyimpanan Data .....',
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "center",
                                                align: "right"
                                            },
                                            time: 1000,
                                            z_index: 2000
                                        });

                                    },
                                    success: function(data) {
                                        var id_transaction = data.idtransaksi;
                                        $.pjax({
                                            container: '#pjax-container',
                                            url: '{{ Url('app/detail_transaksi') }}/' +
                                                id_transaction,
                                            push: false
                                        });


                                        Swal.fire('success',
                                            'Status berhasil disimpan ke datang',
                                            'success');

                                        $.notify({
                                            icon: 'flaticon-alarm-1',
                                            title: 'Info',
                                            message: 'Status berhasil disimpan ke datang',
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "center",
                                                align: "right"
                                            },
                                            time: 1000,
                                            z_index: 2000
                                        });
                                    },
                                    error: function(data) {
                                        console.log(data);
                                        var div = $('#container');
                                        setInterval(function() {
                                            var pos = div.scrollTop();
                                            div.scrollTop(pos + 2);
                                        }, 10)
                                        err = '';
                                        respon = data.responseJSON?.messages;

                                        Swal.fire('error', respon, 'error');

                                        $('#render_error').html(
                                            `<div class="alert alert-danger">${respon}</div>`
                                        );

                                        Swal.fire('error', respon, 'error data');
                                        $.notify({
                                            icon: 'flaticon-alarm-1',
                                            title: 'Opp Seperti nya lupa inputan berikut :',
                                            message: respon,
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "top",
                                                align: "right"
                                            },
                                            time: 3000,
                                            z_index: 2000
                                        });

                                    }
                                })
                            } else if (result.isDismissed && result.dismiss === Swal
                                .DismissReason
                                .cancel) {

                                var datastring = new FormData(this);
                                datastring.append('status_nasabah', 5);
                                Swal.fire({
                                    title: 'Menyimpan data transaksi...',
                                    allowOutsideClick: false,
                                    showCancelButton: false,
                                    showConfirmButton: false,
                                });
                                Swal.showLoading();

                                $.ajax({
                                    url: "{{ route('app.save_transaksi') }}",
                                    method: "POST",
                                    data: datastring,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    beforeSend: function() {
                                        $.notify({
                                            icon: 'flaticon-loading-1',
                                            title: 'Processing',
                                            message: 'Sedang Memproses Penyimpanan Data .....',
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "center",
                                                align: "right"
                                            },
                                            time: 1000,
                                            z_index: 2000
                                        });

                                    },
                                    success: function(data) {

                                        var id_transaction = data.idtransaksi;
                                        $.pjax({
                                            container: '#pjax-container',
                                            url: '{{ Url('app/detail_transaksi') }}/' +
                                                id_transaction,
                                            push: false
                                        });

                                        Swal.fire('success',
                                            'Transaksi di batalkan',
                                            'success');

                                        $.notify({
                                            icon: 'flaticon-alarm-1',
                                            title: 'Info',
                                            message: 'Berhasil di Simpan',
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "center",
                                                align: "right"
                                            },
                                            time: 1000,
                                            z_index: 2000
                                        });
                                    },
                                    error: function(data) {
                                        console.log(data);
                                        var div = $('#container');
                                        setInterval(function() {
                                            var pos = div.scrollTop();
                                            div.scrollTop(pos + 2);
                                        }, 10)
                                        err = '';
                                        respon = data.responseJSON?.messages;

                                        Swal.fire('error', respon, 'error');

                                        // $.each(respon.errors, function(index, value) {
                                        //     err += "<li>" + value + "</li>";
                                        // });

                                        $('#render_error').html(
                                            `<div class="alert alert-danger">${respon}</div>`
                                        );

                                        Swal.fire('error', respon, 'error data');
                                        $.notify({
                                            icon: 'flaticon-alarm-1',
                                            title: 'Opp Seperti nya lupa inputan berikut :',
                                            message: respon,
                                        }, {
                                            type: 'secondary',
                                            placement: {
                                                from: "top",
                                                align: "right"
                                            },
                                            time: 3000,
                                            z_index: 2000
                                        });

                                    }
                                })

                            }
                        })
                    });
                    $('.ayamayam').hide();

                    // edit
                });

                // $.fn.dataTable.ext.errMode = 'throw';
                var table = $('#datatable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            className: 'btn btn-info btn-xs'
                        },
                        {
                            extend: 'excelHtml5',
                            className: 'btn btn-success btn-xs'
                        },
                        {
                            extend: 'csvHtml5',
                            className: 'btn btn-warning btn-xs'
                        },
                        {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            className: 'btn btn-prirmay btn-xs'
                        }
                    ],
                    processing: true,
                    serverSide: true,
                    order: [1, 'asc'],
                    pageLength: 10,
                    ajax: {
                        url: "{{ route('api.nasabah') }}",
                        method: 'POST',
                        data: function(data) {
                            data.dari = $('#dari').val();
                            data.sampai = $('#sampai').val();

                        },
                        _token: "{{ csrf_token() }}",
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            align: 'center',
                            className: 'text-center'

                        },
                        {
                            data: 'nik',
                            name: 'nik',
                        },
                        {
                            data: 'no_anggota',
                            name: 'no_anggota',
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'jk',
                            name: 'jk',
                            orderable: false,
                            searchable: false,
                            render: function({
                                data,
                                row,
                                type
                            }) {
                                if (data === 'L') {
                                    return 'Laki - laki';
                                } else {
                                    return 'Perempuan';
                                }
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        }
                    ]

                });

                @include('layouts.tablechecked');

                function del() {
                    var c = new Array();
                    $("input:checked").each(function() {
                        c.push($(this).val());
                    });
                    if (c.length == 0) {
                        $.alert("Silahkan memilih data yang akan dihapus.");
                    } else {
                        $.post("{{ Url('/', ':id') }}", {
                            '_method': 'DELETE',
                            'id': c
                        }, function(data) {
                            $('#datatable').DataTable().ajax.reload();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Data berhasil di hapus',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }, "JSON").fail(function(data) {
                            $('#datatable').DataTable().ajax.reload();

                            err = '';
                            respon = data.responseJSON;
                            // $.each(respon.errors, function(index, value) {
                            //     err += "<li>" + value + "</li>";
                            // });

                            // $.notify({
                            //     icon: 'flaticon-alarm-1',
                            //     title: 'Akses tidak bisa',
                            //     message: err,
                            // }, {
                            //     type: 'secondary',
                            //     placement: {
                            //         from: "top",
                            //         align: "right"
                            //     },
                            //     time: 3000,
                            //     z_index: 2000
                            // });
                        });
                    }
                }



                // action of bussiness flow apps 
                $(document).ready(function() {
                    $('.cancel_transaction').on('click', function() {
                        Swal.fire({
                            title: "Anda Yakin? ",
                            text: "Membatalkan Transaksi Gadai",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Ok"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.pjax({
                                    container: '#pjax-container', // ID dari kontainer yang akan di-refresh
                                    url: '{{ Url('app/transaksi') }}', // URL yang akan dimuat secara dinamis
                                    push: false // Menonaktifkan perubahan URL di baris alamat
                                });

                            }
                        })
                    })

                });
            });
        </script>
    @endsection
