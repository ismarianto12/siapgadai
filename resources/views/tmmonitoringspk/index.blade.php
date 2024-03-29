@extends('layouts.template')
@section('content')
    @include('layouts.breadcum')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-right">
                    <button class="btn btn-primary btn-round ml-auto btn-sm" id="add_data">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                    <button class="btn btn-danger btn-round btn-sm" id="add_data" onclick="javascript:confirm_del()">
                        <i class="fa fa-minus"></i>
                        Delete selected
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                {{-- {{ Auth::user()->tmlevel_id }} --}}
                <div class="modal fade" id="formmodal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document" style=" min-width: 65%;">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="title">
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="form_content">
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No spk</th>
                                <th>Periode awal</th>
                                <th>Periode akhir</th>
                                <th>Spk harga progres</th>
                                <th>Spk bayar <br /> lalu</th>
                                <th>Spk bayar sekarang</th>
                                <th>Spk bayar tot</th>
                                <th>Spk byr sisa lalu</th>
                                <th>Spk bayar sisa skrg</th>

                                <th>Status Bayar</th>
                                <th>User </th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>

    <script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

    <script>
        $(function() {
            $('#add_data').on('click', function() {
                $('#formmodal').modal('show');
                addUrl = '{{ route('master.monitoringspk.create') }}';
                $('#form_content').html('<center><h3>Loading ...</h3></center>').load(addUrl);
            });

            // edit
            $('#datatable').on('click', '#edit', function(e) {
                e.preventDefault();
                $('#formmodal').modal('show');
                id = $(this).data('id');
                addUrl = '{{ route('master.monitoringspk.edit', ':id') }}'.replace(':id', id);
                $('#form_content').html('<center><h3>Harap Bersabar , Sedang Meload Data ... ...</h3></center>').load(addUrl);

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
                url: "{{ route('api.monitoringspk') }}",
                method: 'POST',
                _token: "{{ csrf_token() }}",
            },
            "columnDefs": [{
                    "width": "10px",
                    "targets": 0
                },
                {
                    "width": "400px",
                    "targets": 1
                },
            ],
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false,
                    align: 'center',
                    className: 'text-center'
                },
                {
                    data: 'no_spk',
                    name: 'no_spk'
                },
                {
                    data: 'periode_awal',
                    name: 'periode_awal'
                },
                {
                    data: 'periode_akhir',
                    name: 'periode_akhir'
                },
                {
                    data: 'spk_harga_progres',
                    name: 'spk_harga_progres',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),
                },
                {
                    data: 'spk_bayar_lalu',
                    name: 'spk_bayar_lalu',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),

                },
                {
                    data: 'spk_bayar_sekarang',
                    name: 'spk_bayar_sekarang',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),

                },
                {
                    data: 'spk_bayar_tot',
                    name: 'spk_bayar_tot',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),
                },
                {
                    data: 'spk_byr_sisa_lalu',
                    name: 'spk_byr_sisa_lalu',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),

                },
                {
                    data: 'spk_bayar_sisa_skrg',
                    name: 'spk_bayar_sisa_skrg',
                    render: $.fn.dataTable.render.number('.', '.', 2, ''),

                },
                {
                    data: 'status_bayar',
                    name: 'status_bayar'
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
        @include('layouts.tablechecked');

        function del() {
            var c = new Array();
            $("input:checked").each(function() {
                c.push($(this).val());
            });
            if (c.length == 0) {
                $.alert("Silahkan memilih data yang akan dihapus.");
            } else {
                $.post("{{ route('master.monitoringspk.destroy', ':id') }}", {
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

        // addd

    </script>

@endsection
