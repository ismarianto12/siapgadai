<div class="card">
    <div class="card-header">
        <div class="card-title">Input Data Master Barang
        </div>
    </div>
    <div class="ket"></div>
    <form id="exampleValidation" method="POST" class="simpan">
        <div class="form-group row">
            <label class="col-md-2 text-left">Kode Cabang</label>
            <div class="col-md-4"><input name='kode_cabang' value="{{ $data->kode_cabang }}" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">Nama cabang</label>

            <div class="col-md-4">
                <input type="text" name='nama_cabang' value="{{ $data->kode_cabang }}" class="form-control">
            </div>


        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">Alamat</label>
            <div class="col-md-4">
                <textarea name='alamat_cabang' class="form-control"> {{ $data->alamat_cabang }}</textarea>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">Jam Buka</label>
            <div class="col-md-4"><input type="date" name='jam_buka' value="{{ $data->jam_buka }}"
                    class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">Jam Tutup</label>
            <div class="col-md-4">
                <input type="date" name='jam_tutup' value="{{ $data->jam_tutup }}"
                    class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">SPV /Head </label>
            <div class="col-md-4">
                <input type="text" name='spv_cabang' value="{{ $data->spv_cabang }}" class="form-control">
            </div>
        </div>



        <div class="card-action">
            <div class="row">
                <div class="col-md-12">
                    <input class="btn btn-success" type="submit" value="Simpan">
                    <button class="btn btn-danger" type="reset">Batal</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
     
    $(function() {
        $('.simpan').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('master.cabang.update', $id) }}",
                method: "PUT",
                data: $(this).serialize(),
                chace: false,
                async: false,
                success: function(data) {
                    $('#datatable').DataTable().ajax.reload();
                    $('#formmodal').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil di simpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
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
                    //  $('.ket').html(
                    //      "<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Perahtian donk!</strong> " +
                    //      respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
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
        });


    });
    // sellect 2
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>
{{-- list_model_proyek --}}
