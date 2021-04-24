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
        $request->validate([
            'judul_buku'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required'
        ]);
        $buku = new Buku([
            'judul_buku' => $request->get('judul_buku'),
            'penulis' => $request->get('penulis'),
            'penerbit' => $request->get('penerbit')
        ]);
        $buku->save();
        return redirect('/bukus')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
            'penerbit'=>'required'
        ]);
        $contact = Buku::find($id);
        $contact->judul_buku =  $request->get('judul_buku');
        $contact->penulis = $request->get('penulis');
        $contact->penerbit = $request->get('penerbit');
        $contact->save();
        return redirect('/bukus')->with('success', 'Buku updated!');
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