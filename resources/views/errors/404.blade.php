<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f4f4f4;
        }

        h1 {
            font-size: 50px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>404</h1>
    <p>Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ url('/') }}">Kembali ke Beranda</a>
</body>

</html>
