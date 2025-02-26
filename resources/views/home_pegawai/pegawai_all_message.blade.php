@extends('layouts.app')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Pesan dari Dian
            </h1>
        </div>

        <div class="row justify-content-center">
            <!-- Chat Messages Container -->
            <div class="messages bg-white p-3 border rounded overflow-auto" style="height: 400px; border: 1px solid #ddd;">
                @foreach ($all_pesan as $message)
                    @if ($message->sender_id == $pegawai->id && $message->sender_type == $pegawai->nama)
                        <div class="d-flex justify-content-end align-items-center mb-1">
                            <div class="bg-primary text-white p-2 rounded border border-3 border-dark">
                                <p class="mb-0">{{ $message->message }}</p>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-light border-0 p-0 ms-2" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 15 15">
                                        <path
                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('delete', ['id' => $message->id, 'receiver_id' => $message->receiver_id]) }}"
                                            class="dropdown-item">Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <!-- Pesan yang diterima -->
                        <div class="d-flex justify-content-start mb-3">
                            <div class="bg-light p-2 rounded border border-3 border-dark">
                                <p class="mb-0">{{ $message->message }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Message Input Form -->

            <form id="chatForm" action="{{ route('message',['id' => $re->id]) }}" method="POST" class="d-flex mt-3">
                @csrf

                <input type="hidden" id="receiver_type" name="receiver_type" value="{{ $re->name }}">
                <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $re->id }}">
                <input type="text" class="form-control border border-3 border-dark" placeholder="Balas" id="messageInput"
                    name="message" required>
                <button type="submit" class="btn app-btn-primary theme-btn mx-auto ms-2">Kirim</button>
            </form>






        </div>
    </div>
@endsection
