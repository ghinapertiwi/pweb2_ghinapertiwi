<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::all();
        return view('tables', [
            'pemesanan' => $pemesanan,
        ]);
    }

    public function create(){
        $pemesanan = Pemesanan::all();
        return view('form', [
            'pemesanan' => $pemesanan,
        ]);
    }

    // public function store(Request $request){
    //     $pemesanan = Pemesanan::all();
    //     Pemesanan::create($request->except(['_token','submit']));
    //     return redirect('tables', [
    //         'pemesanan' => $pemesanan,
    //     ]);
    // }

    public function store(Request $request){
        $pemesanan = Pemesanan::create($request->all());
        return redirect('/tables');
    }

    public function destroy($id){
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return redirect('/tables');
    }

    public function edit($id){
        $pemesanan = Pemesanan::findOrFail($id);
        return view ('edit',['pesankatering'=> $pemesanan]);
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        
        $pemesanan->update($request->all());
        return redirect('/tables');
    }
}
