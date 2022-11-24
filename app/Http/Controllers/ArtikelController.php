<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan daftar artikel
        $artikel = Artikel::all();
        $kategori = Kategori::all();
        return view('layouts/artikel', compact('artikel', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambah data artikel
        $data = $request->all();
        $data['foto'] = Storage::put('artikel/foto', $request->file('foto'));
        Artikel::create($data);

        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //menampilkan artikel ke halaman depan
        // $front = Artikel::all();
        // return view('front', compact('front'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel, $id)
    {
        //edit data artikel
        $artikel = Artikel::find($id);
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('artikel/foto');
            $artikel->id = $request->id;
            $artikel->judul = $request->judul;
            $artikel->isi = $request->isi;
            $artikel->kategori_id = $request->kategori_id;
            $artikel->foto = $file;
            $artikel->save();
        } else {
            $artikel->id = $request->id;
            $artikel->judul = $request->judul;
            $artikel->isi = $request->isi;
            $artikel->foto;
            $artikel->kategori_id = $request->kategori_id;
            $artikel->save();
        }

        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel, $id)
    {
        //menghapus data artikel
        Artikel::find($id)->delete();
        return redirect('artikel');
    }
}
