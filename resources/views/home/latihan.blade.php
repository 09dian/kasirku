@foreach ($grouped as $pegawai => $messages)
    @php
        $latest = $messages->last();
    @endphp

    <h3>Pesan dengan {{ ucfirst(e($pegawai)) }}</h3>
    <ul>
        <li>
            <strong>{{ e($latest->sender_type) }}:</strong> {{ e($latest->message) }}
            <br>
            <small>{{ $latest->created_at->format('d M Y H:i') }}</small>
        </li>
    </ul>
    <p><strong>Total pesan:</strong> {{ $messages->count() }}</p>
    <hr>
@endforeach





@foreach ($grouped as $pegawai => $messages)
    @php
        $latest = $messages->last();
    @endphp
    <div class="item p-3">
        <div class="row gx-2 justify-content-between align-items-center">
            <div class="col-auto">
                <img class="profile-image rounded-circle" src="{{ asset('assets/images/profiles/profile-2.png') }}"
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
        <a class="link-mask" href="{{ route('notifikasi', ['receiver_id' => $item->receiver_id]) }}"></a>
    </div><!--//item-->
@endforeach
