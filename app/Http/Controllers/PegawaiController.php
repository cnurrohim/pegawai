<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
    * tampilan index.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $pegawai = Pegawai::orderBy('id','desc')->paginate(5);
        return view('pegawai.index', compact('pegawai'));
    }

    /**
    * tampilkan form pegawai baru.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('pegawai.index');
    }

    /**
    * Simpan pegawai ke dalam database.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        Pegawai::create($request->post());

        return redirect()->route('pegawai.index')->with('success','Pegawai baru telah berhasil ditambahkan.');
    }

    /**
    * menampilkan detail pegawai.
    *
    * @param  \App\Pegawai  $pegawai
    * @return \Illuminate\Http\Response
    */
    public function show(Pegawai $pegawai)
    {
        return view('pegawai.show',compact('pegawai'));
    }

    /**
    * menampilkan form edit.
    *
    * @param  \App\Pegawai  $pegawai
    * @return \Illuminate\Http\Response
    */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit',compact('pegawai'));
    }

    /**
    * Update informasi pegawai.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Pegawai  $pegawai
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Pegawai $pegawai)
    {
        
        $pegawai->fill($request->post())->save();

        return redirect()->route('pegawai.index')->with('success','Informasi pegawai telah berhasil diupdate');
    }

    /**
    * hapus pegawai.
    *
    * @param  \App\Pegawai  $pegawai
    * @return \Illuminate\Http\Response
    */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success','Pegawai telah berhasil dihapus dari database');
    }

    /**
     * Tampilkan suggestion pegawai untuk input.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function detail(Pegawai $pegawai)
    {
        return response()->json($pegawai);
    }
}
