<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Selamat datang, {{ $pegawai->nama }}</h1>
    <h2>Selamat datang, {{ $pegawai->nama_toko }}</h2>

    <form action="{{ route('logout_pegawai') }}" method="get">
        @csrf
        <button type="submit">Logout</button>
    </form>
</x-layout>
