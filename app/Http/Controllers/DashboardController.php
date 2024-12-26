<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Detail_pesanan;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pesanans = Pesanan::all();
        $totalPendapatan = Detail_Pesanan::sum('subtotal');

        $jumlahPesanan = Pesanan::count();

        $menuTerlaris = Detail_Pesanan::select('menu_id', DB::raw('SUM(jumlah) as total_jumlah'))
            ->groupBy('menu_id')->orderBy('total_jumlah', 'desc')
            ->with('menu')
            ->first();

        return view('dashboard', compact('totalPendapatan', 'jumlahPesanan', 'menuTerlaris', 'pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
