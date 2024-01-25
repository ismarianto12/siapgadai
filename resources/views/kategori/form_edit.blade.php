<div class="card">
    <div class="card-header">
        <div class="card-title">Input Data Master Barang
        </div>
    </div>
    <div class="ket"></div>
    <form id="exampleValidation" method="POST" class="simpan">
        <div class="form-group row">
            <label class="col-md-2 text-left">nama_cabang</label>

            <div class="col-md-4">
                <input name='nama_cabang' class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">alamat_cabang</label>
            <div class="col-md-4"><input name='alamat_cabang' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">jam_buka</label>
            <div class="col-md-4"><input name='jam_buka' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">jam_tutup</label>
            <div class="col-md-4"><input name='jam_tutup' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">spv_cabang</label>
            <div class="col-md-4"><input name='spv_cabang' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">created_at</label>
            <div class="col-md-4"><input name='created_at' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">updated_at</label>
            <div class="col-md-4"><input name='updated_at' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">user_id</label>
            <div class="col-md-4"><input name='user_id' class="form-control">
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 text-left">kode_cabang</label>
            <div class="col-md-4"><input name='kode_cabang' class="form-control">
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
    $(document).ready(function() {

        // format number 
        $('.number_format').keyup(function(event) {
            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        });

        function parseCurrency(num) {
            return parseFloat(num.replace(/,/g, ''));
        }
        // if get  input value in texboxt 
        $('input').keyup(function() {
            volume = parseCurrency($('input[name="volume"]').val());
            harga_satuan = parseCurrency($(
                'input[name="harga_satuan"]').val());
            nilai = volume * harga_satuan;
            $("#jumlah_harga").val(nilai);
            isNaN(nilai) ? 0 : $("#tharga").html(nilai.toLocaleString());

        });

    });

    $(function() {
        $('.simpan').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('master.barang.store') }}",
                method: "POST",
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
