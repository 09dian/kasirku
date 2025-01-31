<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Data Pegawai</h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

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
                                        <th class="cell">Aksi</th>
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
                                            <td class="cell">
                                                <a class="btn-sm app-btn-secondary" href="#">View</a>
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
