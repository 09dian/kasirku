<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Selamat datang, {{ $pegawai->nama }}</h1>
    <p>Nomor Pegawai: {{ $pegawai->no_pegawai }}</p>
    <p>Terakhir Login: {{ $pegawai->terakhir_login }}</p>
    <form action="{{ route('logout_pegawai') }}" method="get">
        @csrf
        <button type="submit">Logout</button>
    </form>
</x-layout>
