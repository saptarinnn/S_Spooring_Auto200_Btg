<?php

namespace App\Http\Controllers;

use App\Models\Spooring;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanSpooringController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'laporan spooring';
        $this->subtitle = '';
    }

    public function index()
    {
        return view('master.laporan.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,

            'tahun' => 2023,
            'tahun_sekarang' => date('Y'),
        ]);
    }

    public function print(Request $request)
    {
        $spooring = Spooring::with(['pengguna', 'booking'])->whereYear('spooringdate', $request->thn_spooring)->get();

        $pdf = Pdf::loadView('master.laporan.pdf', [
            'spooring' => $spooring,
            'tahun' => $request->thn_spooring,
        ])->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan-Data-Spooring-' . date('Y H:m:i') . '.pdf');
    }
}
