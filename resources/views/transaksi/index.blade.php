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
        <div class="row row-card-no-pd" style="padding: 10px">
            <table class="table table-head-bg-success">
                <thead>
                    <tr>
                        <th scope="col"><input type='checkbox' name='cbox[]' /></th>
                        <th scope="col">Type Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Keluaran</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Limit Pinjaman</th>
                        <th scope="col">Foto</th>
                        <th scope="col"><button class="btn btn-icon btn-primary btn-round btn-xs" id="_addtransaction">
                                <i class="fa fa-plus"></i>
                            </button>

                        </th>
                    </tr>
                </thead>
                <tbody class="_render_content_body">
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <th colspan="5">Maks Pinjaman </th>
                        <td>@IDR</td>
                    </tr>
                    <tr>
                        <td></td>
                        <th colspan="5">Jumlah yang diambil </th>
                        <td>@IDR</td>
                    </tr>
                </tfoot>
            </table>


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
                <button class="cancel_transaction btn btn-danger btn-block"><b>Batal</b></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info btn-block"><b>Simpan</b></button>
            </div>

        </div>


    </div>

    <script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

    <script>
        // addd
        var elements = document.querySelectorAll('.wrapper');
        elements.forEach(function(element) {
            element.classList.add('sidebar_minimize');
        });

        $(function() {

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

            let number = 1;
            $("#_addtransaction").on('click', function(e) {
                e.preventDefault();
                $('._render_content_body').append(`
                    <tr>
                        <td>${number}</td>
                        <td>
                            <input type="hidden" name="transaction_id" value="${number}" />
                            <select name="tipe_barang">  
                            <option value=""></option>
                                @foreach (Properti_app::tipe_barang() as $type)
                                <option value={{ $type->id }}> {{ $type->nama_kategori }}</option> 
                                @endforeach
                            </td>
                        <td><input type="text" name="nama_barang" id="nama_barang${number}"><button class="btn btn-icon btn-danger btn-round btn-xs">
                                <i class="fa fa-search" id="bandingkan_harga${number}"></i>
                            </button></td>
                            <td><input type="text" name="keluaran[]" id="keluaran_${number}"></td>
                            <td><input type="decimal" name="harga[]" id="harga_${number}"></td> 
                        <td><input type="text" name="limit_pinjaman[]" id="limit_pinjaman_${number}" placeholder="dalam persen"></td>
                        <td><input type="file" name="foto[]"></td>
                        <td colspan="2"><button class="btn btn-icon btn-danger btn-round btn-xs" id="_remove_transaction">
                                <i class="fa fa-minus"></i>
                            </button></td>  
                    </tr>  
              `);
                $(`#bandingkan_harga${number}`).on("click", function() {
                    let katakunci = $(`input[name="nama_barang${number}"]`).val();
                    window.open(`https://www.google.com/search?q=${katakunci}+indonesia`, '_blank');
                });
                number++;
            })
            $("._render_content_body").on('click', '#_remove_transaction', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Anda Yakin? ",
                    text: "Menghapus data transaksi ini",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ok"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().parent().remove();
                    }
                })
            });
            $('.js-example-basic-single').select2({
                width: '100%'
            });
        });
    </script>
@endsection
