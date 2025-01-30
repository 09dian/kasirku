<x-layout>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
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
                                                <td class="cell text-center">
                                                    <span class="badge bg-success">Aktif</span>
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
                                                    <a class="btn-sm app-btn-secondary"href="#">View</a>
                                                </td>
                                            </tr>
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
