@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Pendapatan</h5>
                    <p class="card-text">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pesanan</h5>
                    <p class="card-text">{{ $jumlahPesanan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Menu Paling Laris</h5>
                    @if ($menuTerlaris)
                    <p class="card-text">{{ $menuTerlaris->menu->nama_menu }} ({{ $menuTerlaris->total_jumlah }}x dipesan)</p>
                    @else
                    <p class="card-text">Belum ada data.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h2>Detail Rekap Pesanan</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Subtotal</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->kode_pesanan }}</td>
                    <td>{{ $pesanan->nama_pemesan }}</td>
                    <td>Rp{{ number_format($pesanan->detailPesanans->sum('subtotal'), 0, ',', '.') }}</td>
                    <td>{{ $pesanan->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
