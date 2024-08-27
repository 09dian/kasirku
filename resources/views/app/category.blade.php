<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            @if(session('success'))
            <div
                class="alert alert-success alert-dismissible shadow-sm mb-4 border-left-decoration text-center"
                role="alert">
                <!-- Pesan Sukses -->
                {{ session('success') }}

                <!-- Tombol Close -->
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
            @endif
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Kategori</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div
                            class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="search-orders"
                                            name="searchorders"
                                            class="form-control search-orders"
                                            placeholder="Search"></div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="col-auto">
                                    <a
                                        class="btn app-btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#uploadKategory"
                                        href="/category">
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            class="bi bi-upload me-2"
                                            fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>Kategori</a>
                                    {{-- modal kategori --}}
                                    {{-- categoryModal --}}

                                    <form action="{{ route('category.store') }}" method="post">
                                        @csrf
                                        <div
                                            class="modal fade"
                                            id="uploadKategory"
                                            data-bs-backdrop="static"
                                            data-bs-keyboard="false"
                                            tabindex="-1"
                                            aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Kategori</h1>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <div class="mb-3">
                                                                <label class="form-label">Kategori</label>
                                                                <input
                                                                    type="text"
                                                                    name="category"
                                                                    id="category"
                                                                    class="form-control"
                                                                    placeholder="Kategori"></div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Slug</label>
                                                                    <input
                                                                        type="text"
                                                                        name="slug"
                                                                        id="slug"
                                                                        class="form-control"
                                                                        placeholder="Slug"
                                                                        readonly="readonly"></div>
                                                                </div>
                                                                <div class="modal-footer" style="color: white;">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary" style="color: white;">Save Kategori</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                {{-- akhir kategory modal --}}

                                                {{-- akhir modal --}}

                                            </div>
                                        </div>
                                        <!--//row-->
                                    </div>
                                    <!--//table-utilities-->
                                </div>
                                <!--//col-auto-->
                            </div>
                            <!--//row-->

                            <nav
                                id="orders-table-tab"
                                class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                                <a
                                    class="flex-sm-fill text-sm-center nav-link active"
                                    id="orders-all-tab"
                                    data-bs-toggle="tab"
                                    href="#orders-all"
                                    role="tab"
                                    aria-controls="orders-all"
                                    aria-selected="true">All</a>
                                <a
                                    class="flex-sm-fill text-sm-center nav-link"
                                    id="orders-paid-tab"
                                    data-bs-toggle="tab"
                                    href="#orders-paid"
                                    role="tab"
                                    aria-controls="orders-paid"
                                    aria-selected="false">Cuci Mulut</a>
                                <a
                                    class="flex-sm-fill text-sm-center nav-link"
                                    id="orders-pending-tab"
                                    data-bs-toggle="tab"
                                    href="#orders-pending"
                                    role="tab"
                                    aria-controls="orders-pending"
                                    aria-selected="false">Minuman</a>
                                <a
                                    class="flex-sm-fill text-sm-center nav-link"
                                    id="orders-cancelled-tab"
                                    data-bs-toggle="tab"
                                    href="#orders-cancelled"
                                    role="tab"
                                    aria-controls="orders-cancelled"
                                    aria-selected="false">Makanan</a>
                            </nav>

                            <div class="tab-content" id="orders-table-tab-content">
                                <div
                                    class="tab-pane fade show active"
                                    id="orders-all"
                                    role="tabpanel"
                                    aria-labelledby="orders-all-tab">
                                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                                        <div class="app-card-body">
                                            <div class="table-responsive">
                                                <table class="table app-table-hover mb-0 text-left">
                                                    <thead>
                                                        <tr>
                                                            <th class="cell">No</th>
                                                            <th class="cell">ID</th>
                                                            <th class="cell">Nama</th>
                                                            <th class="cell">Slug</th>
                                                            <th class="cell">Date</th>
                                                            <th class="cell">Status</th>
                                                            <th class="cell">Action</th>
                                                            <th class="cell"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @foreach ( $category as $data)
                                                            <td class="cell">{{ $loop->iteration }}</td>
                                                            <td class="cell">
                                                                {{ $data->id }}
                                                            </td>
                                                            <td class="cell">{{ $data->category }}</td>
                                                            <td class="cell">
                                                                <span class="cell-data">{{ $data->slug }}</span>
                                                            </td>
                                                            <td class="cell">{{ $data->updated_at }}</td>
                                                            <td class="cell">
                                                                <form
                                                                    id="status-form-{{ $data->id }}"
                                                                    action="{{ route('category.update', $data->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('PUT')

                                                                    <div class="form-check form-switch">
                                                                        <input
                                                                            class="form-check-input"
                                                                            type="checkbox"
                                                                            role="switch"
                                                                            id="status-switch-{{ $data->id }}"
                                                                            name="status"
                                                                            value="1"
                                                                            {{ $data->status == 1 ? 'checked' : '' }}
                                                                            onchange="updateStatus(this)">
                                                                            <label class="form-check-label" for="status-switch-{{ $data->id }}">Aktif</label>
                                                                        </div>
                                                                    </form>

                                                                </td>
                                                                <td class="cell">
                                                                    <form
                                                                        action="{{ route('category.destroy', $data->id) }}"
                                                                        method="post"
                                                                        class="d-inline">
                                                                        @csrf @method('DELETE')
                                                                        <button
                                                                            type="submit"
                                                                            class="btn btn-danger btn-sm text-white"
                                                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                                            <svg
                                                                                width="1em"
                                                                                height="1em"
                                                                                viewBox="0 0 16 16"
                                                                                class="bi bi-trash me-2"
                                                                                fill="currentColor"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                                <path
                                                                                    fill-rule="evenodd"
                                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                            </svg>
                                                                            Delete
                                                                        </button>
                                                                    </button>
                                                                </form>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--//table-responsive-->

                                        </div>
                                        <!--//app-card-body-->
                                    </div>
                                    <!--//app-card-->
                                    <nav class="app-pagination">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--//app-pagination-->

                                </div>
                                <!--//tab-pane-->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Memeriksa elemen
                                        const categoryInput = document.getElementById('category');
                                        const slugInput = document.getElementById('slug');

                                        if (categoryInput && slugInput) {
                                            categoryInput.addEventListener('input', function () {
                                                const categoryValue = categoryInput.value;
                                                const slugValue = categoryValue
                                                    .toLowerCase() // Ubah ke huruf kecil
                                                    .replace(/ /g, '-') // Ganti spasi dengan dash
                                                    .replace(/[^\w-]+/g, ''); // Hapus karakter non-alfanumerik kecuali dash

                                                slugInput.value = slugValue;
                                            });
                                        } else {
                                            console.error('Elemen dengan ID "category" atau "slug" tidak ditemukan.');
                                        }
                                    });
                                </script>
                            </x-layout>