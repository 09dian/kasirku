<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1>Selamat datang, {{ $pegawai->nama }}</h1>
    <h2>Nama Toko: {{ $pegawai->nama_toko }}</h2>

    <form action="{{ route('logout_pegawai') }}" method="get">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>Pesan</h1>

    @foreach ($messages as $message)
        <div class="message">
            <p><strong>From:</strong> {{ $message->sender_id }} ({{ $message->sender_type }})</p>
            <p><strong>Message:</strong> {{ $message->message }}</p>
            <p><small>{{ $message->created_at }}</small></p>
        </div>
    @endforeach




</x-layout>
