@extends('layouts.template')
@section('content')
    <style>
        iframe {
            width: 100%;
            height: 600px !important;
            border: 0;
        }
    </style>


    <div class="col-md-12">

        <div class="card" style="margin-top: 40px">
            <div class="card-header">
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-responsive" style="width: 30%" />
                <h3>Transaksi Pelunasan Berhasil</h3>
                <i class="flaticon-success text-success" style="font-size: 100px !important;"></i>


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
                    <button to="{{ Url('app/transaksi/cetak_kwitansi/' . $idTransaction) }}"
                        class="detail_pdf btn btn-success btn-block"><b>Cetak Bukti Pelunasan</b></button>
                </div>
                <div class="col-md-6"> 
                    <button href="{{ Url('app/pelunasan') }}"
                        class="detail_pdf btn btn-warning btn-block"><b>Kembali</b></button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        $(function() {
            $('.detail_pdf').on('click', function(e) {

                e.preventDefault();
                $('#formmodal').modal('show');
                var pdffile = $(this).attr('to');
                $('#form_content').html(`
                        <iframe src="${pdffile}" frameborder="0" allowfullscreen></iframe>

                `);
            });
        });
    </script>
@endsection
