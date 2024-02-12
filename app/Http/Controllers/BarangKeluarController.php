<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class BarangKeluarController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'barang keluar';
        $this->subtitle = 'list transaksi barang keluar pada gudang barang.';
    }

    public function index()
    {
        return view('master.barangklr.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'barangkeluar' => BarangKeluar::with('barang')->oldest('tglbarangklr')->get(),
        ]);
    }

    public function create()
    {
        return view('master.barangklr.create', [
            'title' => 'Tambah ' . $this->title,
            'subtitle' => 'Tambah ' . $this->subtitle,
            'barangs' => Barang::oldest('namabarang')->get(),
            'users' => User::oldest('fullname')->get(),
        ]);
    }

    public function store(Request $request)
    {
        # validation
        $brgkeluar = $request->validate([
            'barang_id' => ['required'],
            'pengguna_id' => ['required'],
            'jmlhbarangklr' => ['required', 'numeric'],
            'tglbarangklr' => ['required', 'date']
        ]);

        # check barang in database
        $brg = Barang::where('id', $request->barang_id)->first();
        # check if jumlah barang keluar > jumlah stock barang
        if ($request->jmlhbarangklr > $brg->jumlahstock) {
            throw ValidationException::withMessages([
                'jmlhbarangklr' => 'Jumlah barang keluar lebih dari stock barang.'
            ]);
        }

        DB::beginTransaction();
        try {
            # new stock
            $stock = $brg->jumlahstock - $request->jmlhbarangklr;
            # update stock barang
            $brg->update(['jumlahstock' => $stock]);
            # create data to database if success validation
            BarangKeluar::create($brgkeluar);
            DB::commit();
            # riderect
            return to_route('brg-keluar.index')->with('message', 'Data Berhasil Disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            # return back stock barang
            $barangklr = BarangKeluar::findOrFail($id);
            $barang = Barang::where('id', $barangklr->barang_id)->first();
            $stock = $barang->jumlahstock + $barangklr->jmlhbarangklr;
            $barang->update(['jumlahstock' => $stock]);
            # find barang keluar and delete
            $barangklr->delete();
            DB::commit();
            # riderect
            return back()->with('message', 'Data Berhasil Dihapus.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
