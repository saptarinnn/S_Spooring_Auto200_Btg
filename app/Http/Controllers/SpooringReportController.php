<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Spooring;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SpooringReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $datas = [
            count(Booking::whereYear('bookingdate', $request->slctSpooring)->get()),
            count(Spooring::whereYear('spooringdate', $request->slctSpooring)->get()),
            count(Spooring::where('spooringfinish', '!=', null)->whereYear('spooringdate', $request->slctSpooring)->get()),
            count(Spooring::whereYear('spooringdate', $request->slctSpooring)->with('booking')->whereHas('booking', function (Builder $query) {
                $query->where('bookingstatus', '6');
            })->get()),
        ];
        return response()->json([
            'data' => $datas,
        ]);
    }
}
