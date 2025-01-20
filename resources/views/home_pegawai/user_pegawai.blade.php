<!-- Menampilkan nama pegawai yang sedang login -->
<h1>Selamat datang, {{ $pegawai->nama }}</h1>
<!-- Form untuk tombol logout -->
<form action="{{ route('logout_pegawai') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
