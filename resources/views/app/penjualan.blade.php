<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Penjualan</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div
                            class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <!-- Form Pencarian -->
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="search-orders"
                                            name="searchorders"
                                            class="form-control search-orders"
                                            placeholder="Search"
                                            onkeyup="searchTable()"></div>
                                        <div class="col-auto">
                                            <button type="button" class="btn app-btn-secondary" onclick="searchTable()">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="16"
                                                    height="16"
                                                    fill="currentColor"
                                                    class="bi bi-search"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                                </svg>
                                                Search
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <a class="btn app-btn-secondary" id="download-excel" href="#">
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            class="bi bi-download me-1"
                                            fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                        Download Excel
                                    </a>
                                </div>

                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->
                <!-- Tabs untuk filter berdasarkan status -->
                <nav
                    id="orders-table-tab"
                    class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                    <a
                        class="flex-sm-fill text-sm-center nav-link active"
                        id="orders-all-tab"
                        href="#"
                        data-status="All"
                        onclick="filterByStatus('All')">Semua</a>
                    <a
                        class="flex-sm-fill text-sm-center nav-link"
                        id="orders-paid-tab"
                        href="#"
                        data-status="Paid"
                        onclick="filterByStatus('Tunai')">Tunai</a>
                    <a
                        class="flex-sm-fill text-sm-center nav-link"
                        id="orders-pending-tab"
                        href="#"
                        data-status="Pending"
                        onclick="filterByStatus('Ditunda')">Ditunda</a>
                    <a
                        class="flex-sm-fill text-sm-center nav-link"
                        id="orders-cancelled-tab"
                        href="#"
                        data-status="Cancelled"
                        onclick="filterByStatus('Dibatalkan')">Dibatalkan</a>
                </nav>
                <div class="tab-content" id="orders-table-tab-content">
                    <div
                        class="tab-pane fade show active"
                        id="orders-all"
                        role="tabpanel"
                        aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <!-- Tabel -->
                                    <!-- Table -->
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell text-center">No</th>
                                                <th class="cell">Order</th>
                                                <th class="cell">Produk</th>
                                                <th class="cell">Pembeli</th>
                                                <th class="cell">Waktu</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Jumlah</th>
                                                <th class="cell">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order-table-body">
                                            @foreach ($penjualan as $data)
                                            <tr>
                                                <td class="cell text-center">{{ $loop->iteration }}</td>
                                                <td class="cell">{{ $data->order }}</td>
                                                <td class="cell">{{ $data->product }}</td>
                                                <td class="cell">{{ $data->customer }}</td>
                                                <td class="cell">{{ $data->date }}</td>
                                                <td class="cell ">@if ($data->status ==1)
                                                    <span class="badge bg-warning">Ditunda</span>
                                                @endif
                                                @if ($data->status ==2)
                                                <span class="badge bg-success">Tunai</span>
                                            @endif
                                            @if ($data->status ==3)
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        @endif</td>
                                               
                                                <td class="cell text-center">{{ $data->jumlah }}</td>
                                                <td class="cell">Rp. {{ $data->total }}</td>
                                            </tr>
                                            @endforeach

                                            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                                        </tbody>
                                    </table>

                                </div>
                                <!--//table-responsive-->

                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                        <!-- Pagination -->
                        <nav class="app-pagination">
                            <ul class="pagination justify-content-center" id="pagination">
                                <!-- Items Pagination akan diisi melalui JavaScript -->
                            </ul>
                        </nav>
                    </div>
                    <!--//tab-pane-->
                </div>
                <!--//tab-content-->

            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        {{-- akhir --}}
    </x-layout>