<x-layout :pMessage="$messages" :jumlahPesan="$jumlahPesan">
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
                        <button class="btn btn-primary w-100" id="checkout-button" disabled data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle" style="color: white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart-check" viewBox="0 0 16 16">
                                <path
                                    d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                            </svg> Checkout
                        </button>
                    </div>
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Pilih Metode pembayaran
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body metode-pembayaran">

                                    <button style="color: white" type="button"
                                        class="btn btn-success"data-bs-target="#exampleModalToggle2"
                                        data-bs-toggle="modal"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-qr-code-scan"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                            <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                            <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                            <path
                                                d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                            <path d="M12 9h2V8h-2z" />
                                        </svg> QRIS
                                    </button>

                                    <button style="color: white" type="button"
                                        class="btn btn-success"data-bs-target="#exampleModalToggle3"
                                        data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                            <path
                                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                                        </svg> Cash
                                    </button>

                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal QRIS -->
                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">QRIS</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    @foreach ($pembayaran as $item)
                                        @if ($item->codePembayaran == '1')
                                            <p><strong>{{ $item->namePembayaran }}</strong></p>
                                            <p>Nama Pemilik: {{ $item->namaPemilik }}</p>
                                            <img src="{{ asset('storage/' . $item->pilihanPembayaran) }}"
                                                alt="{{ $item->pilihanPembayaran }}" class="img-fluid">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                                        data-bs-toggle="modal">Kembali ke Pilihan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal CASH -->
                    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel3">CASH</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    @foreach ($pembayaran as $item)
                                        @if ($item->codePembayaran == '0')
                                            <p><strong>{{ $item->namePembayaran }}</strong></p>
                                            <p>Nama Pemilik: {{ $item->namaPemilik }}</p>
                                            <p>Keterangan: {{ $item->pilihanPembayaran }}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                                        data-bs-toggle="modal">Kembali ke Pilihan</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

</x-layout>
