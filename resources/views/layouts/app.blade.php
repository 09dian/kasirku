<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            <div class="container-fluid py-2">
                <div class="app-header-content">
                    <div class="row justify-content-between align-items-center">

                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" role="img">
                                    <title>Menu</title>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                        stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                </svg>
                            </a>
                        </div><!--//col-->
                        <div class="app-utilities col-auto">
                            {{-- notifikasi --}}
                            <div class="app-utility-item app-notifications-dropdown dropdown">
                                <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
                                    data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
                                    title="Notifications">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                        <path fill-rule="evenodd"
                                            d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                    </svg>
                                    <span class="badge text-bg-danger text-white position-relative"
                                        style="top: -10px; right: 5px;">{{ count($messages) }}</span>
                                    {{-- banyak pesan --}}

                                </a><!--//dropdown-toggle-->

                                <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                    <div class="dropdown-menu-header p-3">
                                        <h5 class="dropdown-menu-title mb-0">Notifikasi Toko
                                            {{ ucwords(strtolower(Auth::user()->nama_toko)) }}</h5>
                                    </div><!--//dropdown-menu-title-->

                                   <div class="dropdown-menu-content">
                                        @if ($messages->isNotEmpty())
                                            @foreach ($messages as $item)
                                                <div class="item p-3">
                                                    <div class="row gx-2 justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <img class="profile-image rounded-circle"
                                                                src="{{ asset('assets/images/profiles/profile-2.png') }}"
                                                                alt="Profile">
                                                        </div><!--//col-->
                                                        <div class="col">
                                                            <div class="info">
                                                                <div class="desc"><b>{{ $item->sender_type }}</b>
                                                                </div>
                                                                <label for="Pesan">{{ $item->message }}</label>
                                                                <div class="meta">
                                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                                </div>
                                                            </div>
                                                        </div><!--//col-->
                                                    </div><!--//row-->
                                                    <a class="link-mask"
                                                        href="{{ route('pegawai_notifikasi', ['receiver_id' => $item->receiver_id]) }}"></a>
                                                </div><!--//item-->
                                            @endforeach
                                        @else
                                            <div class="p-3 text-center">Tidak ada pesan baru</div>
                                        @endif
                                    </div><!--//dropdown-menu-content--> 

                                </div><!--//dropdown-menu-->
                            </div>
                            {{-- notifikasi --}}
                            {{-- fhoto profile --}}
                            <div class="app-utility-item app-user-dropdown dropdown">
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                    href="#" role="button" aria-expanded="false"><img class="rounded-circle"
                                        src="{{ Auth::user()->gambar ? (str_starts_with(Auth::user()->gambar, 'profile_images/') ? asset('storage/' . Auth::user()->gambar) : asset('assets/images/' . Auth::user()->gambar)) : asset('assets/images/default.jpg') }}"
                                        alt="user profile"></a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li><a class="dropdown-item" href="{{ route('logout_pegawai') }}">Kaluar</a></li>
                                </ul>
                            </div><!--//app-user-dropdown-->
                            {{-- alhir fhoto profile --}}
                        </div><!--//app-utilities-->
                    </div><!--//row-->
                </div><!--//app-header-content-->
            </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
            <div class="sidepanel-inner d-flex flex-column">
                <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                <div class="app-branding">
                    <a class="app-logo" href="{{ route('home_pegawai') }}"><img class="logo-icon me-2"
                            src="{{ asset('assets/images/app-logo.svg') }}" alt="logo"><span
                            class="logo-text">KASIRKU</span></a>

                </div><!--//app-branding-->
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'Home Pegawai' ? 'active' : '' }}"
                                href="{{ route('home_pegawai') }}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Home</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'Produk' ? 'active' : '' }} "
                                href="{{ route('produk') }}">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                                        <path
                                            d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Produk</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'Pos' ? 'active' : '' }} " href="{{ route('pos') }}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
                                        <path fill-rule="evenodd"
                                            d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">POS</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->                      
                    </ul><!--//app-menu-->


            </div><!--//sidepanel-inner-->
        </div><!--//app-sidepanel-->
    </header><!--//app-header-->


    <div class="app-wrapper">

        @yield('content')

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">{{ date('Y') }} Di Disain Penuh <span class="sr-only">love</span><i
                        class="fas fa-heart" style="color: #ec2f00;"></i> 🇮🇩 Oleh <a class="app-link"
                        href="https://github.com/09dian" target="_blank">Dian Mustofa</a> KASIRKU V.0.0.1</small>

            </div>
        </footer><!--//app-footer-->

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('assets/js/kasirku.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
