@extends('layouts.template')
@section('content')
    @include('layouts.breadcum')
    <div class="col-md-12">
        <div class="row row-card-no-pd">
            <div class="col-sm-4 col-md-4">
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
                                    <h4 class="card-title">Mampang Prapatan</h4>
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
                                        readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_faktur" class="col-md-4 text-left">No. Faktur:</label>
                                <div class="col-md-8">
                                    <input type="text" id="no_faktur" name="no_faktur" class="form-control" readonly />
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
                                    <input type="text" id="no_anggota" name="no_anggota" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_jatuh_tempo" class="col-md-4 text-left">Tanggal Jatuh Tempo:</label>
                                <div class="col-md-8">
                                    <input type="date" id="tgl_jatuh_tempo" name="tgl_jatuh_tempo"
                                        class="datepicker form-control" />
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
                            <label class="col-md-2 text-left">Jenis Barang</label>
                            <div class="col-md-10">
                                <select name="id_barang" class="form-control" readonly>
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
                                <input type="text" name="type" class="form-control" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 text-left">Nama Barang</label>
                            <div class="col-md-10">
                                <input type="text" name="merek_barang" class="form-control" readonly />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 text-left">Taksiran Harga</label>
                            <div class="col-md-10">
                                <input type="double" name="taksiran_harga" id="taksiran_harga"
                                    class="number_format form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-6 text-left">Persentase Pinjaman</label>
                            <div class="col-md-6">
                                <div class="input-group">

                                    <input type="text" name="persentase_pinjaman" id="persentase_pinjaman"
                                        class="form-control" readonly />
                                    <span class="input-group-addon">%</span>

                                </div>


                            </div>
                            <div class="invalid-feedback" id="customError_persentase"></div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-2 text-left">Tahun Barang</label>
                            <div class="col-md-10">
                                <input type="number" name="keluaran_tahun" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 text-left">No. Imei</label>
                            <div class="col-md-10">
                                <input type="text" name="no_imei" class="form-control" readonly />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 text-left">Kelengkapan</label>
                            <div class="col-md-10">
                                <textarea type="text" name="kelengkapan" class="form-control" readonly></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 text-left">Foto Barang</label>
                            <div class="col-md-10">
                                <input type="file" name="foto_barang" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 text-left">Administrasi</label>
                            <div class="col-md-10">
                                <input type="text" name="administrasi" class="number_format form-control" readonly />
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
                    <button class="btn btn-primary btn-round ml-auto btn-sm" id="add_data">
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
                                <label for="nama_nasabah" class="col-md-2 text-left">Nama Nasabah:</label>
                                <div class="col-md-8">
                                    <input type="text" id="nama_nasabah" name="nama_nasabah" class="form-control"
                                        readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nik" class="col-md-2 text-left">NIK:</label>
                                <div class="col-md-8">
                                    <input type="text" id="nik" name="nik" class="form-control" readonly />
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
                                <label for="rt_rw" class="col-md-3 text-left">Rt/Rw:</label>
                                <div class="col-md-9">
                                    <input type="text" id="rt_rw" name="rt_rw" class="form-control" readonly />
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
                                    <input type="text" id="kecamatan" name="kecamatan" class="form-control"
                                        readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kecamatan" class="col-md-3 text-left">No Handphone:</label>
                                <div class="col-md-9">
                                    <input type="number" id="no_hp" name="no_hp" class="form-control" readonly />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kabupaten_kota" class="col-md-3 text-left">Kabupaten/Kota:</label>
                                <div class="col-md-9">
                                    <input type="text" id="kabupaten_kota" name="kabupaten_kota" class="form-control"
                                        readonly />
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

                <div class="container row">

                    <div class="col-md-6">
                        <label for="maks_pinjaman" class="form-label">Total Pinjam:</label>
                        <input type="hidden" name="inputmaksimal_pinjam" id="inputmaksimal_pinjam" />
                        <h1>

                           Rp. {{ Properti_app::formatRupiah($data->jumlah_pinjaman) }}

                        </h1>
                    </div>

                    <div class="col-md-6">
                        &nbsp; <label for="jumlah_diambil" class="form-label">Jumlah yang bayar:</label>
                        &nbsp;<input type="text" id="jumlah_diambil" name="jumlah_diambil"
                            class="number_format form-control" readonly />
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
                                    $.each(respon.errors, function(index, value) {
                                        err += "<li>" + value + "</li>";
                                    });

                                    Swal.fire('error', err, 'error data');
                                    $.notify({
                                        icon: 'flaticon-alarm-1',
                                        title: 'Opp Seperti nya lupa inputan berikut :',
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
                $('#datatable').on('click', '#edit', function(e) {
                    e.preventDefault();
                    $('#formmodal').modal('show');
                    id = $(this).data('id');
                    addUrl = ''.replace(':id', id);
                    $('#form_content').html('<center><h3>Loading Edit Data ...</h3></center>').load(addUrl);

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
                $('.js-example-basic-single').select2({
                    width: '100%'
                });
            });
        </script>
    @endsection