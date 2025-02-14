<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Data Pegawai</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                    <path
                                        d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path
                                        d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                                </svg>
                                Tambah Pegawai
                            </button>

                        </div>
                    </div><!--//row-->

                </div><!--//table-utilities-->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- modal tambah pegawai --}}

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pegawai</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('pegawai') }}" method="post">
                                <?php
                                $tanggal = date('d'); // format tanggal 2 digit
                                $bulan = date('m'); // format bulan 2 digit
                                $tahun = date('y'); // format tahun 2 digit
                                $acak = rand(10, 99);
                                $id_pegawai = $acak . $tanggal . $bulan . $tahun;
                                ?>
                                @csrf
                                <div class="modal-body">
                                    <!-- Input Nama -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Nama</span>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan Nama" aria-label="Nama Pegawai"
                                            aria-describedby="basic-addon1" required>
                                    </div>

                                    <!-- Input TTL (Tempat, Tanggal Lahir) -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">TTL</span>
                                        <input type="date" name="ttl" class="form-control"
                                            placeholder="Pilih Tanggal Lahir" aria-label="Tanggal Lahir"
                                            aria-describedby="basic-addon1" required>
                                    </div>

                                    <!-- Input Alamat -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Alamat</span>
                                        <input type="text" name="alamat" class="form-control"
                                            placeholder="Masukkan Alamat" aria-label="Alamat Pegawai"
                                            aria-describedby="basic-addon1" required>
                                    </div>

                                    <!-- Input No Hp -->
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">No Hp</span>
                                        <input type="text" name="no_hp" class="form-control"
                                            placeholder="Masukkan Nomor Handphone" aria-label="Nomor Handphone"
                                            aria-describedby="basic-addon1" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Id Pegawai</span>
                                        <!-- Menambahkan readonly untuk mencegah pengeditan -->
                                        <input type="text" name="no_pegawai" class="form-control"
                                            placeholder="{{ $id_pegawai }}" aria-describedby="basic-addon1"
                                            value="{{ $id_pegawai }}" readonly required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn app-btn-secondary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- akhir modal tambah pegawai --}}

            </div><!--//col-auto-->
        </div><!--//row-->
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">Id Pegawai</th>
                                        <th class="cell">Nama Pegawai</th>
                                        <th class="cell">TTL</th>
                                        <th class="cell">Alamat</th>
                                        <th class="cell">No HP</th>
                                        <th class="cell">Terahkir Login</th>
                                        <th class="cell text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawais as $pegawai)
                                        <tr>
                                            <td class="cell">{{ $pegawai->no_pegawai }}</td>
                                            <td class="cell"><span class="truncate">{{ $pegawai->nama }}</span></td>
                                            <td class="cell">{{ $pegawai->ttl }}</td>
                                            <td class="cell">{{ $pegawai->alamat }}</td>
                                            <td class="cell">{{ $pegawai->no_hp }}</td>
                                            <td class="cell">
                                                @if ($pegawai->terakhir_login)
                                                    <span class="cell-data">{{ $pegawai->terakhir_login }}</span>
                                                @else
                                                    <span class="badge bg-warning">Never logged in</span>
                                                @endif
                                            </td>
                                            <td class="cell d-flex gap-2 justify-content-center">
                                                <form action="{{ route('delete_pegawai', $pegawai->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <svg style="color: white" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                        </svg>
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pen-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                                    </svg>
                                                </button>

                                                <form action="{{ route('edit_pegawai', $pegawai->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal fade" id="exampleModalToggle"
                                                        aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="exampleModalToggleLabel">Edit Pegawai</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Input pegawai -->
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Nama</span>
                                                                        <input type="text" name="no_pegawai"
                                                                            class="form-control"
                                                                            placeholder="Masukkan No Pegawai"
                                                                            aria-label="No pegawai"
                                                                            aria-describedby="basic-addon1"
                                                                            value="{{ $pegawai->no_pegawai }}"
                                                                            required>
                                                                    </div>
                                                                    <!-- Input Nama -->
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Nama</span>
                                                                        <input type="text" name="nama"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Nama"
                                                                            aria-label="Nama Pegawai"
                                                                            aria-describedby="basic-addon1"
                                                                            value="{{ $pegawai->nama }}" required>
                                                                    </div>

                                                                    <!-- Input TTL (Tempat, Tanggal Lahir) -->
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">TTL</span>
                                                                        <input type="date" name="ttl"
                                                                            class="form-control"
                                                                            placeholder="Pilih Tanggal Lahir"
                                                                            aria-label="Tanggal Lahir"
                                                                            aria-describedby="basic-addon1"
                                                                            value="{{ $pegawai->ttl }}" required>
                                                                    </div>

                                                                    <!-- Input Alamat -->
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">Alamat</span>
                                                                        <input type="text" name="alamat"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Alamat"
                                                                            aria-label="Alamat Pegawai"
                                                                            aria-describedby="basic-addon1"
                                                                            value="{{ $pegawai->alamat }}" required>
                                                                    </div>

                                                                    <!-- Input No Hp -->
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon1">No Hp</span>
                                                                        <input type="text" name="no_hp"
                                                                            class="form-control"
                                                                            placeholder="Masukkan Nomor Handphone"
                                                                            aria-label="Nomor Handphone"
                                                                            aria-describedby="basic-addon1"
                                                                            value="{{ $pegawai->no_hp }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn btn-success text-white"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-floppy2-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path d="M12 2h-2v3h2z" />
                                                                            <path
                                                                                d="M1.5 0A1.5 1.5 0 0 0 0 1.5v13A1.5 1.5 0 0 0 1.5 16h13a1.5 1.5 0 0 0 1.5-1.5V2.914a1.5 1.5 0 0 0-.44-1.06L14.147.439A1.5 1.5 0 0 0 13.086 0zM4 6a1 1 0 0 1-1-1V1h10v4a1 1 0 0 1-1 1zM3 9h10a1 1 0 0 1 1 1v5H2v-5a1 1 0 0 1 1-1" />
                                                                        </svg> Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <button type="button" class="btn btn-info" style="color: white"
                                                    data-bs-target="#exampleModalTogglepesan" data-bs-toggle="modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-envelope-plus" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                                        <path
                                                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                                                    </svg>
                                                </button>
                                                {{-- tombol pesan --}}

                                                <!-- Modal Kirim Pesan -->
                                                <!-- Modal Kirim Pesan -->
                                                <div class="modal fade" id="exampleModalTogglepesan"
                                                    aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <!-- Form di dalam modal -->
                                                            <form id="messageForm" action="{{ route('messages') }}"
                                                                method="POST">
                                                                @csrf <!-- CSRF Token -->

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="exampleModalToggleLabel">Kirim Pesan ke
                                                                        {{ $pegawai->nama }}</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- Modal Body -->
                                                                <div
                                                                    class="modal-body d-flex flex-column align-items-center justify-content-center text-center">
                                                                    <label for="message"
                                                                        class="form-label fw-bold">Pesan Anda:</label>
                                                                    <textarea id="message" name="message" class="form-control p-3 border rounded-3 text-center" rows="9"
                                                                        placeholder="Tulis pesan di sini..." style="width: 100%; max-width: 550px;" required></textarea>

                                                                    <!-- Input Hidden untuk ID Penerima -->
                                                                    <input type="hidden" id="receiver_id"
                                                                        name="receiver_id"
                                                                        value="{{ $pegawai->id }}">
                                                                    <input type="hidden" id="receiver_type"
                                                                        name="receiver_type" value="pegawai">
                                                                </div>

                                                                <!-- Modal Footer -->
                                                                <div
                                                                    class="modal-footer d-flex justify-content-between">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bi bi-x-circle"></i> Batal
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn app-btn-primary">
                                                                        Kirim Pesan
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16" height="16"
                                                                            fill="currentColor"
                                                                            class="bi bi-arrow-bar-right"
                                                                            viewBox="0 0 16 16">
                                                                            <path fill-rule="evenodd"
                                                                                d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8m-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!--//table-responsive-->

                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div><!--//tab-content-->
    </div><!--//container-fluid-->

</x-layout>
