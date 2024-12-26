@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPesanan">
        Tambah Pesanan
    </button>
</div>

@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
<table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>ID Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanans as $pesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->nama_pemesan }}</td>
                <td>{{ $pesanan->id }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('pesanan.show', $pesanan->id) }}">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@include('pesanan.create')
@endsection
    