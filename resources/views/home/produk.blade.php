<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Data Barang</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('tambah_produk') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    Tambah Barang
                                </a>
                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('kategori') }}">
                                    Kategori
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="cell">No</th>
                                            <th class="cell">Kategori</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Harga</th>
                                            <th class="cell">Stok</th>
                                            <th class="cell text-center">Status</th>
                                            <th class="cell">Gambar</th>
                                            <th class="cell">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $key => $produk)
                                            <tr class="text-center">
                                                <td class="cell">{{ $loop->iteration }}</td>
                                                <td class="cell">{{ $produk->kategori_produk }}</td>
                                                <td class="cell">
                                                    <span class="truncate">{{ $produk->nama_produk }}</span>
                                                </td>
                                                <td class="cell">{{ $produk->harga_produk }}</td>
                                                <td class="cell">
                                                    <span>{{ $produk->stok_produk }}</span>
                                                </td>
                                                <td class="cell">
                                                    @if ($produk->status == 1)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($produk->img_produk)
                                                        <!-- Thumbnail Gambar -->
                                                        <img src="{{ asset('storage/' . $produk->img_produk) }}"
                                                            alt="{{ $produk->nama_produk }}" width="100"
                                                            class="img-thumbnail" data-bs-toggle="modal"
                                                            data-bs-target="#imageModal{{ $produk->id }}">

                                                        <!-- Modal Bootstrap -->
                                                        <div class="modal fade" id="imageModal{{ $produk->id }}"
                                                            tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                                                <div class="modal-content bg-transparent border-0">
                                                                    <div class="modal-body text-center">
                                                                        <img src="{{ asset('storage/' . $produk->img_produk) }}"
                                                                            class="img-fluid rounded w-90">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        Tidak ada gambar
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <button type="button" class="btn-sm app-btn-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $produk->id }}">
                                                        View
                                                    </button>

                                                    <!-- Modal untuk setiap produk -->
                                                    <div class="modal fade" id="viewModal{{ $produk->id }}"
                                                        aria-hidden="true"
                                                        aria-labelledby="viewModalLabel{{ $produk->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="viewModalLabel{{ $produk->id }}">Detail
                                                                        Produk
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table app-table-hover mb-0 text-left">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="cell">Nama</th>
                                                                                <th class="cell">Harga</th>
                                                                                <th class="cell">Stok</th>
                                                                                <th class="cell">Status</th>
                                                                                <th class="cell">Gambar</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="cell">
                                                                                    {{ $produk->nama_produk }}</td>
                                                                                <td class="cell">
                                                                                    {{ $produk->harga_produk }}</td>
                                                                                <td class="cell">
                                                                                    {{ $produk->stok_produk }}</td>
                                                                                <td class="cell">
                                                                                    @if ($produk->status == 1)
                                                                                        <span
                                                                                            class="badge bg-success">Aktif</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-danger">Tidak
                                                                                            Aktif</span>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="cell">
                                                                                    @if ($produk->img_produk)
                                                                                        <img src="{{ asset('storage/' . $produk->img_produk) }}"
                                                                                            alt="{{ $produk->nama_produk }}"
                                                                                            width="100"
                                                                                            class="img-thumbnail"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#imageModal{{ $produk->id }}">
                                                                                    @else
                                                                                        Tidak ada gambar
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('produk_delete', $produk->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger text-white">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="17" height="17"
                                                                                fill="currentColor"
                                                                                class="bi bi-trash"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                                <path
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>

                                                                    <!-- Tombol Update -->
                                                                    <button type="button"
                                                                        class="btn btn-warning update"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#updateModal{{ $produk->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="17" height="17"
                                                                            fill="currentColor" class="bi bi-pen"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                                        </svg>
                                                                    </button>




                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- Modal Update -->
                                        @foreach ($produks as $key => $produk)
                                            <div class="modal fade" id="updateModal{{ $produk->id }}"
                                                tabindex="-1" aria-labelledby="updateModalLabel{{ $produk->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="updateModalLabel{{ $produk->id }}">
                                                                Update Produk
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('produk_update', $produk->id) }}"
                                                                method="POST" enctype="multipart/form-data"
                                                                novalidate>
                                                                @csrf
                                                                @method('PATCH')
                                                                <!-- Nama Produk -->
                                                                <div class="mb-3">
                                                                    <label for="kategori_produk"
                                                                        class="form-label">Kategori Produk</label>
                                                                    <select class="form-select" id="kategori_produk"
                                                                        name="kategori_produk" required>
                                                                        @foreach ($kategoris as $kategori)
                                                                            <option
                                                                                value="{{ $kategori->nama_kategori }}"
                                                                                {{ $produk->kategori_id == $kategori->id ? 'selected' : '' }}>
                                                                                {{ $kategori->nama_kategori }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama_produk" class="form-label">Nama
                                                                        Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_produk" name="nama_produk"
                                                                        value="{{ $produk->nama_produk }}" required>
                                                                </div>

                                                                <!-- Harga Produk -->
                                                                <div class="mb-3">
                                                                    <label for="harga_produk" class="form-label">Harga
                                                                        Produk</label>
                                                                    <input type="number" class="form-control"
                                                                        id="harga_produk" name="harga_produk"
                                                                        value="{{ $produk->harga_produk }}" required>
                                                                </div>

                                                                <!-- Stok Produk -->
                                                                <div class="mb-3">
                                                                    <label for="stok_produk" class="form-label">Stok
                                                                        Produk</label>
                                                                    <input type="number" class="form-control"
                                                                        id="stok_produk" name="stok_produk"
                                                                        value="{{ $produk->stok_produk }}" required>
                                                                </div>

                                                                <!-- Status -->
                                                                <div class="mb-3">
                                                                    <label for="status"
                                                                        class="form-label">Status</label>
                                                                    <div class="form-check form-switch">
                                                                        <!-- Input hidden untuk mengirimkan nilai 0 ketika tidak dicentang -->
                                                                        <input type="hidden" name="status"
                                                                            value="0">

                                                                        <!-- Checkbox yang akan mengirimkan nilai 1 saat dicentang -->
                                                                        <input name="status" value="1"
                                                                            class="form-check-input" type="checkbox"
                                                                            role="switch" id="statusSwitch"
                                                                            {{ $produk->status == 1 ? 'checked' : '' }}
                                                                            onchange="updateSwitch(this)">

                                                                        <label class="form-check-label"
                                                                            for="statusSwitch" id="switchLabel">
                                                                            {{ $produk->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <!-- Gambar Produk -->
                                                                <div class="mb-3">
                                                                    <label for="img_produk" class="form-label">Gambar
                                                                        Produk</label>
                                                                    <input type="file" class="form-control"
                                                                        id="img_produk" name="img_produk">

                                                                    <!-- Simpan gambar lama (hidden input) -->
                                                                    <input type="hidden" name="old_img_produk"
                                                                        value="{{ $produk->img_produk }}">

                                                                    <!-- Tampilkan gambar jika ada -->
                                                                    @if ($produk->img_produk)
                                                                        <img src="{{ asset('storage/' . $produk->img_produk) }}"
                                                                            width="100" class="img-thumbnail mt-2">
                                                                    @endif
                                                                </div>


                                                                <!-- Tombol Submit -->
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav><!--//app-pagination-->

                </div><!--//tab-pane-->
            </div><!--//tab-content-->



        </div><!--//container-fluid-->
    </div><!--//app-content-->

</x-layout>
