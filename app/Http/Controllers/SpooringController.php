<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Spooring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SpooringController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'spooring';
        $this->subtitle = 'list konfirmasi spooring pada aplikasi pelayanan spooring.';
    }

    public function index()
    {
        return view('master.spooring.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'spoorings' => Spooring::with(['booking', 'pengguna'])->where('pengguna_id', Auth::user()->id)->get(),
        ]);
    }

    public function show($id)
    {
        return view('master.spooring.show', [
            'title' => '',
            'subtitle' => '',
            'spooring' => Spooring::with(['booking', 'pengguna'])->findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('master.spooring.edit', [
            'title' => 'Konfirmasi ' . $this->title,
            'subtitle' => $this->subtitle,
            'spooring' => Spooring::with(['booking', 'pengguna'])->findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        # validation
        $request->validate([
            'kendaraan' => ['required'],
            'konfirmasi' => ['required'],
            'spooringdesc' => ['required'],
        ]);

        # check spoorind id data in database
        $spooring = Spooring::findOrFail($id);
        # check booking id in database
        $booking = Booking::findOrFail($spooring->booking_id);

        DB::beginTransaction();
        try {
            # check status konfirmasi
            if ($request->konfirmasi == 0) {
                $booking->update([
                    'bookingstatus' => '2',
                    'bookingdesc' => $request->spooringdesc,
                ]);
                $spooring->update([
                    'spooringdesc' => $request->spooringdesc,
                ]);
            }
            if ($request->konfirmasi == 1) {
                $booking->update([
                    'bookingstatus' => '3',
                    'bookingdesc' => $request->spooringdesc,
                ]);
                $spooring->update([
                    'spooringdesc' => $request->spooringdesc,
                ]);
            }
            DB::commit();
            # redirect
            return to_route('spooring.index')->with('message', 'Data berhasil dikonfirmasi.');
        } catch (\Throwable $th) {
            DB::rollback();
            # not konfirmasi
            throw ValidationException::withMessages([
                'konfirmasi' => 'Konfirmasi anda salah.'
            ]);
        }
    }

    public function confirm(Request $request, $id)
    {
        # check spoorind id data in database
        $spooring = Spooring::findOrFail($id);
        # check booking id in database
        $booking = Booking::findOrFail($spooring->booking_id);

        DB::beginTransaction();
        try {
            # change status booking in database
            $booking->update([
                'bookingstatus' => '4',
                'bookingdesc' => $request->keterangan,
            ]);
            $spooring->update([
                'spooringdesc' => $request->keterangan,
                'spooringfinish' => Carbon::now(),
            ]);

            DB::commit();
            # redirect
            return to_route('spooring.index')->with('message', 'Data berhasil dikonfirmasi.');
        } catch (\Throwable $th) {
            DB::rollback();
            # redirect
            return back();
        }
    }
}
