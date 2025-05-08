<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: Rubik, sans-serif;
        }
    </style>
</head>

<body class="bg-secondary-subtle">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h2 class="text-center my-4">Laravel: CRUD Produk</h2>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('produk.create') }}" class="btn btn-md btn-outline-success mb-3">Tambah</a>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col" style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produk as $data)
                                    <tr>
                                        <td>
                                            {{ $data->nama_produk }}
                                        </td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>{{ 'Rp' . number_format($data->harga, 2, ',', '.') }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('produk.destroy', $data->id) }}" method="POST">
                                                <a href="{{ route('produk.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning">Lihat</a>
                                                <a href="{{ route('produk.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-primary">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $produk->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
