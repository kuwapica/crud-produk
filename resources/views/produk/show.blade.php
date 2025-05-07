<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: Inter, sans-serif;
        }
    </style>
</head>

<body class="bg-warning-subtle">

    <div class="container mt-5 mb-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <p><b>Nama Produk :</b> {{ $produk->nama_produk }}</p>
                    <p><b>Kategori : </b>{{ $produk->kategori }}</p>
                    <p><b>Harga : </b>{{ 'Rp ' . number_format($produk->harga, 2, ',', '.') }}</p>
                    <p><b>Deskripsi : </b>{{ $produk->deskripsi }}</p>
                    <p><b>Stok : </b>{{ $produk->stok }}</p>
                    <hr />
                    <a href="{{ route('produk.index') }}" class="btn btn-md btn-primary mb-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
