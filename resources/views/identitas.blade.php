@extends('layouts.template')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Identitas Aplikasi</h2>
                    <h5 class="text-white op-7 mb-2">{{ Properti_app::identitas_app() }}</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div id="alert"></div>
                    </div>
                    <div class="card-body">
                        <form id="exampleValidation" action="" method="POST" class="simpan"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama
                                        Aplikasi
                                        <span class="required-label">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_aplikasi" class="form-control"
                                            value="Sistem Informasi Gadai" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Telp.
                                    <span class="required-label">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="telp" value="{{ $data->telp }}" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Perusahaan.
                                    <span class="required-label">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_perusahaan" value="{{ $data->nama_perusahaan }}"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Pemilik Binis
                                    <span class="required-label">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="telp" value="{{ $data->telp }}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email Perusahaan
                                    <span class="required-label">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" value="{{ $data->email }}" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group form-show-validation row">
                                <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Fax<span
                                        class="required-label">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="fax" value="{{ $data->fax }}" class="form-control" />
                                </div>
                            </div>

                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="simpan btn btn-success btn-xs" type="submit" value="Edit">
                                        <a href="#" class="btn btn-danger btn-xs" id="cancel">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.simpan').on('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Sebelum Submit",
                    text: "Pastikan Semua data sudah benar",
                    icon: "warning",
                    showCancelButton: true,
                    showDenyButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Save",
                    // Teks pada tombol batal
                }).then((result) => {
                    if (result.isConfirmed) {
                        var datastring = new FormData(this);
                        Swal.fire({
                            title: 'Menyimpan data Identitas...',
                            allowOutsideClick: false,
                            showCancelButton: false,
                            showConfirmButton: false,
                        });
                        Swal.showLoading();
                        $.ajax({
                            url: "{{ route('master.save_identitas') }}",
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
                                Swal.fire('success', 'Identitas berhasil diupdate',
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
                        // Logika jika tombol "Datang" ditekan
                        console.log("Datang");
                    } else if (result.isDismissed && result.dismiss === Swal
                        .DismissReason
                        .cancel) {
                        console.log("Cancelled");
                    }
                })
            });
        });
    </script>
@endsection
