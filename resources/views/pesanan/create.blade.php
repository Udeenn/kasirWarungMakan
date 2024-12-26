{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Menu Makanan</h1>
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <label>Nama Pemesan:</label>
        <input type="text" name="nama_pemesan" required>
        <br><br>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <td>
                        {{ $menu->nama_menu }}
                        <input type="hidden" name="menu_id[]" value="{{ $menu->id }}">
                    </td>
                    <td>
                        Rp{{ $menu->harga_menu }}
                        <input type="hidden" name="harga[]" value="{{ $menu->harga_menu }}">
                    </td>
                    <td>
                        <input type="number" name="jumlah[]" value="0" min="0">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <button type="submit">Pesan</button>
    </form>
</body>
</html> --}}

<div class="modal fade" id="createPesanan" tabindex="-1" aria-labelledby="createMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <table border="1" cellpadding="5" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Makanan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    <td>
                                        {{ $menu->nama_menu }}
                                        <input type="hidden" name="menu_id[]" value="{{ $menu->id }}">
                                    </td>
                                    <td>
                                        Rp{{ $menu->harga_menu }}
                                        <input type="hidden" name="harga[]" value="{{ $menu->harga_menu }}">
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah[]" value="0" min="0">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>