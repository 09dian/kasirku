<x-layout :totalMessage="$messages">
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Kategori</h1>

                </div>
            </div><!--//row-->
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <form action="{{ route('tambah_kategori') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Nama</span>
                            <input name="nama_kategori" type="text" class="form-control" placeholder="Nama barang"
                                aria-label="Nama barang" aria-describedby="addon-wrapping">
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Deskripsi</span>
                            <input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi barang"
                                aria-label="Nama barang" aria-describedby="addon-wrapping">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
