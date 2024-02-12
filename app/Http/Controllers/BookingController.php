<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Spooring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'booking';
        $this->subtitle = 'list booking pada aplikasi pelayanan spooring.';
    }

    public function index()
    {
        return view('master.booking.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'bookings' => Booking::oldest('bookingstatus')->get(),
        ]);
    }

    public function show(string $id)
    {
        return view('master.booking.show', [
            'title' => '',
            'subtitle' => '',
            'booking' => Booking::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        DB::beginTransaction();
        try {
            $booking->update([
                'bookingstatus' => '1',
                'bookingdesc' => 'Booking telah di konfirmasi oleh mekanik, atas nama' . ucwords(auth()->user()->fullname) . ' silahkan menunggu hasil pemeriksaan.',
            ]);
            Spooring::create([
                'id' => Str::random(6),
                'booking_id' => $booking->id,
                'pengguna_id' => auth()->user()->id,
                'spooringdate' => \Carbon\Carbon::now(),
                'spooringstatus' => '0',
                'spooringdesc' => 'Sedang dilakukan proses pemeriksaan kendaraan.'
            ]);
            DB::commit();
            # redirect
            return to_route('spooring.index')->with('message', 'Data berhasil dikonfirmasi!');
        } catch (\Throwable $th) {
            DB::rollback();
            # redirect
            return back();
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            # check and delete data
            Booking::findOrFail($id)->delete();
            DB::commit();
            # redirect
            return to_route('booking.index')->with('message', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            DB::rollback();
            # redirect
            return back();
        }
    }
}
