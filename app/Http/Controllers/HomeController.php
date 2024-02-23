<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Homepage;
use App\Traits\NotificationWA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use NotificationWA;

    public function index()
    {
        return view('home', [
            'homepage' => Homepage::first()
        ]);
    }

    public function store(Request $request)
    {
        # validation
        $request->validate([
            'fullname' => ['required'],
            'plat' => ['required'],
            'type' => ['required'],
            'nohp' => ['required', 'numeric', 'max_digits:15'],
            'email' => ['required', 'email'],
            'bookingdate' => ['required', 'date']
        ]);

        DB::beginTransaction();
        try {
            # insert data to database
            $booking = Booking::create([
                'id' => strtolower(Str::random(6)),
                'fullname' => $request->fullname,
                'plat' => $request->plat,
                'type' => $request->type,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'bookingdate' => $request->bookingdate,
                'bookingstatus' => '0',
                'bookingdesc' => 'Data booking telah berhasil dikirim. Silahkan menunggu konfirmasi dari mekanik.',
            ]);
            DB::commit();
            # redirect
            $this->pushNotification($request->nohp, $booking->bookingdesc . ' Kode booking anda adalah ' . $booking->id);
            return to_route('home-booking-success', $booking->id)->with('message', 'Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            # redirect
            DB::rollback();
            return redirect()->back();
        }
    }

    public function success($id)
    {
        return view('guest.success-booking', [
            'booking' => Booking::findOrFail($id),
        ]);
    }

    public function detail(Request $request)
    {
        # validation
        $request->validate([
            'token' => ['required'],
        ]);
        # if token not found
        if (!Booking::where('id', $request->token)->first()) {
            return redirect()->back()->with('error', 'Maaf, Token tidak ditemukan!');
        }
        # redirect
        return view('guest.detail-spooring', [
            'booking' => Booking::findOrFail($request->token),
        ]);
    }

    public function confirm(Request $request, $id)
    {
        $request->validate([
            'konf_spooring' => 'required',
        ]);
        $booking = Booking::findOrFail($id);

        DB::beginTransaction();
        try {
            if ($request->konf_spooring == 'ya') {
                $booking->update([
                    'bookingstatus' => '5',
                    'bookingdesc' => 'pelanggan setuju untuk melanjutkan proses spooring.',
                ]);
            }
            if ($request->konf_spooring == 'tidak') {
                $booking->update([
                    'bookingstatus' => '6',
                    'bookingdesc' => 'pelanggan tidak setuju untuk melanjutkan proses spooring.',
                ]);
            }
            DB::commit();
            # redirect
            $this->pushNotification($booking->nohp, ucwords($booking->bookingdesc));
            return back()->with('message', 'Data Berhasil Dikirim');
        } catch (\Throwable $th) {
            # redirect
            DB::rollback();
            return redirect()->back();
        }
    }
}
