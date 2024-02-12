<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    protected $title, $subtitle;
    public function __construct()
    {
        $this->title = 'homepage';
        $this->subtitle = 'pengaturan homepage pada aplikasi pelayanan spooring.';
    }

    public function index()
    {
        return view('master.homepage.index', [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'homepage' => Homepage::first(),
        ]);
    }

    public function store(Request $request)
    {
        # validation
        $request->validate([
            'head' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'subhead' => ['required'],
            'image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'facebook' => ['nullable'],
            'youtube' => ['nullable'],
            'instagram' => ['nullable'],
        ]);
        # check if homepage id exists on database
        if (!$request->id) {
            # Insert to database
            Homepage::create([
                'head' =>  $request->has('head') ? $request->file('head')->store('homepage') : null,
                'subhead' => $request->subhead,
                'image' =>  $request->has('image') ? $request->file('image')->store('homepage') : null,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
            ]);
        } else {
            # Update to database
            $homepage = Homepage::findOrFail($request->id);
            $homepage->update([
                'head' =>  $request->has('head') ? $request->file('head')->store('homepage') : $homepage->head,
                'subhead' => $request->subhead,
                'image' =>  $request->has('image') ? $request->file('image')->store('homepage') : $homepage->image,
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
            ]);
        }
        # Riderect
        return redirect()->route('homepages.index')->with('message', 'Data Berhasil Disimpan.');
    }
}
