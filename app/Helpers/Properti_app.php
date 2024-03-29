<?php

// by ismarianto
namespace App\Helpers;

use App\Models\Jenis_surat;
use App\Models\Tmbangunan;
use App\Models\Tmproyek;
use App\Models\Tmsurat_master;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\Session;

class Properti_app
{

    public static function status_perpanjang()
    {
        return [
            'Closed BAK' => 'Closed BAK',
            'Closed PKS' => 'Closed PKS',
            'Closed PAID' => 'Closed PAID',
            'Closed (Catatan)' => 'Closed (Catatan)',
        ];
    }
    function jenjangPeg()
    {
        return [
            1 => 'Tenaga Pendidik',
            2 => 'Tenaga Kependidikan',
        ];
    }

    public static function jenjangApp()
    {
        return [
            'S3' => 'S3',
            'S2' => 'S2',
            'S1' => 'S1',
            'DIII' => 'DIII',
        ];
    }

    public static function JenisKel()
    {
        return [
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',
        ];
    }
    public function jenisSurat()
    {
    }
    public static function hari($hari)
    {
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }
        return $hari_ini;
    }
    public function number_format()
    {
    }

    public static function cekJatuhTempo($tanggalAwal, $batasHari)
    {
        $tanggalAwalObj = Carbon::parse($tanggalAwal);
        $tanggalBatas = $tanggalAwalObj->addDays($batasHari);
        $tanggalSekarang = Carbon::now();

        if ($tanggalSekarang->greaterThan($tanggalBatas)) {
            return "<span class='badge bg-danger'>Sudah jatuh tempo!</span>";
        } else {
            return "<span class='badge bg-success'>Belum jatuh tempo, limit hari: " . $tanggalBatas->format('Y-m-d') . '</span>';
        }
    }
// // Contoh pemanggilan fungsi
    // $tanggalAwal = '2023-02-01';
    // $batasHari = 8;

