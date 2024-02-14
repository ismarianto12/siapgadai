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
                        <table id="datatable" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>No Faktur</th>
                                    <th>No Hanphpone</th>
                                    <th>Maks Pinjaman</th>
                                    <th>Limit Pinjaman</th>
                                    <th>Jumlah Diambil</th>
                                    <th>Administrasi</th>
                                    <th>Durasi Peminjaman</th>
                                    <th>Jatuh Tempo</th>
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
        {{-- <div class="row row-card-no-pd">
            <div class="col-sm-4 col-md-4">
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
                                    <h4 class="card-title">{{ Properti_app::getCabang(Auth::user()->cabang_id, 'nama_cabang') }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> --}}
        <form class="simpan" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_transaksi" value="" />
            <input type="hidden" name="id_nasabah" id="id_nasabah" />
            <input type="hidden" name="perhitungan_biaya_id" id="perhitungan_biaya_id" />
            <input type="hidden" name="pokok" id="pokok" />
            <input type="hidden" name="bunga" id="bunga" />

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
                                    <input type="text" id="no_kwitansi" name="no_kwitansi" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_faktur" class="col-md-4 text-left">No. Faktur:</label>
                                <div class="col-md-8">
                                    <input type="text" id="no_faktur" name="no_faktur" class="form-control" />
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
                                    <input type="text" id="no_anggota" name="no_anggota" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="created_at" class="col-md-4 text-left">Tanggal Transaksi:</label>
                                <div class="col-md-8">
                                    <input type="date" id="created_at" name="created_at" class="datepicker form-control"
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
                            <label class="col-md-4 text-left">Jenis Barang</label>
                            <div class="col-md-8">
                                <select name="id_barang" class="form-control" readonly>
                                    <option value=""></option>
                                    @foreach (Properti_app::masterBarang() as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-left">Type Barang</label>
                            <div class="col-md-8">
                                <input type="text" name="type" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-left">Nama Barang</label>
                            <div class="col-md-8">
                                <input type="text" name="merek_barang" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 text-left">Taksiran Harga</label>
                            <div class="col-md-8">
                                <input type="double" name="taksiran_harga" id="taksiran_harga"
                                    class="number_format form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-6 text-left">Persentase Pinjaman</label>
                            <div class="col-md-6">
                                <div class="input-group">

                                    <input type="text" name="persentase_pinjaman" id="persentase_pinjaman"
                                        class="form-control" />
                                    <span class="input-group-addon">%</span>

                                </div>


                            </div>
                            <div class="invalid-feedback" id="customError_persentase"></div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Tahun Barang</label>
                            <div class="col-md-8">
                                <input type="number" name="keluaran_tahun" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">No. Imei</label>
                            <div class="col-md-8">
                                <input type="text" name="no_imei" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-left">Kelengkapan</label>
                            <div class="col-md-8">
                                <textarea type="text" name="kelengkapan" class="form-control" readonly></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 text-left">Foto Barang</label>
                            <div class="foto_barang_img col-md-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-left">Administrasi</label>
                            <div class="col-md-8">
                                <input type="text" name="administrasi" class="number_format form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger d-flex justify-content-between">
                <div class="align-items-left">
                    <h4 style="color: #000">C. Data Nasabah</h4>
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
                                    <input type="text" id="nama_nasabah" name="nama_nasabah" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nik" class="col-md-4 text-left">NIK:</label>
                                <div class="col-md-8">
                                    <input type="text" id="nik" name="nik" class="form-control" />
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
                                    <textarea id="alamat" name="alamat" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="rt_rw" class="col-md-3 text-left">Rt/Rw:</label>
                                <div class="col-md-9">
                                    <input type="text" id="rt_rw" name="rt_rw" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kelurahan" class="col-md-3 text-left">Kelurahan:</label>
                                <div class="col-md-9">
                                    <textarea id="kelurahan" name="kelurahan" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kecamatan" class="col-md-3 text-left">Kecamatan:</label>
                                <div class="col-md-9">
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kecamatan" class="col-md-3 text-left">No Handphone:</label>
                                <div class="col-md-9">
                                    <input type="number" id="no_hp" name="no_hp" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kabupaten_kota" class="col-md-3 text-left">Kabupaten/Kota:</label>
                                <div class="col-md-9">
                                    <input type="text" id="kabupaten_kota" name="kabupaten_kota"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kabupaten_kota" class="col-md-3 text-left">Tujuan Gadai:</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="tujuan_gadai"></textarea>
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

                {{-- <div class="container row">

                    <div class="col-md-4">
                        <label for="maks_pinjaman" class="form-label">Total Pinjam:</label>
                        <div class="rtotalpinjam">
                        </div>
                    </div>

                    <div class="col-md-4">
                        &nbsp; <label for="diabayarkan" class="form-label">Jumlah yang bayar:</label>
                        &nbsp;<input type="text" id="diabayarkan" name="diabayarkan"
                            class="number_format form-control" />
                    </div>
                    <div class="col-md-4">
                        &nbsp; <label for="jumlah_diambil" class="form-label">Bukti bayar:</label>
                        &nbsp;<input type="file" id="bukti_bayar" name="bukti_bayar"
                            class="number_format form-control" />
                    </div>
                </div> --}}

                <div class="col-md-6" style="margin-top: 25px">
                    <button class="cancel_transaction btn btn-danger btn-block"><b>Batal</b></button>
                </div>
                <div class="col-md-6" style="margin-top: 25px">
                    <button class="btn btn-info btn-block"><b>Simpan</b></button>
                </div>
            </div>

        </form>

        <script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

        <script>
            // addd

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
                $('input[name="no_kwitansi"]').on('click', function(event) {
                    $('#formmodal').modal('show');
                });
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
                    var rhargaBarang = hargaBarang?.replace(/\./g, '');;
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
                        $('#persentase_pinjaman').removeClass('is-invalid');
                        calculateTaksiranHarga()

                    }
                }

                $('input[name="taksiran_harga"]').on('input', function() {
                    var persentaseInput = $('#persentase_pinjaman').val();
                    var regex = /^(100(\.0{1,2})?|\d{1,2}(\.\d{1,2})?)$/;

                    if (persentaseInput.trim() === '') {
                        $('#persentase_pinjaman').addClass('is-invalid');
                        $('.invalid-feedback').html('Silahkan isi persentase pinjaman.');
                    } else if (!regex.test(persentaseInput)) {
                        $('#persentase_pinjaman').addClass('is-invalid');
                        $('.invalid-feedback').html('Pastikan angka persen di antara 0 dan 100.');
                    } else {
                        $('#persentase_pinjaman').removeClass('is-invalid');
                        $('.invalid-feedback').html('');

                        calculateTaksiranHarga();
                    }
                });

                $('input[name="jumlah_diambil"]').on('input', function() {
                    var inputmaksimal_pinjam = parseInt($('input[name="inputmaksimal_pinjam"]').val());
                    var jumlah_ambil = $(this).val();
                    var valueJambil = parseInt(jumlah_ambil?.replace(/\./g, ''));
                    console.log(valueJambil, 'adsa');
                    console.log(inputmaksimal_pinjam, 'maks')

                    console.log(valueJambil > inputmaksimal_pinjam, 'maks')
                    if (valueJambil > inputmaksimal_pinjam) {
                        Swal.fire('error',
                            'Gagal Pastikan maksimal pinjaman harus sama atau lebih kecil dari nilai maksimal',
                            'error');
                        $('#jumlah_diambil').addClass('is-invalid');
                    } else {
                        $('#jumlah_diambil').removeClass('is-invalid');
                    }
                });

                $('#persentase_pinjaman').on('input', function() {
                    validatePercentageInput();
                });
                $('.simpan').on('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Proses Edit data ...',
                        allowOutsideClick: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    Swal.showLoading();

                    Swal.fire({
                        title: "Sebelum Submit ",
                        text: "Pastikan Semua data sudah benar",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ok"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var datastring = new FormData(this);
                            Swal.fire({
                                title: 'Menyimpan data transaksi...',
                                allowOutsideClick: false,
                                showCancelButton: false,
                                showConfirmButton: false,
                            });
                            Swal.showLoading();
                            $.ajax({
                                url: "{{ route('app.transaksi.action_update_transaksi') }}",
                                method: "POST",
                                data: datastring,
                                cache: false,
                                contentType: false,
                                processData: false,

                                success: function(data) {
                                    var id_transaction = data.idtransaksi;
                                    $.pjax({
                                        container: '#pjax-container',
                                        url: '{{ Url('proses/pegadaian') }}?ref=' +
                                            id_transaction,
                                        push: false
                                    });


                                    Swal.fire('success', 'Transaksi berhasil', 'success');

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
                                    var div = $('#container');
                                    setInterval(function() {
                                        var pos = div.scrollTop();
                                        div.scrollTop(pos + 2);
                                    }, 10)
                                    err = '';
                                    respon = data.responseJSON;
                                    Swal.fire('error', respon, 'error data');
                                }
                            })
                        }
                    })
                });

                $('.ayamayam').hide();
                $('#add_data').on('click', function() {
                    $('#formmodal').modal('show');
                    addUrl = '';
                    $('#form_content').html('<center><h3>Loading ...</h3></center>').load(addUrl);
                });

                // edit

                function clearall() {

                    $('input[name="transaksi_id"]').val("");
                    $('input[name="id_nasabah"]').val("");
                    $('input[name="perhitungan_biaya_id"]').val("");
                    $('input[name="pokok"]').val("");
                    $('input[name="bunga"]').val("");
                    $('input[name="created_at"]').val("");
                    $('input[name="id_transaksi"]').val("");
                    $('input[name="no_kwitansi"]').val("");
                    $('input[name="no_faktur"]').val("");
                    $('input[name="no_anggota"]').val("");
                    $('input[name="tgl_jatuh_tempo"]').val("");
                    $('input[name="referal_code"]').val("");
                    $('input[name="id_barang"]').val("");
                    $('input[name="type"]').val("");
                    $('input[name="merek_barang"]').val("");
                    $('input[name="taksiran_harga"]').val("");
                    $('input[name="persentase_pinjaman"]').val("");
                    $('input[name="keluaran_tahun"]').val("");
                    $('input[name="no_imei"]').val("");
                    $('textarea[name="kelengkapan"]').val("");
                    $('input[name="foto_barang"]').val("");
                    $('input[name="administrasi"]').val("");
                    $('input[name="nama_nasabah"]').val("");
                    $('input[name="nik"]').val("");
                    $('input[name="jenis_kelamin"]').val("");
                    $('input[name="alamat"]').val("");
                    $('input[name="rt_rw"]').val("");
                    $('textarea[name="kelurahan"]').val("");
                    $('input[name="kecamatan"]').val("");
                    $('input[name="no_hp"]').val("");
                    $('input[name="kabupaten_kota"]').val("");
                    $('input[name="tujuan_gadai"]').val("");
                    $('input[name="jumlah_diambil"]').val("");
                    $('input[name="inputmaksimal_pinjam"]').val("");
                    $('.foto_barang_img').html("");

                }

                function getall(data) {
                    $('input[name="id_transaksi"]').val(data?.id);
                    $('input[name="created_at"]').val(data?.tanggal_transaksi);
                    $('input[name="no_kwitansi"]').val(data?.no_kwitansi);
                    $('input[name="no_faktur"]').val(data?.no_faktur);
                    $('input[name="no_anggota"]').val(data?.no_anggota);
                    $('input[name="tgl_jatuh_tempo"]').val(data?.tanggal_jatuh_tempo);
                    $('input[name="referal_code"]').val(data?.referal_code);
                    $('input[name="id_barang"]').val(data?.id_barang);
                    $('input[name="type"]').val(data?.type);
                    $('input[name="merek_barang"]').val(data?.merek_barang);
                    $('input[name="taksiran_harga"]').val(data?.taksiran_harga);
                    $('input[name="persentase_pinjaman"]').val(data?.persentase_pinjaman);
                    $('input[name="keluaran_tahun"]').val(data?.keluaran_tahun);
                    $('input[name="no_imei"]').val(data?.no_imei);
                    $('textarea[name="kelengkapan"]').val(data?.kelengkapan);
                    // $('input[name="foto_barang"]').val(data?.foto_barang);
                    $('input[name="administrasi"]').val(data?.administrasi);
                    $('input[name="nama_nasabah"]').val(data?.nama);
                    $('input[name="nik"]').val(data?.nik);
                    $('input[name="jenis_kelamin"]').val(data?.jenis_kelamin);
                    $('textarea[name="alamat"]').val(data?.no_kwitansi);
                    $('input[name="rt_rw"]').val(data?.rt_rw);
                    $('textarea[name="kelurahan"]').val(data?.kelurahan);
                    $('input[name="kecamatan"]').val(data?.kecamatan);
                    $('input[name="no_hp"]').val(data?.no_hp);
                    $('input[name="kabupaten_kota"]').val(data?.kab_kota);
                    $('textarea[name="tujuan_gadai"]').val(data?.tujuan_gadai);
                    $('input[name="jumlah_diambil"]').val(data?.jumlah_diambil);
                    $('input[name="inputmaksimal_pinjam"]').val(data?.inputmaksimal_pinjam);
                    $('.rtotalpinjam').html(`<h2>${formatRupiah(data?.maks_pinjaman)}</h2>`);
                    $('.foto_barang_img').html(`
                        <img src="{{ Url('/file_gadai/') }}/${data?.foto_barang}" class="img-responsive" style="width:50%">
                    `);
                }

                $('#datatable').on('click', '.checkpelunasan', function(e) {
                    e.preventDefault();
                    clearall();
                    id = $(this).data('transaksi_id');
                    Swal.fire({
                        title: 'Please Wait ...',
                        allowOutsideClick: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                    });
                    Swal.showLoading();
                    $.ajax({
                        url: "{{ route('api.call_detail_transaction') }}",
                        method: "POST",
                        data: {
                            transaksi_id: id
                        },
                        success: function(data) {
                            Swal.close();
                            console.log(data.data, 'detail data')
                            getall(data?.data)
                            $('#formmodal').modal('hide');

                        },
                        error: function(data) {
                            Swal.fire('error', 'gagal mengambil data nasabah', 'error');
                        }
                    });


                })
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
                        $.each(respon.errors, function(index, value) {
                            err += "<li>" + value + "</li>";
                        });

                        $.notify({
                            icon: 'flaticon-alarm-1',
                            title: 'Akses tidak bisa',
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



            $.fn.dataTable.ext.errMode = 'throw';
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
                    url: "{{ route('api.nasabah_belum_lunas') }}",
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
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'no_faktur',
                        name: 'no_faktur',
                    },
                    {
                        data: 'no_handphone',
                        name: 'no_handphone',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'maks_pinjaman',
                        name: 'maks_pinjaman',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'jumlah_pinjaman',
                        name: 'jumlah_pinjaman',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'jumlah_diambil',
                        name: 'jumlah_diambil',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'administrasi',
                        name: 'administrasi',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'durasi_pinjam',
                        name: 'durasi_pinjam',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'tanggal_jatuh_tempo',
                        name: 'tanggal_jatuh_tempo',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]

            });
        </script>
    @endsection
