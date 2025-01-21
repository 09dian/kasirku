<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="app-auth-branding mb-4">
                            <a class="app-logo" href="index.html">
                                <img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo">
                            </a>
                        </div>
                    </div>
                    <h2 class="auth-heading text-center mb-3">Login Kasirku</h2>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-danger text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="auth-form-container text-start">
                        <div class="mb-3">
                            <label for="role" class="form-label">Pilih Role</label>
                            <select id="role" class="form-select">
                                <option value="pemilik">Pemilik</option>
                                <option value="pegawai">Pegawai</option>
                            </select>
                        </div>

                        <!-- Form Login Pemilik -->
                        <form id="form-pemilik" class="auth-form login-form" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="email mb-3">
                                <input id="signin-email" name="email" value="{{ old('name') }}" type="email"
                                    class="form-control signin-email" placeholder="Email address" required="required">
                            </div>
                            <div class="password mb-3">
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Sandi" required="required">
                            </div>
                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="RememberPassword">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password text-end">
                                        <a href="{{ route('forgot') }}">Lupa Sandi?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                    In</button>
                            </div>
                        </form>
                        <!-- Form Login Pegawai -->
                        <form id="form-pegawai" class="auth-form login-form" method="POST"
                            action="{{ route('login_pegawai') }}" style="display: none;">
                            @csrf
                            <div class="id pegawai mb-3">
                                <input id="signin-pegawai" name="no_pegawai" type="text"
                                    class="form-control signin-password" placeholder="Id Pegawai" required="required">
                            </div>
                            <div class="password mb-3">
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Sandi" required="required">
                            </div>
                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="RememberPassword">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password text-end">
                                        <a href="{{ route('forgot') }}">Lupa Sandi?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-1">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                    In</button>
                            </div>
                        </form>
                        {{-- akhir login pegawai --}}
                        <div class="auth-option text-center pt-2">
                            Teu acan gaduh Akun? daftar <a class="text-link"
                                href="{{ route('register') }}">Ayeuna</a>.
                        </div>
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->

                <script src="assets/js/kasirku.js"></script>

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <small class="copyright">Designed with <span class="sr-only">love</span><i
                                class="fas fa-heart" style="color: #bd2d09;"></i> by <a class="app-link"
                                href="#" target="_blank">Dian
                                Mustofa</a> Racikcode <?= date('Y') ?></small>

                    </div>
                </footer><!--//app-auth-footer-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
    </div><!--//row-->

</body>

</html>
