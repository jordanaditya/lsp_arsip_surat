<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class ArsipController extends Controller
{
    public function index()
    {
        $surat = Surat::latest()->get();
        return view('home', ['surat' => $surat]);
    }

    public function about () 
    {
        return view('about', [
            "active" => 'about',
            "title" => "About",
            "name" => "Jordan Brilliant",
            "nim" => "1931710044",
            "tanggal" => "25 Oktober 2021",
            "image" => "jordan.jpg"
        ]);
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
		$surat = Surat::latest()->where('judul','like',"%".$cari."%")
        ->orWhere('kategori','like',"%".$cari."%")
        ->orWhere('nomor_surat','like',"%".$cari."%")
        ->get();
		return view('home', ['surat' => $surat]);
	}

    public function hapus($id)
    {
        $surat= Surat::find($id);
        $surat->delete();
        return redirect('/')->with('success', 'Surat berhasil di hapus');
    }

    public function arsip() 
    {
      return view('arsip');
    }

    public function store(Request $request) 
    {
      $data=new Surat();
      $file=$request->file;
      $filename=time(). '.'.$file->getClientOriginalExtension();
      $request->file->move('assets', $filename);
      $data->file=$filename;

      $data->judul=$request->judul;
      $data->nomor_surat=$request->nomor_surat;
      $data->kategori=$request->kategori;

      $data->save();
      return redirect()->back()->with('success', 'Surat berhasil diarsipkan');

    }

    public function lihat($id)
    {
        $surat = Surat::find($id)->get();
        return view('show', ['surat' => $surat]);
    }

    public function edit($id)
    {
        $surat = Surat::find($id);
        return view('edit', ['surat' => $surat]);
    }

    public function update($id, Request $request ) 
    {
     
      $data=Surat::find($id);
      $file=$request->file;
      $filename=time(). '.'.$file->getClientOriginalExtension();
      $request->file->move('assets', $filename);
      $data->file=$filename;

      $data->judul=$request->judul;
      $data->nomor_surat=$request->nomor_surat;
      $data->kategori=$request->kategori;

      $data->save();
      

      return redirect('/')->with('success', 'Surat berhasil diupdate');

    }

    public function download(Request $request, $file) {
      return response()->download(public_path('assets/'.$file));
    }
}
