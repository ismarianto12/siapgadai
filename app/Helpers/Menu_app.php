<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Menu_app
{
    private static function set_menu($module_name = null, $title = null, $css_class = null, $target = null)
    {
        $structure = null;
        if ($module_name !== null || $module_name !== '') {
            if ($css_class === null) {
                $structure = "<li><a href='" . $module_name . "' " . $target . "><span class='sub-item'></span>" . $title . "</a></li>";
            } else {
                $structure = "<li class='" . $css_class . "'><a href='" . $module_name . "'><span class='sub-item'></span>" . $title . "</a></li>";
            }
        }

        return $structure;
    }
    private static function menu_single($module_name, $font, $title)
    {

        if ($title == 'Transaksi' || $title == 'Pelunasan') {
            $structure = '<li class="nav-item">
							<a href="#" onclick="location.href=\'' . $module_name . '\';">
                            <i class="' . $font . '"></i>

                            <p>' . $title . '</p>

 							</a>
						</li>';
        } else {

            $structure = '<li class="nav-item">

            <a href="' . $module_name . '">
            <i class="' . $font . '"></i>

            <p>' . $title . '</p>

             </a>
        </li>';
        }
        return $structure;
    }
    private static function parent_dropdown($judul, $icon = null)
    {
        $structure = '';
        if ($icon === null) {
            $structure .= '<li class="nav-item">
            <a data-toggle="collapse" href="#tables">
                <i class="fas fa-list"></i>
                <p>' . $judul . '</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">';
        } else {
            $structure .= '<li class="nav-item">
            <a data-toggle="collapse" href="#tables">
                <i class="fas fa-' . $icon . '"></i>
                <p>' . $judul . '</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav nav-collapse">';
        }
        return $structure;
    }
    public static function tutup_menu()
    {
        $structure = '</ul>
        </div>
    </li>';
        return $structure;
    }

    public static function list_menu()
    {
        $menu = '';
        $user_id = Auth::user()->id;
        $query = DB::table('users')
            ->select('users.id', 'users.username', 'tmlevel.level', 'tmlevel.id as level_id')
            ->join('tmlevel', 'users.tmlevel_id', '=', 'tmlevel.id')
            ->where('users.id', $user_id)
            ->get();
        foreach ($query as $ls) {
            switch ($ls->level_id) {
                case 1:
                    $menu .= '<li class="nav-item">
                    <a data-toggle="collapse" href="#retribusi">
                        <i class="flaticon-box-3"></i>
                        <p>Master Data </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="retribusi">
                        <ul class="nav nav-collapse">';
                    $menu .= self::set_menu(Url('master/perhitungan_biaya'), 'Perhitungan Biaya');
                    $menu .= self::set_menu(Url('master/barang'), 'Barang');
                    $menu .= self::set_menu(Url('master/kategori'), 'Ketegori Barang');
                    $menu .= self::set_menu(Url('master/cabang'), 'Cabang');
                    $menu .= self::set_menu(Url('master/nasabah'), 'Nasabah');
                    $menu .= '
                      </ul>
                    </div>
                </li>';

                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#report">
                    <i class="flaticon-windows text-info"></i>
                    <p>Proses Transaksi </p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="report">
                    <ul class="nav nav-collapse">';
                    $menu .= self::set_menu(Url('proses/pegadaian'), 'Data Gadai', );
                    $menu .= self::set_menu(Url('proses/pelunasan'), 'Proses Penebusan', );
                    $menu .= '
                  </ul>
                </div>';
                    $menu .= self::menu_single(Url('app/transaksi/update_transaksi'), 'flaticon-shopping-bag', 'Ubah Status Transaksi');
                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#param">
                    <i class="flaticon-list text-info"></i>
                    <p>Laporan </p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="param">
                    <ul class="nav nav-collapse">';
                    $menu .= self::set_menu(Url('laporan/pegadaian'), 'Laporan Transaksi', );
                    $menu .= self::set_menu(Url('laporan/pelunasan'), 'Laporan Pelunasan', );
                    $menu .= self::set_menu(Url('laporan/pendapatan'), 'Laporan Pendapatan', );
                    $menu .= '
                  </ul>
                </div>';
                    $menu .= '<li class="nav-item">
                <a data-toggle="collapse" href="#sistem">
                    <i class="flaticon-remove-user text-warning"></i>
                    <p>Sistem </p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="sistem">
                    <ul class="nav nav-collapse">';
                    $menu .= self::set_menu(Url('master/user'), 'User');
                    $menu .= self::set_menu(Url('routing/export_db'), 'Export DB Aplikasi');
                    $menu .= '<li class="active show"><a onclick="location.href=\'' . Url('master/identitas') . '\';"><span class="sub-item"></span>Identitas Aplikasi</a></li>'; //self::set_menu(Url('master/identitas'), 'Identitas Aplikasi');
                    $menu .= '
                  </ul>
                </div>
            </li>';
                    $menu .= '</li>';
                    break;
                case 2:
                    $menu .= '
                            <ul class="nav">
                    ';
                    $menu .= self::menu_single(Url('app/transaksi'), 'flaticon-shopping-bag', 'Transaksi');
                    // $menu .= self::menu_single(Url('app/return_transaksi'), 'flaticon-delivery-truck', 'Batalkan Transaksi');
                    $menu .= self::menu_single(Url('app/pelunasan'), 'flaticon-desk', 'Pelunasan');
                    $menu .= self::menu_single(Url('proses/pegadaian'), 'flaticon-user-3', 'Laporan Transaksi');
                    $menu .= self::menu_single(Url('proses/pelunasan'), 'flaticon-user-3', 'Laporan Pelunasan');
                    '
                    </li>
                    ';
                    break;
                default:
                    $menu .= '<li>Null Route Menu</li>';

                    break;
            }
        }
        return $menu;
    }
}
