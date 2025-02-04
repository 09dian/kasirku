<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Tambah Barang</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a class="btn app-btn-secondary" href="{{ route('kategori') }}">
                                    Kategori
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            <div class="card">
                <form action="{{ route('tambah_produk') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Kategori</span>
                            <select id="role" class="form-select" name='kategori_produk'>
                                @foreach ($kategori as $item)
                                    @if ($item->nama_kategori)
                                        <option>{{ $item->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Nama</span>
                            <input name="nama_produk" type="text" class="form-control" placeholder="Nama barang"
                                aria-label="Nama barang" aria-describedby="addon-wrapping">
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Stok</span>
                            <input name="stok_produk" type="text" class="form-control" placeholder="Stok barang"
                                aria-label="Stok barang" aria-describedby="addon-wrapping">
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Harga</span>
                            <input name="harga_produk" type="text" class="form-control" placeholder="Harga"
                                aria-label="Harga" aria-describedby="addon-wrapping">
                        </div>
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="addon-wrapping">Gambar</span>
                            <input name="img_produk" type="file" class="form-control" placeholder="Gambar"
                                aria-label="Gambar" aria-describedby="addon-wrapping">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
