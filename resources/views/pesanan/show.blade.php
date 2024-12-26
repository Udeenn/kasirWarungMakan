<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Belanja</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .receipt {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .receipt h1 {
            font-size: 1.5rem;
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt table {
            font-size: 0.9rem;
        }
        .total {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Struk Belanja</h1>
        <p><strong>Nama Pemesan:</strong> {{ $pesanan->nama_pemesan }}</p>
        <p><strong>Kode Pesanan:</strong> {{ $pesanan->kode_pesanan }}</p>
        <p><strong>Tanggal:</strong> {{ $pesanan->created_at->format('d M Y, H:i') }}</p>

        <table class="table table-bordered table-sm mt-3">
            <thead class="table-light">
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan->detailPesanans as $detail)
                <tr>
                    <td>{{ $detail->menu->nama_menu }}</td>
                    <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="total">Total Belanja: Rp{{ number_format($totalBelanja, 0, ',', '.') }}</p>
        <a class="btn btn-outline-secondary" href="{{ route('pesanan.index') }}">Kembali</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
