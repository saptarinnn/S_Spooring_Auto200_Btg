<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'pengguna';
        $this->subtitle = 'list pengguna pada aplikasi pelayanan spooring.';
    }
    public function index()
    {
        return view('master.users.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'users' => User::paginate(10),
        ]);
    }
    public function create()
    {
        return view('master.users.create', [
            'title' => 'Tambah ' . $this->title,
            'subtitle' => 'Tambah ' . $this->subtitle,
        ]);
    }
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'fullname' => ['required'],
        ]);

        // Insert To Database
        $user = new User();
        $user->username = htmlspecialchars($request->username);
        $user->password = Hash::make('spooring123#');
        $user->email = htmlspecialchars($request->email);
        $user->fullname = htmlspecialchars($request->fullname);
        $user->save();

        // Riderect
        return redirect()->route('users.index')->with('message', 'Data Berhasil Disimpan.');
    }
    public function edit($user)
    {
        return view('master.users.edit', [
            'title' => 'Ubah ' . $this->title,
            'subtitle' => 'Ubah ' . $this->subtitle,
            'user' => User::findOrFail($user),
        ]);
    }
    public function update(Request $request, $user)
    {
        // Validation
        $request->validate([
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $request->id],
            'fullname' => ['required'],
        ]);

        // Update To Database
        $user = User::findOrFail($user);
        $user->username = htmlspecialchars($request->username);
        $user->password = Hash::make('spooring123#');
        $user->email = htmlspecialchars($request->email);
        $user->fullname = htmlspecialchars($request->fullname);
        $user->save();

        // Riderect
        return redirect()->route('users.index')->with('message', 'Data Berhasil Disimpan.');
    }
    public function destroy($user)
    {
        User::findOrFail($user)->delete();
        return back()->with('message', 'Data Berhasil Dihapus.');
    }
}
