<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'barang';
        $this->subtitle = 'list persediaan barang pada gudang barang.';
    }

    public function index()
    {
        return view('master.barang.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'barangs' => Barang::oldest('namabarang')->get(),
        ]);
    }

    public function create()
    {
        return view('master.barang.create', [
            'title' => 'Tambah ' . $this->title,
            'subtitle' => 'Tambah ' . $this->subtitle,
        ]);
    }

    public function store(Request $request)
    {
        # validation
        $request->validate([
            'namabarang' => ['required'],
            'satuanbarang' => ['required'],
        ]);
        # create data to database if success validation
        Barang::create([
            'namabarang' => $request->namabarang,
            'satuanbarang' => $request->satuanbarang,
            'jumlahstock' => 0
        ]);
        # riderect
        return to_route('barang.index')->with('message', 'Data Berhasil Disimpan');
    }

    public function edit(string $id)
    {
        return view('master.barang.edit', [
            'title' => 'Ubah ' . $this->title,
            'subtitle' => 'Ubah ' . $this->subtitle,
            'barang' => Barang::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        # validation
        $brg = $request->validate([
            'namabarang' => ['required'],
            'satuanbarang' => ['required'],
        ]);
        # update data to database if success validation
        $barang = Barang::findOrFail($id);
        $barang->update($brg);
        # riderect
        return redirect()->route('barang.index')->with('message', 'Data Berhasil Disimpan.');
    }

    public function destroy(string $id)
    {
        # find user and delete
        Barang::findOrFail($id)->delete();
        # riderect
        return back()->with('message', 'Data Berhasil Dihapus.');
    }
}
