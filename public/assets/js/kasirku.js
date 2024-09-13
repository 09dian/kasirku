
    document.addEventListener('DOMContentLoaded', function () {
        // Skrip pertama: Update slug berdasarkan kategori
        const categoryInput = document.getElementById('category');
        const slugInput = document.getElementById('slug');

        if (categoryInput && slugInput) {
            categoryInput.addEventListener('input', function () {
                const categoryValue = categoryInput.value;
                const slugValue = categoryValue
                    .toLowerCase() // Ubah ke huruf kecil
                    .replace(/ /g, '-') // Ganti spasi dengan dash
                    .replace(/[^\w-]+/g, ''); // Hapus karakter non-alfanumerik kecuali dash

                slugInput.value = slugValue;
            });
        } else {
            console.error('Elemen dengan ID "category" atau "slug" tidak ditemukan.');
        }

        // Skrip kedua: Format nama lengkap dan tampilkan inisial atau gambar profil
        const fullNameElement = document.getElementById('fullName');
        if (fullNameElement) {
            let fullName = fullNameElement.textContent;
            fullName = fullName.split('')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()).join('');

            fullNameElement.textContent = fullName;
            const initials = fullName.charAt(0).toUpperCase();
            const profileImageSrc = '';
            const UserDropdwn = document.getElementById('user-dropdown-toggle');

            if (profileImageSrc.trim() === '') {
                const initialsDiv = document.createElement('div');
                initialsDiv.className = 'profile-initials';
                initialsDiv.textContent = initials;
                UserDropdwn.insertBefore(initialsDiv, UserDropdwn.firstChild);
            } else {
                const imgElement = document.createElement('img');
                imgElement.id = 'profileImage';
                imgElement.src = profileImageSrc;
                imgElement.alt = 'user profile';
                imgElement.style.width = '3rem';
                imgElement.style.height = '3rem';
                imgElement.style.borderRadius = '50%';
                imgElement.style.objectFit = 'cover';
                UserDropdwn.insertBefore(imgElement, UserDropdwn.firstChild);
            }
        }

        // Skrip ketiga: Validasi tanggal
        const today = new Date().toISOString().split('T')[0];
        const startDate = document.getElementById('start-date');
        const endDate = document.getElementById('end-date');

        if (startDate && endDate) {
            startDate.max = today;
            endDate.max = today;

            startDate.addEventListener('change', () => {
                endDate.min = startDate.value;
            });

            endDate.addEventListener('change', () => {
                if (endDate.value < startDate.value) {
                    alert('Tanggal Akhir tidak boleh sebelum Tanggal Mulai');
                    endDate.value = '';
                }
            });
        }

        // Skrip keempat: Pagination dan pencarian
     // Deklarasi variabel bersama di luar semua fungsi
    const rowsPerPage = 10;
    let currentPage = 1;
    let filteredRows = [];
    let currentStatus = 'All';

    function displayTableData() {
        const tbody = document.getElementById('order-table-body');
        const rows = tbody.querySelectorAll('tr');

        const statusFilteredRows = Array.from(rows).filter(row => {
            const status = row.querySelector('td:nth-child(6) .badge').textContent.trim();
            return currentStatus === 'All' || status === currentStatus;
        });

        const rowsToDisplay = filteredRows.length ? filteredRows.filter(row => statusFilteredRows.includes(row)) : statusFilteredRows;
        const totalPages = Math.ceil(rowsToDisplay.length / rowsPerPage);

        rows.forEach(row => row.style.display = 'none');
        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, rowsToDisplay.length);
        for (let i = startIndex; i < endIndex; i++) {
            rowsToDisplay[i].style.display = '';
        }

        updatePagination(totalPages);
    }

    function searchTable() {
        const input = document.getElementById('search-orders').value.toLowerCase();
        const rows = document.querySelectorAll('#order-table-body tr');
        filteredRows = Array.from(rows).filter(row => {
            return row.innerText.toLowerCase().includes(input);
        });
        currentPage = 1;
        displayTableData();
    }

    function filterByStatus(status) {
        currentStatus = status;
        currentPage = 1;
        searchTable();
    }

    function updatePagination(totalPages) {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        pagination.innerHTML += `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">Previous</a>
            </li>
        `;

        for (let i = 1; i <= totalPages; i++) {
            pagination.innerHTML += `
                <li class="page-item ${currentPage === i ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                </li>
            `;
        }

        pagination.innerHTML += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">Next</a>
            </li>
        `;
    }

    function changePage(page) {
        const rows = filteredRows.length ? filteredRows : document.querySelectorAll('#order-table-body tr');
        const totalPages = Math.ceil(rows.length / rowsPerPage);

        if (page < 1 || page > totalPages) return;
        currentPage = page;
        displayTableData();
    }

    // Event Listener untuk pencarian
    document.getElementById('search-orders').addEventListener('input', searchTable);

    // Inisialisasi tampilan data tabel
    displayTableData();

        // Skrip kelima: Tab untuk tabel
        const tabs = document.querySelectorAll('#orders-table-tab a');
        const tableRows = document.querySelectorAll('#order-table-body tr');

        tabs.forEach(tab => {
            tab.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah aksi default
                
                // Mendapatkan status yang dipilih dari tab
                const status = this.textContent.trim();
                
                tableRows.forEach(row => {
                    const badge = row.querySelector('.badge');
                    if (status === 'All') {
                        row.style.display = ''; // Menampilkan semua baris
                    } else if (badge && badge.textContent.trim() === status) {
                        row.style.display = ''; // Menampilkan baris yang cocok
                    } else {
                        row.style.display = 'none'; // Menyembunyikan baris yang tidak cocok
                    }
                });
                
                // Memperbarui kelas aktif pada tab
                tabs.forEach(tab => tab.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Skrip keenam: Download Excel
        document.getElementById('download-excel').addEventListener('click', function () {
            var table = document.getElementById('order-table-body'); // Ambil tabel body
            var rows = table.querySelectorAll('tr'); // Ambil semua baris

            // Buat array untuk menampung data tabel
            var data = [];
            data.push(["Order", "Produk", "pembeli", "Waktu", "Status", "Jumlah", "Total"]); // Header

            // Loop melalui baris dan ambil data sel
            rows.forEach(function (row) {
                var cells = row.querySelectorAll('td'); // Ambil semua kolom
                var rowData = [];
                rowData.push(cells[1].innerText); // Order
                rowData.push(cells[2].innerText); // Product
                rowData.push(cells[3].innerText); // Customer

                // Gabungkan Date dan Time
                var dateTime = cells[4].querySelector('.cell-data').innerText + ' ' + cells[4].querySelector('.note').innerText;
                rowData.push(dateTime); // Date Time

                rowData.push(cells[5].innerText); // Status
                rowData.push(cells[6].innerText); // Jumlah
                rowData.push(cells[7].innerText); // Total
                data.push(rowData); // Tambahkan ke array data
            });

            // Konversi ke worksheet dan buat workbook
            var ws = XLSX.utils.aoa_to_sheet(data);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Orders");

            // Download file Excel
            XLSX.writeFile(wb, "Data Penjualan.xlsx");
        });

    });

    document.getElementById('inputGroupFile02').addEventListener('change', function (event) {
        const [file] = event.target.files; // Ambil file dari input
        if (file) {
            const previewImage = document.getElementById('preview-image'); // Elemen gambar untuk pratinjau
            previewImage.src = URL.createObjectURL(file); // Update sumber gambar
        }
    });