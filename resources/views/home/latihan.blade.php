<div class="card">
    <div class="card-header">
        <h5>Pesan yang Dikirim oleh</h5>
    </div>
    <div class="card-body">
        @if($messages->isEmpty())
            <p>Tidak ada pesan yang ditemukan.</p>
        @else
            <ul class="list-group">
                @foreach($messages as $message)
                    <li class="list-group-item">
                        <strong>Dari:</strong> {{ $message->sender_type }} <br>
                        <strong>Ke:</strong> {{ $message->receiver_type }} <br>
                        <strong>Pesan:</strong> {{ $message->message }} <br>
                        <small class="text-muted">Dikirim pada: {{ \Carbon\Carbon::parse($message->created_at)->format('d M Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
