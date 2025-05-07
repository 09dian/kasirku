<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Produk Saya</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <form class="docs-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" class="form-control search-docs" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Produk List -->
                <div class="col-lg-8">
                    <div class="row row-cols-2 row-cols-md-3 g-3">
                        @foreach ($produks as $key => $produk)
                            @if ($produk->status == 1)
                                <div class="col">
                                    <div class="card add-to-cart" style="cursor: pointer"
                                        data-nama="{{ $produk->nama_produk }}" data-harga="{{ $produk->harga_produk }}"
                                        data-img="{{ asset('storage/' . $produk->img_produk) }}">
                                        <img src="{{ asset('storage/' . $produk->img_produk) }}" class="card-img-top"
                                            alt="{{ $produk->nama_produk }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                            <p class="card-text">Rp. {{ $produk->harga_produk }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Keranjang Belanja -->
                <div class="col-lg-4">
                    <div class="card p-3">
                        <h5 class="invoice-id">Invoice ID: <span id="invoice-id"></span></h5>
                        <ul class="list-group mb-3" id="keranjang-list">
                            {{-- List belanja akan tampil di sini --}}
                        </ul>
                        <div class="d-flex justify-content-between">
                            <strong>Total:</strong>
                            <span id="total-harga">Rp. 0</span>
                        </div>
                        <button class="btn btn-primary mt-3 w-100" id="checkout-button" style="color: white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                          </svg> Checkout</button>
                    </div>
                </div>

            </div>
        </div>
        
</x-layout>
