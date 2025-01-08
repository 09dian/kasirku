<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar <?= date('Y') ?></title>

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
                    <h2 class="auth-heading text-center mb-5">Daftar Kasirku</h2>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="email mb-3">
                                <input id="signup-name" name="name" value="{{ old('name') }}" type="text"
                                    class="form-control signup-name" placeholder="Nami Panjang" required="required">
                            </div>
                            <div class="email mb-3">
                                <input id="signin-email" name="email" value="{{ old('email') }}" type="email"
                                    class="form-control signin-email" placeholder="Email address" required="required">
                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <input id="signup-password" name="password" type="password"
                                    class="form-control signup-password" placeholder="Dambel Sandi" required="required">
                            </div>

                            <div class="password mb-3">
                                <input id="signup-password" name="password_confirmation" type="password"
                                    class="form-control signup-password" placeholder="Ulang Sandi" required="required">
                            </div>
                            <!-- Menampilkan Pesan Error untuk Password -->
                            @if ($errors->has('password'))
                                <div class="alert alert-danger text-center" role="alert">
                                    Kata sandi teu sami atau lepat
                                </div>
                            @endif
                            <div class="text-center">
                                <button type="submit"
                                    class="btn app-btn-primary w-100 theme-btn mx-auto">Daftar</button>
                            </div>
                        </form>
                        <div class="auth-option text-center pt-3">
                            Atos gaduh akun? login <a class="text-link" href="{{ route('login') }}">Ayeuna</a>.
                        </div>
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->

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