// cekJatuhTempo($tanggalAwal, $batasHari);

    public static function formatRupiah($angka)
    {
        if (!is_numeric($angka)) {
            return $angka;
        }

        $rupiah = number_format($angka, 0, ',', '.');
        return $rupiah;
    }

    public static function user_satker()
    {
        $user_id = Auth::user()->id;
        $query = DB::table('user')
            ->select('user.id', 'user.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
            ->join('tmuser_level', 'user.tmuser_level_id', '=', 'tmuser_level.id')
            ->where('user.id', $user_id);

        $levelid = $query->first()->level_id;
        if ($levelid == 3) {
            return Auth::user()->sikd_satker_id;
        } else {
            return 0;
        }
    }

    public static function load_js(array $url)
    {
        $data = [];
        foreach ($url as $ls) {
            $js[] = '<script type="text/javascript" src="' . $ls . '"></script>';
            $data = $js;
        }
        return $data;
    }

    public static function getKategoriBarang(array $url)
    {

    }

    public static function getlevel()
    {
        $ff = Auth::user();
        // dd($user_id);
        if ($ff != null) {
            $user_id = $ff->id;
            $query = DB::table('users')
                ->select('users.id', 'users.username', 'tmuser_level.description', 'tmuser_level.mapping_sie', 'tmuser_level.id as level_id')
                ->join('tmuser_level', 'users.tmuser_level_id', '=', 'tmuser_level.id')
                ->where('users.id', $user_id)
                ->first();
            return $query->level_id;
        } else {
            return null;
        }
    }

    public static function identitas_app()
    {
        return 'Aplikasi Gadai';
    }

    public static function tgl_indo($tgl)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        $split = explode('-', $tgl);
        return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
    }

    public static function servername()
    {
        return $_SERVER['HTTP_HOST'];
    }
    public static function UserSess()
    {
        $ff = Auth::user();
        if ($ff != null) {
            return $ff->username;
        } else {
            return null;
        }
    }

    public static function propuser($params)
    {
        $ff = Auth::user();
        if ($ff != null) {
            $data = User::find($ff->id);
            // dd($data);
            if ($data != '') {
                return $data[$params];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public static function comboproyek($id = '')
    {
        $level_id = Auth::user()->tmlevel_id;
        $id_user = Auth::user()->id;
        $datas = User::select(
            'users.id as ltjk',
            'users.name',
            'users.username',
            'users.tmlevel_id',
            'users.tmproyek_id',
            'tmproyek.nama_proyek',
            'tmproyek.kode',
            'tmproyek.id'
        )->join('tmproyek', 'tmproyek.id', '=', 'users.tmproyek_id')
            ->where('users.id', $id_user)
            ->get();

        // dd($level_id);
        if (self::propuser('tmlevel_id') != 1) {
            // dd('sss');
            $html = '<select id="tmproyek_id" name="tmproyek_id" class="js-example-basic-single form-control">';
            foreach ($datas as $data) {
                $selected = ($data->id == $id) ? 'selected' : '';
                $html .= '<option value="' . $data['id'] . '" ' . $selected . '>' . $data['kode'] . '-' . $data['nama_proyek'] . '</option>';
            }
            $html .= '</select>';
        } else {
            $html = '<select id="tmproyek_id" name="tmproyek_id" class="js-example-basic-single form-control">';
            $dds = Tmproyek::get();
            // dd($dds);
            $html .= '<option value="">--Semua Proyek-- </option>';
            foreach ($dds as $dd) {
                $selected = ($dd->id == $id) ? 'selected' : '';

                $html .= '<option value="' . $dd['id'] . '" ' . $selected . '>' . $dd['kode'] . '-' . $dd['nama_proyek'] . '</option>';
            }
            $html .= '</select>';
        }
        return $html;
    }

    public static function combobangunan($id = '')
    {
        $level_id = Auth::user()->tmlevel_id;
        $datas = Tmbangunan::select('kode', 'nama_bangunan', 'id');

        if ($level_id != 1) {
            $html = '<select name="tmbangunan_id" class="js-example-basic-single form-control">';
            $pars = $datas->where('tmlevel_id', $level_id);
            foreach ($pars->get() as $data) {
                $selected = ($data->id == $id) ? 'selected' : '';
                $html .= '<option value="' . $data['id'] . '" ' . $selected . '>' . $data['kode'] . '-' . $data['nama_proyek'] . '</option>';
            }
            $html .= '</select>';
        } else {
            $html = '<select name="tmbangunan_id" class="js-example-basic-single form-control">';
            $pars = $datas->get();
            foreach ($pars as $data) {
                $selected = ($data->id == $id) ? 'selected' : '';
                $html .= '<option value="' . $data['id'] . '" ' . $selected . '>' . $data['kode'] . '-' . $data['nama_proyek'] . '</option>';
            }
            $html .= '</select>';
        }
        return $html;
    }

    public static function jenis_surat()
    {

        $a = [
            'SIP' => 'SURAT INFORMASI PERPANJANGAN',
            'SIT' => 'SURAT INFORMASI TIDAK PERPANJANG',
            'SPH' => 'SURAT PENAWARAN HARGA',
            'SMR' => 'SUMMARY',
            'BAN' => 'BERITA ACARA NEGOSIASI',
            'BAK' => 'BERITA ACARA KESEPAKATAN',
        ];
        return $a;
    }

    // set change environment dinamically
    public static function parsing($url)
    {
        $val = "?" . base64_decode($url);
        $query_str = parse_url($val, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        return $query_params;
    }
    public static function no_surat()
    {
        $s = Tmsurat_master::select(\DB::raw('max(download) as idnya'))->first();
        $rdata = isset($s->idnya) ? (int) $s->idnya : 1 + 1;
        return $rdata;
    }

    // self return function

    public static function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = self::penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = self::penyebut($nilai / 10) . " puluh" . self::penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . self::penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = self::penyebut($nilai / 100) . " ratus" . self::penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . self::penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = self::penyebut($nilai / 1000) . " ribu" . self::penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = self::penyebut($nilai / 1000000) . " juta" . self::penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = self::penyebut($nilai / 1000000000) . " milyar" . self::penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = self::penyebut($nilai / 1000000000000) . " trilyun" . self::penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public static function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(self::penyebut($nilai));
        } else {
            $hasil = trim(self::penyebut($nilai));
        }
        return $hasil;
    }

    public static function bulan()
    {

        return array(
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
    }

    public static function parameterColumn()
    {
        return [
            'SIP' => [
                "nomor_surat" => "Nomor Surat",
                "tanggal_surat" => "Tanggal Surat",
            ], // Jenis surat SIP
            'SIT' => [
                "nomor_surat" => "Nomor Surat",
                "tanggal_surat" => "Tanggal Surat",
            ], // Jenis surat SIT
            'SPH' => [
                "nomor_surat" => "Nomor Surat",
                "tanggal_surat" => "Tanggal Surat",
                "nomor_surat_landlord" => "Nomor Surat Landlord",
                "perihal_surat_landlord" => "Perihal Surat Landlord",
                'periode_sewa_penawaran_awal' => "Periode Sewa Penawaran Awal",
                'periode_sewa_penawaran_akhir' => "Periode Sewa Penawaran Akhir",
                "pic_landlord" => "Pic Landlord",
                "jabatan_landlord" => "Jabatan Landlord",
                "penawaran_harga_sewa" => "Penawaran Harga Sewa",
            ], //dari jenis SPH
            'SMR' => [
                "harga_sewa_baru" => 'Harga Sewa Baru',
                "periode_awal" => 'Periode Awal',
                "periode_akhir" => 'Periode Akhir',
                // "penawaran_pemilik" => 'Penawaran pemilik',
                "penawaran_th_1" => 'Penawaran Telkomsel 1',
                "penawaran_th_2" => 'Penawaran Telkomsel 2',
                "penawaran_th_3" => 'Penawaran Telkomsel 3',
                "penawaran_th_4" => 'Penawaran Telkomsel 4',
                "pemilik_1" => "Penawaran Pemilik  1",
                "pemilik_2" => "Penawaran Pemilik 2",
                "pemilik_3" => "Penawaran Pemilik 3",
                "pemilik_4" => "Penawaran Pemilik 4",
                "total_harga_sewa_baru" => "Total Harga Sewa baru",
                "keterangan_harga_patokan" => "Keterangan Harga Patokan",
            ], //group by SMR
            'BAN' => [
                "tanggal_ban" => "Tanggal",
                "pengelola" => "Pengelola",
                "nama_pic" => "Nama PIC",
                "alamat_pic" => "Alamat PIC",
                "jabatan_pic" => "Jabatan PIC",
                "nomor_telp_pic" => "Nomor Telephone PIC",
            ], //BAN
            'BAK' => [
                "nomor_bak" => "Nomor Surat BAK",
                "lokasi_tempat_sewa" => "Lokasi Tempate Sewa",
                "luas_tempat_sewa" => "Luas Tempat Sewa",
                "nomor_rekening" => "Nomor Rekening",
                "pemilik_rekening_bank" => "Pemilik Rekening Bank",
                "cabang" => "Cabang",
                "nomor_npwp" => "Nomor NPWP",
                "pemilik_npwp" => "Pemilik NPWP",
                "nomor_shm_ajb_hgb" => "Nomor SHM / AJB HGB",
                "nomor_imb" => "Nomor IMB",
                "nomor_sppt_pbb" => 'Nomor SPT PBB',
                "total_harga_net" => "Total Harga NET",
            ],
        ];
    }

    public static function format_percentage($percentage, $precision = 2)
    {
        return round($percentage, $precision) . '%';
    }

    public static function calculate_percentage($number, $total)
    {

        // Can't divide by zero so let's catch that early.
        if ($total == 0) {
            return 0;
        }

        return ($number / $total) * 100;
    }

    public static function calculate_percentage_for_display($number, $total)
    {
        return self::format_percentage(self::calculate_percentage($number, $total));
    }

    public static function getKelas()
    {
        return DB::table('kelas')->get();
    }
    public static function getUserLogin()
    {

        $levelid = Auth::user()->tmlevel_id;
        if ($levelid === '3') {
            return DB::table('kelas')->get();
        } else {
            return Auth::user()->username;
        }
    }
    public static function guruid($parameter = 'id')
    {
        $username = Auth::user()->username;
        return $username;
    }
    function statusHadir()
    {
        return [
            'H' => 'Hadir',
            'A' => 'Alpha',
            'I' => 'Izin',
            'S' => 'Sakit',

        ];

    }

    public static function tipe_barang()
    {
        return \DB::table('kategori_barang')->get();
    }
    public static function masterBarang()
    {
        return \DB::table('barang')->get();
    }

    public static function KategoriGadai()
    {
        return \DB::table('kategori_barang')->get();
    }

    public static function Jk()
    {
        return [
            '1' => 'Laki-laki',
            '2' => 'Perempuan',
        ];
    }
    public static function getCabang($param_id, $parameter)
    {
        try {
            $data = \DB::table('cabang')->where('id', $param_id)->get();

            if ($data->isEmpty()) {
                throw new \Exception('Branch not found.');
            }

            $namaCabang = isset($data->first()->$parameter) ? $data->first()->$parameter : '';

            return $namaCabang;
        } catch (\Exception $e) {
            // Handle the exception according to your application's needs.
            // For example, you can log the error or return a default value.
            return 'Error: ' . $e->getMessage();
        }
    }

    public static function ParameterHitung()
    {
        $data = \DB::table('perhitungan_biaya')->where('id', '!=', '5')->get();
        return $data;
    }

    public static function generateInvoiceNumber()
    {
        $lastPurchaseId = transaksi::latest('id')->first()->id ?? 0;
        $randomDigits = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $invoiceNumber = 'INVOICE-' . $lastPurchaseId . $randomDigits;
        return $invoiceNumber;
    }
    public static function notFound()
    {
        $title = "halaman tidak di temukan";
        return view('layouts.notfound', compact('title'));
    }

    public static function removeTag($inputString)
    {
        $cleanedString = preg_replace('/[^0-9]/', '', $inputString);
        return $cleanedString;
    }
    public static function statusBayar()
    {
        return [
            '1' => 'Approve',
            '2' => 'Overdue Pembayaran',
            '3' => 'Lunas',
            '4' => 'Datang',
            '5' => 'Cancel',
        ];
    }
    public static function dataCabang()
    {
        $data = DB::table('cabang')->get();
        return $data;
    }

    public static function getKategory()
    {
        return \DB::table('kategori_barang')->get();
    }

    public function akses()
    {

        $akses = Auth::user()->tmlevel_id;
        if ($akses === '1') {
            return Properti_app::notFound();
            die;
        } else {
            return true;
        }
    }

    public static function getNasabahCount($param)
    {
        return \DB::table('transaksi_gadai')->where('status_transaksi', $param)->get()->count();
    }

    public static function Dashboard_count($param)
    {
        switch ($param) {
            case 'approve':
                return self::getNasabahCount(1);
                break;
            case 'datang':
                return self::getNasabahCount(4);
                break;
            case 'cancel':
                return self::getNasabahCount(5);
                break;
            default:
                return 'Status Undefined';
                break;
        }
    }

    public static function PiutangBerjalan()
    {
        $data = transaksi::select(
            DB::raw('SUM(transaksi_gadai.jumlah_pinjaman) AS total_jumlah_pinjaman')
        )
            ->leftJoin('users', 'users.id', '=', 'transaksi_gadai.user_id')
            ->leftJoin('cabang', 'users.cabang_id', '=', 'cabang.id')
            ->leftJoin('kategori_barang', 'kategori_barang.id', '=', 'transaksi_gadai.kategori_barang_id')
            ->leftJoin('barang', 'transaksi_gadai.id_barang', '=', 'barang.id')
            ->leftJoin('perhitungan_biaya', 'transaksi_gadai.perhitungan_biaya_id', '=', 'perhitungan_biaya.id')
            ->leftJoin('nasabah', 'transaksi_gadai.id_nasabah', '=', 'nasabah.id')
            ->whereNotIn('transaksi_gadai.status_transaksi', [3, 4, 5])->get();
        $data = isset($data->first()->total_jumlah_pinjaman) ? number_format($data->first()->total_jumlah_pinjaman, '0', '0', '.') : 0;
        return $data;
    }
}
