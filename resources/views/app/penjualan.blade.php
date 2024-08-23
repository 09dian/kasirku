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
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <form class="table-search-form row gx-1 align-items-center">
                                <div class="col-auto">
                                    <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search" onkeyup="searchTable()">
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn app-btn-secondary" onclick="searchTable()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                      </svg>  Search</button>
                                </div>
                            </form>
                            
                        </div><!--//col-->
                        <div class="col-auto">						    
                            <a class="btn app-btn-secondary" id="download-excel" href="#">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                </svg>
                                Download Excel
                            </a>
                        </div>
                        
                        
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->
        <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
            <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" href="#" data-status="All">All</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" href="#" data-status="Paid">Paid</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" href="#" data-status="Pending">Pending</a>
            <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" href="#" data-status="Cancelled">Cancelled</a>
        </nav>
      
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
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
                <th class="cell">Product</th>
                <th class="cell">Customer</th>
                <th class="cell">Date</th>
                <th class="cell">Status</th>
                <th class="cell">Jumlah</th>
                <th class="cell">Total</th>
                <th class="cell">Action</th>
            </tr>
        </thead>
        <tbody id="order-table-body">
            <tr>
                <td class="cell text-center">1</td>
                <td class="cell">#15342</td>
                <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                <td class="cell">Reina Brooks</td>
                <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
                <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                <td class="cell text-center">1</td>
                <td class="cell">$59.00</td>
                <td class="cell">
                    <a class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg> View
                    </a>
                </td>
                
            </tr>
            <tr>
                <td class="cell text-center">2</td>
                <td class="cell">#15343</td>
                <td class="cell"><span class="truncate">Alex</span></td>
                <td class="cell">dede Brooks</td>
                <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
                <td class="cell"><span class="badge bg-success">Paid</span></td>
                <td class="cell text-center">1</td>
                <td class="cell">$59.00</td>
                <td class="cell">
                    <a class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg> View
                    </a>
                </td>
                
            </tr>
            <tr>
                <td class="cell text-center">3</td>
                <td class="cell">#15344</td>
                <td class="cell"><span class="truncate">Alex</span></td>
                <td class="cell">dede Brooks</td>
                <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
                <td class="cell"><span class="badge bg-warning">Pending</span></td>
                <td class="cell text-center">1</td>
                <td class="cell">$59.00</td>
                <td class="cell">
                    <a class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg> View
                    </a>
                </td>
                
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

                        </div><!--//table-responsive-->
                       
                    </div><!--//app-card-body-->		
                </div><!--//app-card-->
             <!-- Pagination -->
<nav class="app-pagination">
    <ul class="pagination justify-content-center" id="pagination">
        <!-- Items Pagination akan diisi melalui JavaScript -->
    </ul>
</nav>                
            </div><!--//tab-pane-->            
        </div><!--//tab-content-->
        
        
        
    </div><!--//container-fluid-->
</div><!--//app-content-->

{{-- modal --}}

<!-- Button trigger modal -->
  
  <!-- First Modal -->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Data Orders</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table app-table-hover mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Order</th>
                  <th class="cell">Product</th>
                  <th class="cell">Customer</th>
                  <th class="cell">Date</th>
                  <th class="cell">Time</th>
                  <th class="cell">Status</th>
                  <th class="cell">Total</th>
                </tr>
              </thead>
              <tbody id="order-table-body">
                <tr>
                  <td class="cell">#15342</td>
                  <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                  <td class="cell">Reina Brooks</td>
                  <td class="cell"><span class="cell-data">12 Oct</span></td>
                  <td class="cell"><span class="note">04:23 PM</span></td>
                  <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                  <td class="cell">$59.00</td>
                </tr>
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      <!-- Modal Footer -->
<div class="modal-footer">
    <button type="button" class="btn btn-danger" style="color: white;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
      </svg>
      Delete
    </button>
    <button type="button" class="btn btn-secondary" style="color: white;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
      </svg>
      Edit
    </button>
  </div>
  
      </div>
    </div>
  </div>
  
  
{{-- akhir --}}
</x-layout>