<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Booking;
use App\Models\Spooring;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'dashboard';
        $this->subtitle = '';
    }

    public function index()
    {
        $year = date('Y');
        return view('master.dashboard', [
            'cbooking' => count(Booking::whereYear('bookingdate', $year)->get()),
            'cspooring' => count(Spooring::whereYear('spooringdate', $year)->get()),
            'cspooring_selesai_all' => count(Spooring::where('spooringfinish', '!=', null)->whereYear('spooringdate', $year)->get()),
            'cspooring_gagal_all' => count(Spooring::whereYear('spooringdate', $year)->with('booking')->whereHas('booking', function (Builder $query) {
                $query->where('bookingstatus', '6');
            })->get()),

            'title' => $this->title,
            'subtitle' => $this->subtitle,

            'booking' => Booking::get(),
            'booking_baru' => Booking::where('bookingstatus', '0')->get(),

            'spooring' => Spooring::get(),
            'spooring_selesai_all' => Spooring::where('spooringfinish', '!=', null)->get(),
            'spooring_gagal_all' => Spooring::with('booking')->whereHas('booking', function (Builder $query) {
                $query->where('bookingstatus', '6');
            })->get(),
            'spooring_mekanik' => Spooring::where('pengguna_id', Auth::user()->id)->get(),
            'spooring_selesai' => Spooring::where('pengguna_id', Auth::user()->id)->where('spooringfinish', '!=', null)->get(),
            'spooring_gagal' => Spooring::with('booking')->where('pengguna_id', Auth::user()->id)->whereHas('booking', function (Builder $query) {
                $query->where('bookingstatus', '6');
            })->get(),

            'barang' => Barang::get(),
            'barang_masuk' => BarangMasuk::get(),
            'barang_keluar' => BarangKeluar::get(),

            'tahun' => 2023,
            'tahun_sekarang' => date('Y'),
        ]);
    }
}
