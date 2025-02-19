<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Semua Pesan</h1>
                </div>
            </div>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">No</th>
                                            <th class="cell">Nama</th>
                                            <th class="cell">Pesan</th>
                                            <th class="cell">Date</th>
                                            <th class="cell"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $item)
                                            <tr>
                                                <td class="cell">{{ $loop->iteration }}</td>
                                                <td class="cell"><span
                                                        class="truncate">{{ $item->receiver_type }}</span></td>
                                                <td class="cell">{{ $item->message }}</td>
                                                <td class="cell"><span
                                                        class="note">{{ $item->created_at->format('H:i') }}</span>
                                                </td>
                                                <td class="cell"><a class="btn-sm app-btn-secondary"
                                                        href="#">Lihat</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->


                </div><!--//tab-pane-->


            </div><!--//tab-content-->

</x-layout>
