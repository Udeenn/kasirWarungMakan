@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMenuModal">
        Tambah Menu Baru
    </button>
</div>

@if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($menus as $menu)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $menu->nama_menu }}</td>
            <td>Rp{{ number_format($menu->harga_menu, 0, ',', '.') }}</td>
            <td><img src="{{ asset('images/' . $menu->gambar_menu) }}" alt="Product Image" width="50"></td>
            <td>
                <button class="btn btn-warning edit-menu" 
                    data-id="{{ $menu->id }}"
                    data-nama="{{ $menu->nama_menu }}"
                    data-harga="{{ $menu->harga_menu }}" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editMenu">
                    Edit
                </button>
                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Belum ada menu.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@include('menu.edit')
<script>
    document.querySelectorAll('.edit-menu').forEach(function(button) {
        button.addEventListener('click', function() {
            // Ambil data dari atribut data- yang ada di tombol
            var menuId = this.getAttribute('data-id');
            var menuNama = this.getAttribute('data-nama');
            var menuHarga = this.getAttribute('data-harga');

            // Update form action URL untuk mengarah ke route update dengan menu ID
            var formAction = '{{ route('menu.update', ':id') }}'.replace(':id', menuId);
            document.getElementById('editMenuForm').action = formAction;

            // Isi input fields dengan data yang diambil
            document.getElementById('nama_menu').value = menuNama;
            document.getElementById('harga_menu').value = menuHarga;
        });
    });
</script>
@include('menu.create')
@endsection
