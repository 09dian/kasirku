<x-layout :pMessage="$messages" :jumlahPesan="$jumlahPesan">
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">kategori</h1>
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
                                <a class="btn app-btn-secondary" href="{{ route('tambah_kategori') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                    Tambah Kategori
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
                                            <th class="cell">Nama Kategori</th>
                                            <th class="cell">Deskripsi</th>
                                            <th class="cell text-center">Status</th>
                                            <th class="cell">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $key => $kategori)
                                            <tr class="text-center">
                                                <td class="cell">{{ $loop->iteration }}</td>
                                                <td class="cell">{{ $kategori->nama_kategori }}</td>
                                                <td class="cell">
                                                    <span class="truncate">{{ $kategori->deskripsi }}</span>
                                                </td>
                                                <td class="cell">
                                                    @if ($kategori->status == 1)
                                                        <span class="badge bg-success">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td class="cell">
                                                    <button type="button" class="btn-sm app-btn-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#viewModal{{ $kategori->id }}">
                                                        View
                                                    </button>
                                                    <!-- Modal untuk setiap produk -->
                                                    <div class="modal fade" id="viewModal{{ $kategori->id }}"
                                                        aria-hidden="true"
                                                        aria-labelledby="viewModalLabel{{ $kategori->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="viewModalLabel{{ $kategori->id }}">Detail
                                                                        Kategori
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table app-table-hover mb-0 text-left">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="cell">No</th>
                                                                                <th class="cell">Harga</th>
                                                                                <th class="cell">Stok</th>
                                                                                <th class="cell">Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="cell">
                                                                                    {{ $loop->iteration }}</td>
                                                                                <td class="cell">
                                                                                    {{ $kategori->nama_kategori }}</td>
                                                                                <td class="cell">
                                                                                    {{ $kategori->deskripsi }}</td>
                                                                                <td class="cell">
                                                                                    @if ($kategori->status == 1)
                                                                                        <span
                                                                                            class="badge bg-success">Aktif</span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-danger">Tidak
                                                                                            Aktif</span>
                                                                                    @endif

                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('kategori_delete', $kategori->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger text-white">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="17" height="17"
                                                                                fill="currentColor" class="bi bi-trash"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                                <path
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                                            </svg>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-warning update"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#updateModalKategori">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="17" height="17"
                                                                                fill="currentColor" class="bi bi-pen"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>

                                                                    <!-- Tombol Update -->

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="updateModalKategori" aria-hidden="true"
                                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">
                                                                Edit Kategori</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form
                                                                action="{{ route('kategori_update', $kategori->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="mb-3">

                                                                    <input type="text" class="form-control"
                                                                        id="nama_kategori_{{ $kategori->id }}"
                                                                        name="nama_kategori"
                                                                        value="{{ $kategori->nama_kategori }}">
                                                                </div>
                                                                <div class="mb-3">

                                                                    <input type="text" class="form-control"
                                                                        id="deskripsi_{{ $kategori->id }}"
                                                                        name="deskripsi"
                                                                        value="{{ $kategori->deskripsi }}">
                                                                </div>
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
                                                                            {{ $kategori->status == 1 ? 'checked' : '' }}
                                                                            onchange="updateSwitch(this)">

                                                                        <label class="form-check-label"
                                                                            for="statusSwitch" id="switchLabel">
                                                                            {{ $kategori->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
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
