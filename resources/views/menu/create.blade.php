<div class="modal fade" id="createMenuModal" tabindex="-1" aria-labelledby="createMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_menu" class="form-label">Nama Menu</label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_menu" class="form-label">Harga Menu</label>
                        <input type="number" name="harga_menu" id="harga_menu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_menu">Gambar Menu</label>
                        <input type="file" class="form-control" id="gambar_menu" name="gambar_menu" required>
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
