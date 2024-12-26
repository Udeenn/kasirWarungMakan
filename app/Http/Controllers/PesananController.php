<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Menu;
use App\Models\Detail_pesanan;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $pesanans = Pesanan::with(['detailPesanans' => function ($query) {
            $query->orderBy('id', 'asc');
        }])->get();
    
        return view('pesanan.index', compact('pesanans', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $menus = Menu::all();
        return view('pesanan.create', compact('menus'));
    }

    public function store(Request $request){
        $pesanan = Pesanan::create([
            'nama_pemesan' => $request->nama_pemesan,
            'kode_pesanan' => 'PES-' . time(),
        ]);

        $totalHarga = 0;

        foreach ($request->menu_id as $key => $menuId) {
            $jumlah = $request->jumlah[$key];
            $harga = $request->harga[$key];
            $subtotal = $jumlah * $harga;

            Detail_Pesanan::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $menuId,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'subtotal' => $subtotal,
            ]);

            $totalHarga += $subtotal;
        }

        $pesanan->update(['total_harga' => $totalHarga]);

        return redirect('/pesanan')->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $pesanan = Pesanan::with('detailPesanans.menu')->findOrFail($id);
        $totalBelanja = $pesanan->detailPesanans->sum('subtotal');

        return view('pesanan.show', compact('pesanan', 'totalBelanja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showStruk($id){
        $pesanan = Pesanan::with('detailPesanans.menu')->findOrFail($id);
        $totalBelanja = $pesanan->detailPesanans->sum('subtotal');
        return view('pesanan.struk', compact('pesanan', 'totalBelanja'));
    }
}
