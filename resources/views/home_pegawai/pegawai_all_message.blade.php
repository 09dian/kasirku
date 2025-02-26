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
                @foreach ($all_pesan as $item)
    
                @endforeach
            </div>

            <!-- Message Input Form -->

            <form id="chatForm" action="{{ route('balas_pesan', $messages->first()->receiver_id) }}" method="POST"
                class="d-flex mt-3">
                @csrf
                @if ($messages->isNotEmpty())
                    <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $messages->first()->sender_id }}">
                    <input type="hidden" id="nilai" name="nilai" value="{{ $messages->first()->receiver_id }}">
                    <input type="hidden" id="receiver_type" name="receiver_type"
                        value="{{ $messages->first()->sender_type }}">
                @else
                    <input type="hidden" id="receiver_id" name="receiver_id" value="">
                    <input type="hidden" id="receiver_type" name="receiver_type" value="">
                @endif
                <input type="text" class="form-control border border-3 border-dark" placeholder="Balas" id="messageInput"
                    name="message" required>
                <button type="submit" class="btn app-btn-primary theme-btn mx-auto ms-2">Kirim</button>
            </form>






        </div>
    </div>
@endsection
