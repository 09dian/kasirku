<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1>Selamat datang, {{ $pegawai->nama }}</h1>
    <h2>Selamat datang, {{ $pegawai->nama_toko }}</h2>

    <form action="{{ route('logout_pegawai') }}" method="get">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h1>Pesan</h1>

    <!-- Tabel Pesan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pesan</th>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Pesan</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>
                        @if($message->sender_type == 'user')
                            {{ $message->sender->name }} <!-- Ganti dengan nama pengirim -->
                        @else
                            {{ $message->sender->nama }} <!-- Ganti dengan nama pegawai -->
                        @endif
                    </td>
                    <td>
                        @if($message->receiver_type == 'user')
                            {{ $message->receiver->name }} <!-- Ganti dengan nama penerima -->
                        @else
                            {{ $message->receiver->nama }} <!-- Ganti dengan nama pegawai -->
                        @endif
                    </td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
