<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('bukus.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bukus.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'judul_buku'=>'required',
        //     'penulis'=>'required',
        //     'penerbit'=>'required'
        // ]);
        // $buku = new Buku([
        //     'judul_buku' => $request->get('judul_buku'),
        //     'penulis' => $request->get('penulis'),
        //     'penerbit' => $request->get('penerbit')
        // ]);
        // $buku->save();
        $this->validate($request, [
            'judul_buku'=> 'required',
            'penulis'=> 'required',
            'penerbit'=> 'required',
			'img' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('img');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Buku::create([
            'judul_buku' => $request-> judul_buku,
            'penulis' => $request -> penulis,
            'penerbit' => $request -> penerbit,
			'img' => $nama_file,
		]);
        return redirect('/bukus')->with('success', 'Buku tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('bukus.edit', compact('buku')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required',
            'img' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
       
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('img');
        if($file !== null) {
            $nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

        $bukuEdit = Buku::find($id);
        $bukuEdit->judul_buku =  $request->get('judul_buku');
        $bukuEdit->penulis = $request->get('penulis');
        $bukuEdit->penerbit = $request->get('penerbit');
        $bukuEdit->img = $nama_file;
        $bukuEdit->save();
        return redirect('/bukus')->with('success', 'Buku updated!');
        } else {
        $bukuEdit = Buku::find($id);
        $bukuEdit->judul_buku =  $request->get('judul_buku');
        $bukuEdit->penulis = $request->get('penulis');
        $bukuEdit->penerbit = $request->get('penerbit');
        $bukuEdit->save();
        return redirect('/bukus')->with('success', 'Buku updated!');
        }
		

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/bukus')->with('success', 'Buku deleted!');
    }
}