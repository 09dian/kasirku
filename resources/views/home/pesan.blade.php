<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Pesan dari {{ ucwords(strtolower(Auth::user()->name)) }}</h1>
        </div>

        <div class="row justify-content-center">
            <!-- Chat Messages Container -->
            <div class="messages"
                style="height: 400px; overflow-y: scroll; border: 1px solid #ddd; padding: 15px; border-radius: 8px;">
                <!-- Dian's message (Left)pengirim pesan-->
                <div class="d-flex justify-content-start mb-3">
                    <div class="bg-light p-2 rounded border border-3 border-dark">
                        <p class="mb-0">Hello</p>
                    </div>
                </div>
                <!-- Response (Right) utuk tampilanpembalas pesan-->
                <div class="d-flex justify-content-end mb-3">
                    <div class="bg-primary app-btn-primar theme-btn text-dark p-2 rounded border border-3 border-dark">
                        <p class="mb-0">Hay</p>
                    </div>
                </div>
            </div>

            <!-- Message Input Form -->
            <form id="chatForm" action="{{ route('messages') }}" method="POST" class="d-flex mt-3">
                @csrf
                <input type="text" class="form-control border border-3 border-dark" placeholder="Balas"
                    id="messageInput" name="message" required>
                <button type="submit" class="btn app-btn-primary theme-btn mx-auto ms-2">Kirim</button>
            </form>
        </div>
    </div>
</x-layout>
