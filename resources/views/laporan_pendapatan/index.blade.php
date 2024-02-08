@extends('layouts.template')
@section('content')
    @include('layouts.breadcum')
    <div class="col-md-12">
        <div class="card">
            {{-- <form cas --}}
            <div class="card-header row">
                <div class="form-group row">
                    <label class="col-md-3 text-left">Dari</label>
                    <div class="col-md-9">
                        <input type="date" name='dari' class="form-control" id="dari" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 text-left">Sampai</label>
                    <div class="col-md-9">
                        <input type="date" name='sampai' class="form-control" id="sampai" />
                    </div>
                </div>

                @if (Auth::user()->tmlevel_id == 1)
                    <div class="form-group row">
                        <label class="col-md-3 text-left">Cabang</label>
                        <div class="col-md-9">
                            <select class="form-control" name="tmcabang_id" id="tmcabang_id">
                                <option id="" value="">Semua Cabang</option>
                                @foreach (Properti_app::dataCabang() as $cabangnya)
                                    <option value="{{ $cabangnya->id }}"> {{ $cabangnya->nama_cabang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
                <div class="form-group row">
                    <button class="searchdata btn btn-info btn-round btn-sm">
                        <i class="flaticon-search-2"></i>
                        Search
                    </button>
                    <button class="cleardata btn btn-danger btn-round btn-sm">
                        <i class="flaticon-search-2"></i>
                        Clear
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="formmodal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Handphpone</th>
                                <th>Nama Barang</th>
                                <th>Durasi Pinjaman</th>
                                <th>Maks Pinjaman</th>
                                <th>Jumlah Diambil</th>
                                <th>Administrasi</th>
                                <th>Persentase</th>
                                <th>Jatuh Tempo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th colspan="7" style="text-align:right"></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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

            // edit
            $('#datatable').on('click', '#edit', function(e) {
                e.preventDefault();
                $('#formmodal').modal('show');
                var url = $(this).attr('to');
                $('#form_content').html('<center><h3>Harap Bersabar , Sedang Meload Data ... ...</h3></center>').load(url);

            })
        });

        function formatRupiah(amount) {
            // Convert to string and split at the decimal point
            const parts = amount.toString().split(".");

            // Format the integer part with commas
            const formattedInteger = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // Combine the integer part with the decimal part (if exists)
            const result = parts.length === 1 ? formattedInteger : formattedInteger + "." + parts[1];

            // Return the formatted result with 'Rp' prefix
            return "Rp " + result;
        }

        // table data
        $.fn.dataTable.ext.errMode = 'throw';
        var table = $('#datatable').DataTable({
            "footerCallback": function(row, data, start, end, display) {




                var api = this.api(),
                    data;

                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };

                // Total over all pages
                total = api
                    .column(7)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(7).footer()).html(
                    "Total Pendapatan : " + formatRupiah(pageTotal) + ' ( ' + formatRupiah(total) +
                    ' )'
                );
            },
            // autoWidth: true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'copyHtml5',
                    className: 'btn btn-info btn-xs',
                    exportOptions: {
                        columns: [12, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    className: 'btn btn-success btn-xs',
                    exportOptions: {
                        columns: [12, ':visible']
                    }
                },
                {
                    extend: 'csvHtml5',
                    className: 'btn btn-warning btn-xs',
                    exportOptions: {
                        columns: [12, ':visible']
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    className: 'btn btn-prirmay btn-xs',
                    exportOptions: {
                        columns: [12, ':visible']
                    }
                }
            ],
            processing: true,
            serverSide: true,
            order: [1, 'asc'],
            pageLength: 10,
            ajax: {
                url: "{{ route('api.pendapatan') }}",
                method: 'POST',
                data: function(data) {
                    data.dari = $('#dari').val();
                    data.sampai = $('#sampai').val();
                    @if (Auth::user()->tmlevel_id == 1)
                        data.tmcabang_id = $('#tmcabang_id option:selected').val();
                    @endif

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
                    name: 'nama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'no_handphone',
                    name: 'no_handphone',
                },

                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'durasi_pinjam',
                    name: 'durasi_pinjam',
                    render: function(row, data, type) {
                        return `<button class="btn btn-info btn-sm">${row}</button>`;

                    },
                },
                {
                    data: 'maks_pinjaman',
                    name: 'maks_pinjaman'
                },

                {
                    data: 'jumlah_pinjaman',
                    name: 'jumlah_pinjaman'
                },
                {
                    data: 'administrasi',
                    name: 'administrasi'
                },

                {
                    data: 'persentase_pinjaman',
                    name: 'persentase_pinjaman'
                },
                {
                    data: 'tanggal_jatuh_tempo',
                    name: 'tanggal_jatuh_tempo'
                },
                {
                    data: 'status_transaksi',
                    name: 'status_transaksi',
                    render: function(row, data, type) {
                        console.log(row, 'gadai if')
                        if (row == '1') {
                            return '<button class="btn btn-danger btn-sm">Belum Lunas</button>';
                        } else if (row == '2') {
                            return '<button class="btn btn-warning btn-sm">Overdue</button>';
                        } else if (row == '3') {
                            return '<button class="btn btn-success btn-sm">Lunas</button>';
                        } else {
                            return 'Unknown Status';
                        }
                    }

                },
                {

                    data: 'action',
                    name: 'action'
                }
            ]

        });

        $('.cleardata').on('click', function() {
            $('#dari').val('');
            $('#sampai').val('');

            $('#datatable').DataTable().ajax.reload();
        });
        $('.searchdata').on('click', function() {
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
    </script>
@endsection
