@extends('layouts.template')
@section('title', 'Identitas Aplikasi')
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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div id="alert"></div>
                </div>
                <div class="card-body">
                    <form id="exampleValidation" action="" method="POST" class="simpan" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group form-show-validation row">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nama Aplikasi
                                    <span class="required-label">*</span></label>
                                <div class="col-sm-8">
                                    SIPAKDE (APLIKASI PELAPORAN PENDAPATAN DAERAH)
                                </div>

                            </div>
                        </div>
                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Pemerintah daerah
                                <span class="required-label">*</span></label>
                            <div class="col-sm-8">
                                KOTA TANGERANG SELATAN
                            </div>
                        </div>

                        <div class="form-group form-show-validation row">
                            <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">DINAS / OPD <span
                                    class="required-label">*</span></label>
                            <div class="col-sm-8">
                                BADAN PENDAPATAN DAERAH
                            </div>
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
@endsection
