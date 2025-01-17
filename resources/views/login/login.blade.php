<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <!-- Meta -->
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
                    <h2 class="auth-heading text-center mb-5">Login Kasirku</h2>
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
                        <form class="auth-form login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="email mb-3">
                                <input id="signin-email" name="email" value="{{ old('name') }}" type="email"
                                    class="form-control signin-email" placeholder="Email address" required="required">
                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Sandi" required="required">

                            </div>
                            <div class="id_pegawai" id="id-pegawai-field" style="display: none;">
                                <input id="signin-id-pegawai" name="id_pegawai" type="text"
                                    class="form-control signin-id-pegawai" placeholder="Id Pegawai" required="required">
                            </div><!--//form-group-->
                            <!--//form-group-->
                            <div class="password mb-3 mt-3">
                                <select class="form-select" aria-label="Default select example" id="user-type">
                                    <option selected>Pilih</option>
                                    <option value="1">Pemilik</option>
                                    <option value="2">Pegawai</option>
                                </select>

                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="RememberPassword">
                                        </div>
                                    </div><!--//col-6-->
                                    <div class="col-6">
                                        <div class="forgot-password text-end">
                                            <a href="{{ route('forgot') }}">Hilap Sandi?</a>
                                        </div>
                                    </div><!--//col-6-->

                                </div><!--//extra-->
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
                                    In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">
                            Teu acan gaduh Akun? daftar <a class="text-link" href="{{ route('register') }}">Ayeuna</a>.
                        </div>
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->

                <script src="assets/js/kasirku.js"></script>

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                                style="color: #bd2d09;"></i> by <a class="app-link" href="#" target="_blank">Dian
                                Mustofa</a> Racikcode <?= date('Y') ?></small>

                    </div>
                </footer><!--//app-auth-footer-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
    </div><!--//row-->

</body>

</html>
