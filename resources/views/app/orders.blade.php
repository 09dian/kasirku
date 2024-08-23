

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Orders</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div
                            class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="docs-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input
                                            type="text"
                                            id="search-docs"
                                            name="searchdocs"
                                            class="form-control search-docs"
                                            placeholder="Search"></div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div>
                                <!--//col-->
                                <div class="col-auto">

                                    <select class="form-select w-auto">
                                        <option selected="" value="option-1">All</option>
                                        <option value="option-2">Makanan Ringan</option>
                                        <option value="option-3">Cemilan</option>

                                    </select>
                                </div>
                                <div class="col-auto">
                                    <a
                                        class="btn app-btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleModalToggle"
                                        href="#">
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            class="bi bi-upload me-2"
                                            fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path
                                                fill-rule="evenodd"
                                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>Upload</a>
                                    {{-- modal --}}

                                    <!-- Button trigger modal -->

                                    <!-- First Modal -->
                                    <div
                                        class="modal fade"
                                        id="exampleModalToggle"
                                        aria-hidden="true"
                                        aria-labelledby="exampleModalToggleLabel"
                                        tabindex="-1"
                                        data-bs-backdrop="static"
                                        data-bs-keyboard="false">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Upload Produk</h1>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <div class="mb-3">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Nama Produk"></div>
                                                            <div class="mb-3">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Harga"></div>
                                                                <div class="mb-3">
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="exampleFormControlInput1"
                                                                        placeholder="Stok"></div>
                                                                    <div class="mb-3">
                                                                        <label for="formFileSm" class="form-label">Gambar Produk</label>
                                                                        <input class="form-control form-control-sm" id="formFileSm" type="file"></div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal Footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success" style="color: white;">
                                                                        <svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="1em"
                                                                            height="1em"
                                                                            fill="currentColor"
                                                                            class="bi bi-floppy-fill"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
                                                                            <path
                                                                                d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
                                                                        </svg>
                                                                        Save
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- alhir modal --}}

                                                </div>
                                            </div>
                                            <!--//row-->
                                        </div>
                                        <!--//table-utilities-->
                                    </div>
                                    <!--//col-auto-->
                                </div>
                                <!--//row-->

                                <div class="row g-4">
                                    @foreach ($orders as $data)
                                        
                                    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                                        <div class="app-card app-card-doc shadow-sm h-100">
                                            <div class="app-card-thumb-holder p-3">
                                                <span class="icon-holder">
                                                    <i class="fas fa-file-alt text-file"></i>
                                                </span>
                                                <span class="badge bg-success">NEW</span>
                                                <a class="app-card-link-mask" href="#file-link"></a>
                                            </div>
                                            <div class="app-card-body p-3 has-card-actions">
            
                                                <h4 class="app-doc-title truncate mb-0">
                                                    <a href="#file-link">{{ $data['nama_produk'] }}</a>
                                                </h4>
                                                <div class="app-doc-meta">
                                                    <ul class="list-unstyled mb-0">
                                                        <li>
                                                            <span class="text-muted">Type:</span>
                                                            {{ $data['tipe']}}</li>
                                                        <li>
                                                            <span class="text-muted">harga:</span>
                                                            Rp.{{ $data['harga'] }}</li>
                                                            <li>
                                                                <span class="text-muted">Stok:</span>
                                                                {{ $data['stok'] }}</li>
                                                        <li>
                                                            <span class="text-muted">Uploaded:</span>
                                                            {{ $data['upload']}}</li>
                                                    </ul>
                                                </div>
                                                <!--//app-doc-meta-->
            
                                                <div class="app-card-actions">
                                                    <div class="dropdown">
                                                        <div
                                                            class="dropdown-toggle no-toggle-arrow"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <svg
                                                                width="1em"
                                                                height="1em"
                                                                viewbox="0 0 16 16"
                                                                class="bi bi-three-dots-vertical"
                                                                fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    fill-rule="evenodd"
                                                                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                            </svg>
                                                        </div>
                                                        <!--//dropdown-toggle-->
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg
                                                                        width="1em"
                                                                        height="1em"
                                                                        viewbox="0 0 16 16"
                                                                        class="bi bi-eye me-2"
                                                                        fill="currentColor"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                                    </svg>View</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg
                                                                        width="1em"
                                                                        height="1em"
                                                                        viewbox="0 0 16 16"
                                                                        class="bi bi-pencil me-2"
                                                                        fill="currentColor"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                                    </svg>Edit</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg
                                                                        width="1em"
                                                                        height="1em"
                                                                        viewbox="0 0 16 16"
                                                                        class="bi bi-download me-2"
                                                                        fill="currentColor"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                                    </svg>Download</a>
                                                            </li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item" href="#">
                                                                    <svg
                                                                        width="1em"
                                                                        height="1em"
                                                                        viewbox="0 0 16 16"
                                                                        class="bi bi-trash me-2"
                                                                        fill="currentColor"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                    </svg>Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!--//dropdown-->
                                                </div>
                                                <!--//app-card-actions-->
            
                                            </div>
                                            <!--//app-card-body-->
            
                                        </div>
                                        <!--//app-card-->
                                    </div>
                                    @endforeach
                                    
                                    
                                    
                                </div>

                                <!--//row-->
                                <nav class="app-pagination mt-5">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!--//app-pagination-->
                                
                            </div>

                            <!--//container-fluid-->

                        </div>
                        <!--//app-content-->

                    </x-layout>