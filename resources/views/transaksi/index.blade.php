@extends('layouts.template')
@section('content')
    @include('layouts.breadcum')
    <div class="col-md-12">
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-4">
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
            <div class="col-sm-6 col-md-6">
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


        </div>
        <div class="row row-card-no-pd">
            <table class="table table-head-bg-success">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Keluaran</th>
                        <th scope="col">Limit Pinjaman</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>

                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>Otto</td>

                        <td>@fat</td>
                    </tr>
                    <tr>
                        <td></td>
                        <th colspan="5">Maks Pinjaman </th>
                        <td>@twitter</td>
                    </tr>
                    <tr>
                        <td></td>
                        <th colspan="5">Jumlah yang diambil </th>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>


        </div>
        <div class="card-footer row">
            <div class="col-md-6">
                <button class="btn btn-danger btn-block"><b>Batal</b></button>
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
        // table data
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
                url: "{{ Url('/transaksi') }}",
                method: 'POST',
                data: function(data) {
                    data.tmproyek_id = $('#tmproyek_id').val();
                },
                _token: "{{ csrf_token() }}",
            },
            columns: [{
                    data: 'id',
                    name: 'nama_proyek',
                    orderable: false,
                    searchable: false,
                    align: 'center',
                    className: 'text-center'
                },
                {
                    data: 'namaproyek',
                    name: 'namaproyek'
                },
                {
                    data: 'namabangunan',
                    name: 'namabangunan',
                },
                {
                    data: 'jenisrapnama',
                    name: 'jenisrapnama'
                },
                {
                    data: 'pekerjaan',
                    name: 'pekerjaan'
                },
                {
                    data: 'volume',
                    name: 'volume'
                },
                {
                    data: 'satuan',
                    name: 'satuan'
                },

                {
                    data: 'harga_satuan',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),
                    name: 'harga_satuan'
                },
                {
                    data: 'jumlah_harga',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),
                    name: 'jumlah_harga'
                },
                {
                    data: 'usercreate',
                    name: 'usercreate'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]

        });
        $('select[name="tmproyek_id"]').on('change', function() {
            $('#datatable').DataTable().ajax.reload();
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
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                width: '100%'
            });
        });
    </script>
@endsection
