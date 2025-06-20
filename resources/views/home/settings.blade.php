<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Akun {{ ucwords(strtolower(Auth::user()->nama_toko)) }}</h1>
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div><!--//icon-holder-->
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Profile</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <form action="{{ route('settings') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-auto">
                                            <div class="item-label mb-2"><strong>Photo</strong></div>
                                            <div class="item-data">
                                                <img class="profile-image rounded-circle"
                                                    src="{{ Auth::user()->gambar ? (str_starts_with(Auth::user()->gambar, 'profile_images/') ? asset('storage/' . Auth::user()->gambar) : asset('assets/images/' . Auth::user()->gambar)) : asset('assets/images/default.jpg') }}"
                                                    alt="Profile Image">

                                            </div>
                                        </div><!--//col-->
                                        <!-- Tombol Edit -->
                                        <div class="col text-end">
                                            <button type="button" class="btn-sm app-btn-secondary"
                                                data-bs-toggle="modal" data-bs-target="#editPhotoModal">
                                                Edit
                                            </button>
                                        </div><!--//col-->
                                    </form>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editPhotoModal" tabindex="-1"
                                        aria-labelledby="editPhotoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('settings') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editPhotoModalLabel">Ubah
                                                            Foto
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex align-items-center">
                                                            <!-- Gambar Profil di Sebelah Kiri -->
                                                            <div class="me-3">
                                                                <img id="previewImage"
                                                                    class="profile-image rounded-circle"
                                                                    src="{{ Auth::user()->gambar ? (str_starts_with(Auth::user()->gambar, 'profile_images/') ? asset('storage/' . Auth::user()->gambar) : asset('assets/images/' . Auth::user()->gambar)) : asset('assets/images/default.jpg') }}"
                                                                    alt="Profile Image"
                                                                    style="width:77px; height:77px; object-fit: cover;">
                                                            </div>

                                                            <!-- Input File di Sebelah Kanan -->
                                                            <div class="flex-grow-1">
                                                                <div class="input-group">
                                                                    <input type="file" id="imageUpload"
                                                                        name="gambar" class="form-control"
                                                                        accept="image/*" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn app-btn-primary w-100">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Nami</strong></div>
                                        <div class="item-data">{{ ucwords(strtolower(Auth::user()->name)) }}</div>
                                    </div><!--//col-->
                                    <!-- Tombol Edit -->
                                    <div class="col text-end">
                                        <button type="button" class="btn-sm app-btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#editModalName">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="editModalName" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('settings') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Data
                                                            Nami
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Nami</span>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ ucwords(strtolower(Auth::user()->name)) }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn app-btn-primary w-100">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data">{{ Auth::user()->email }}</div>
                                    </div><!--//col-->
                                    <!-- Tombol Edit -->
                                    <div class="col text-end">
                                        <button type="button" class="btn-sm app-btn-secondary"
                                            data-bs-toggle="modal" data-bs-target="#editModalEmail">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="editModalEmail" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('settings') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                            Email
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Email</span>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ Auth::user()->email }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn app-btn-primary w-100">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Tanggal Lahir</strong></div>
                                        <div class="item-data">
                                            {{ Auth::user()->ttl }}
                                        </div>
                                    </div><!--//col-->
                                    <!-- Tombol Edit -->
                                    <div class="col text-end">
                                        <button type="button" class="btn-sm app-btn-secondary"
                                            data-bs-toggle="modal" data-bs-target="#editModalTtl">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="editModalTtl" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('settings') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Data
                                                            Ttl
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">TTL</span>
                                                            <input type="date" name="name" class="form-control"
                                                                value="{{ Auth::user()->ttl }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn app-btn-primary w-100">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Alamat</strong></div>
                                        <div class="item-data">
                                            {{ Auth::user()->alamat }}
                                        </div>
                                    </div><!--//col-->
                                    <!-- Tombol Edit -->
                                    <div class="col text-end">
                                        <button type="button" class="btn-sm app-btn-secondary"
                                            data-bs-toggle="modal" data-bs-target="#editModalAlamat">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="editModalAlamat" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('settings') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                            Alamat
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Alamat</span>
                                                            <input type="text" name="alamat" class="form-control"
                                                                value="{{ Auth::user()->alamat }}" required>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn app-btn-primary w-100">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Ganti Nama Toko</strong></div>
                                        <div class="item-data">
                                            {{ Auth::user()->nama_toko }}
                                        </div>
                                    </div><!--//col-->
                                    <!-- Tombol Edit -->
                                    <div class="col text-end">
                                        <button type="button" class="btn-sm app-btn-secondary"
                                            data-bs-toggle="modal" data-bs-target="#editModalNamaToko">
                                            Edit
                                        </button>
                                    </div>
                                    <div class="modal fade" id="editModalNamaToko" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('settings') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit
                                                            Nama Toko
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">Nama Toko</span>
                                                            <input type="text" name="nama_toko"
                                                                class="form-control"
                                                                value="{{ Auth::user()->nama_toko }}" required>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn app-btn-primary w-100">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!--//row-->
                            </div><!--//item-->
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                                        </svg>
                                    </div><!--//icon-holder-->

                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Preferences</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Language </strong></div>
                                        <div class="item-data">English</div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Time Zone</strong></div>
                                        <div class="item-data">Central Standard Time (UTC-6)</div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Currency</strong></div>
                                        <div class="item-data">$(US Dollars)</div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email Subscription</strong></div>
                                        <div class="item-data">Off</div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>SMS Notifications</strong></div>
                                        <div class="item-data">On</div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Manage Preferences</a>
                        </div><!--//app-card-footer-->

                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-shield-check" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z" />
                                            <path fill-rule="evenodd"
                                                d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </div><!--//icon-holder-->

                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Security</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Password</strong></div>
                                        <div class="item-data">••••••••</div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Change</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Two-Factor Authentication</strong></div>
                                        <div class="item-data">You haven't set up two-factor authentication. </div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="#">Set up</a>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                        </div><!--//app-card-body-->

                        <div class="app-card-footer p-4 mt-auto">
                            <a class="btn app-btn-secondary" href="#">Manage Security</a>
                        </div><!--//app-card-footer-->

                    </div><!--//app-card-->
                </div>
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                            class="bi bi-credit-card" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                                            <path
                                                d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                                        </svg>
                                    </div><!--//icon-holder-->

                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Metode Pembayaran</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">

                            {{-- motede pembayaran --}}

                        </div><!--//app-card-body-->
                        <div class="app-card-footer p-4 mt-auto">
                            <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fa-solid fa-money-bill"></i>
                                Tambah Metode Pembayaran
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Metode
                                                Pembayaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('settings') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <!-- Input Nama -->
                                                <div class="input-group mb-3">
                                                    <button class="input-group-text dropdown-toggle" id="basic-addon1"
                                                        type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Pilih
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#"
                                                                id="qrisOptions">QRIS</a></li>
                                                        <li><a class="dropdown-item" href="#"
                                                                id="cashOption">CASH</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#"
                                                                id="transfer">TRANSFER</a></li>
                                                    </ul>
                                                    <input hidden type="text" id="namePembayaran"
                                                        name="namePembayaran">
                                                    <input disabled type="text" id="pilihanPembayaran"
                                                        name="pilihanPembayaran" class="form-control"
                                                        placeholder="Pilih Metode Pembayaran"
                                                        aria-label="Pilih Metode Pembayaran"
                                                        aria-describedby="basic-addon1" required oninput="angka(this)">
                                                        <input disabled  type="text" id="namaPemilik" name="namaPemilik"
                                                        class="form-control" placeholder="Nama Pemilik "
                                                        aria-label="Nama Pemilik" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn app-btn-secondary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- akhir modal tambah metode --}}
                        </div><!--//app-card-footer-->
                    </div><!--//app-card-->
                </div>
            </div><!--//row-->

        </div><!--//container-fluid-->
    </div><!--//app-content-->

</x-layout>
