<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $title }}</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="KASIRKU">
        <meta name="author" content="RACIKCODE">
        <link rel="shortcut icon" href="favicon.ico">

        <!-- FontAwesome JS-->
        <script defer="defer" src="assets/plugins/fontawesome/js/all.min.js"></script>

        <!-- App CSS -->
        <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
        <link id="theme-style" rel="stylesheet" href="assets/css/kasirku.css">

    </head>

    <body class="app">
        <x-navbar></x-navbar>
        <div class="app-wrapper">
            {{ $slot }}
            <footer class="app-footer">
                <div class="container text-center py-3">
                    <!--/* This template is free as long as you keep the footer attribution link. If
                    you'd like to use the template without the attribution link, you can buy the
                    commercial license via our website: themes.3rdwavemedia.com Thank you for your
                    support. :) */-->
                    <small class="copyright">Designed with
                        <span class="sr-only">love</span>
                        <i class="fas fa-heart" style="color: #fb866a;"></i>
                        by Racikcode KASIRKU v.0.1
                        <?= date("Y"); ?></small>

                </div>
            </footer>
            <!--//app-footer-->

        </div>
        <!--//app-wrapper-->

        <!-- Javascript -->
        <script src="assets/plugins/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Charts JS -->
        <script src="assets/plugins/chart.js/chart.min.js"></script>
        <script src="assets/js/index-charts.js"></script>

        <!-- Page Specific JS -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/kasirku.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    </body>
</html>