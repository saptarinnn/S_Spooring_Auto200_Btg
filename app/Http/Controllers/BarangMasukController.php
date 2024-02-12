<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'barang masuk';
        $this->subtitle = 'list transaksi barang masuk pada gudang barang.';
    }

    public function index()
    {
        return view('master.barangmsk.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'barangmasuk' => BarangMasuk::with('barang')->oldest('tglbarangmsk')->get(),
        ]);
    }

    public function create()
    {
        return view('master.barangmsk.create', [
            'title' => 'Tambah ' . $this->title,
            'subtitle' => 'Tambah ' . $this->subtitle,
            'barangs' => Barang::oldest('namabarang')->get(),
            'users' => User::oldest('fullname')->get(),
        ]);
    }

    public function store(Request $request)
    {
        # validation
        $brgmasuk = $request->validate([
            'barang_id' => ['required'],
            'pengguna_id' => ['required'],
            'jmlhbarangmsk' => ['required', 'numeric'],
            'tglbarangmsk' => ['required', 'date']
        ]);
        $brg = Barang::where('id', $request->barang_id)->first();
        $stock = $brg->jumlahstock + $request->jmlhbarangmsk;
        # update stock barang
        $brg->update(['jumlahstock' => $stock]);
        # create data to database if success validation
        BarangMasuk::create($brgmasuk);
        # riderect
        return to_route('brg-masuk.index')->with('message', 'Data Berhasil Disimpan');
    }

    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            # remove stock barang
            $barangmsk = BarangMasuk::findOrFail($id);
            $barang = Barang::where('id', $barangmsk->barang_id)->first();
            $stock = $barang->jumlahstock - $barangmsk->jmlhbarangmsk;
            $barang->update(['jumlahstock' => $stock]);
            # find barang masuk and delete
            $barangmsk->delete();
            DB::commit();
            # riderect
            return back()->with('message', 'Data Berhasil Dihapus.');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }
    }
}
