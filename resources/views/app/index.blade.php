<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Ringkasan Toko</h1>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-sm font-medium leading-6" for="start-date">Tanggal Mulai</label>
                            <input
                                type="date"
                                id="start-date"
                                class="mt-2 form-control"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                onchange="updateEndDateMin()"
                                max=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-sm font-medium leading-6" for="end-date">Tanggal Akhir</label>
                                <input
                                    type="date"
                                    id="end-date"
                                    class="mt-2 form-control"
                                    aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default"
                                    min=""
                                    onchange="validateDate()"
                                    max=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir validasi tanggal -->
                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Barang</h4>
                                <div class="stats-figure">{{ $total_barang }}</div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->

                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Order</h4>
                                <div class="stats-figure">{{ $total_order }}</div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Penghasilan</h4>
                                <div class="stats-figure">Rp.{{ $penghasilan }}</div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Pengeluaran</h4>
                                <div class="stats-figure">Rp. {{ $pengeluaran }}</div>
                            </div>
                            <!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->
            </x-layout>