@extends('layouts.template')
@section('title', 'Identitas Aplikasi')
@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Export Database</h2>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Export DB</div>
                        </div>
                        <div class="card-body">
                            <div class="card-sub">
                                <button id="button_export" class="btn btn-primary btn-sm">Export DB</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Resources</th>
                                            <th>Nama File</th>
                                            <th>Tanggal Export</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table_content"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        var url = '{{ route('routing.actioexport_db') }}';
        $(function() {

            $.ajax({
                url: '{{ route('routing.api_table') }}',
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log('Response:', data);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            var rowData = {
                id: 1,
                resources: 'Resource 1',
                namaFile: 'File 1.txt',
                tanggalExport: '2024-02-08',
                action: '<button class="btn btn-primary btn-sm">Download</button>'
            };

            // Menggunakan append untuk menambahkan data ke tabel
            $('.table_content').append(
                '<tr>' +
                '<td>' + rowData.id + '</td>' +
                '<td>' + rowData.resources + '</td>' +
                '<td>' + rowData.namaFile + '</td>' +
                '<td>' + rowData.tanggalExport + '</td>' +
                '<td>' + rowData.action + '</td>' +
                '</tr>'
            );
            $('#button_export').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Check password...',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                });
                Swal.showLoading();


                $.ajax({
                    url: url,
                    type: 'POST', // Atur metode HTTP yang sesuai (bisa juga 'GET', 'PUT', 'DELETE', dll.)
                    dataType: 'json', // Atur tipe data yang diharapkan dari respons server
                    data: {
                        key1: 'value1',
                        key2: 'value2'
                    },
                    success: function(response) {
                        $('.table_content').append(
                            '<tr>' +
                            '<td>' + rowData.id + '</td>' +
                            '<td>' + rowData.resources + '</td>' +
                            '<td>' + rowData.namaFile + '</td>' +
                            '<td>' + rowData.tanggalExport + '</td>' +
                            '<td>' + rowData.action + '</td>' +
                            '</tr>'
                        );
                    },
                    error: function(error) {
                        Swal.fire('success', 'Success mengabil data base', 'success');
                    }
                });

            });
        });
    </script>
@endsection
