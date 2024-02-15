<div class="row">
    <div class="col-md-6">
        <h4>Detail Nasabah</h4>
        <table class="table table-striped" style="width:100%">
            <tr>
                <td>No Anggota</td>
                <td>: &nbsp;{{ $data->no_anggota }}</td>
            </tr>
            <tr>
                <td>No hp</td>
                <td>: &nbsp;{{ $data->no_hp }}</td>
            </tr>
            <tr>
                <td>Nik</td>
                <td>: &nbsp;{{ $data->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: &nbsp;{{ $data->nama }}</td>
            </tr>
            <tr>
                <td>jk</td>
                <td>: &nbsp;{{ $data->jk == 'L' ? 'Laki laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal lahir</td>
                <td>: &nbsp;{{ $data->tttl }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: &nbsp;{{ $data->alamat }}</td>
            </tr>
            <tr>
                <td>Rt/rw</td>
                <td>: &nbsp;{{ $data->rt_rw }}</td>
            </tr>
            <tr>
                <td>Kelurahan</td>
                <td>: &nbsp;{{ $data->kelurahan }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>: &nbsp;{{ $data->kecamatan }}</td>
            </tr>
            <tr>
                <td>Kab/kota</td>
                <td>: &nbsp;{{ $data->kab_kota }}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="{{ asset('assets/img/bh.png') }}" class="img-responsive" style="width: 80%" />
    </div>
</div>
