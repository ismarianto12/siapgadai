let number = 1;
$("#_addtransaction").on('click', function (e) {
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
            <td><input type="text" name="keluaran[]" id="keluaran_${number}">
                <br />
                <label>Imei</label>
                <br />
                <input type="text" name="keluaran[]" id="keluaran_${number}">
                </td>
            <td><input type="decimal" name="harga[]" id="harga_${number}"></td> 
        <td><input type="text" name="limit_pinjaman[]" id="limit_pinjaman_${number}" placeholder="dalam persen"></td>
        <td><input type="file" name="foto[]">
            <input type="file" name="foto[]">
            <input type="file" name="foto[]">
            
            </td>
        <td colspan="2"><button class="btn btn-icon btn-danger btn-round btn-xs" id="_remove_transaction">
                <i class="fa fa-minus"></i>
            </button></td>  
    </tr>  
`);
    $(`#bandingkan_harga${number}`).on("click", function () {
        let katakunci = $(`input[name="nama_barang${number}"]`).val();
        window.open(`https://www.google.com/search?q=${katakunci}+indonesia`, '_blank');
    });
    number++;
})
$("._render_content_body").on('click', '#_remove_transaction', function (e) {
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