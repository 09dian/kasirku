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
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('assets/images/nasipadang.jpg') }}" class="card-img-top"
                                    alt="Pizza">
                                <div class="card-body">
                                    <h5 class="card-title">Pizza</h5>
                                    <p class="card-text">Rp. 35.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('assets/images/nasipadang.jpg') }}" class="card-img-top"
                                    alt="Soto Lamongan">
                                <div class="card-body">
                                    <h5 class="card-title">Soto Lamongan</h5>
                                    <p class="card-text">Rp. 16.000</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('assets/images/nasipadang.jpg') }}" class="card-img-top"
                                    alt="Kuah Soto">
                                <div class="card-body">
                                    <h5 class="card-title">Kuah Soto</h5>
                                    <p class="card-text">Rp. 9.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Keranjang Belanja -->
                <div class="col-lg-4">
                    <div class="card p-3">
                        <h5>Invoice ID: 382324</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ asset('assets/images/nasipadang.jpg') }}" style="width: 60px; height: 60px;" alt="Kuah Soto">
                                <span class="flex-grow-1 mx-2">Kuah Soto</span>
                                <button class="btn btn-warning btn-sm">-</button>
                                <span class="badge bg-primary mx-2">1</span>
                                <button class="btn btn-success btn-sm">+</button>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ asset('assets/images/nasipadang.jpg') }}" style="width: 60px; height: 60px;" alt="Kentang Goreng">
                                <span class="flex-grow-1 mx-2">Kentang Goreng</span>
                                <button class="btn btn-warning btn-sm">-</button>
                                <span class="badge bg-primary mx-2">3</span>
                                <button class="btn btn-success btn-sm">+</button>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ asset('assets/images/nasipadang.jpg') }}" style="width: 60px; height: 60px;" alt="Kopi Pandan">
                                <span class="flex-grow-1 mx-2">Kopi Pandan</span>
                                <button class="btn btn-warning btn-sm">-</button>
                                <span class="badge bg-primary mx-2">8</span>
                                <button class="btn btn-success btn-sm">+</button>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
</x-layout>
