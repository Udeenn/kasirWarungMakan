{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <h1>Menu Makanan</h1>
    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_menu">Nama Menu</label>
            <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $menu->nama_menu }}" required>
        </div>
        <div class="form-group">
            <label for="harga_menu">Nama Menu</label>
            <input type="text" class="form-control" id="harga_menu" name="harga_menu" value="{{ $menu->harga_menu }}" required>
        </div>
        <button class="btn btn-success" type="submit">Perbarui</button>
    </form>
</body>
</html> --}}

<div class="modal fade" id="editMenu" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menu.update', ':id') }}" method="POST" id="editMenuForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="harga_menu" class="form-label">Harga Menu</label>
                        <input type="text" class="form-control" id="harga_menu" name="harga_menu" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_menu">Gambar Menu</label>
                        <input type="file" class="form-control" id="gambar_menu" name="gambar_menu" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

