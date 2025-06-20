// Ambil elemen foto
const imageUpload = document.getElementById('imageUpload');
const previewImage = document.getElementById('previewImage');

// Script mengubah gambar saat dipilih file
if (imageUpload && previewImage) {
    imageUpload.addEventListener('change', function(event) {
        const file = event.target.files[0]; // Ambil file yang diunggah
        if (file) {
            const reader = new FileReader(); // Membaca file secara lokal
            reader.onload = function(e) {
                previewImage.src = e.target.result; // Menampilkan gambar di previewImage
            };
            reader.readAsDataURL(file); // Membaca file sebagai URL
        }
    });
}

const selectRole = document.getElementById('role');
const formPemilik = document.getElementById('form-pemilik');
const formPegawai = document.getElementById('form-pegawai');

// Tampilkan form pemilik secara default
if (formPemilik && formPegawai) {
    formPemilik.style.display = 'block';
    formPegawai.style.display = 'none';

    // Event saat dropdown berubah
    selectRole.addEventListener('change', function() {
        if (this.value === 'pegawai') {
            formPemilik.style.display = 'none';
            formPegawai.style.display = 'block';
        } else {
            formPegawai.style.display = 'none';
            formPemilik.style.display = 'block';
        }
    });
}

function updateSwitch(checkbox) {
    // Jika checkbox dicentang, nilai checkbox menjadi 1 (Aktif)
    if (checkbox.checked) {
        checkbox.value = 1;
        document.getElementById('switchLabel').textContent = 'Aktif'; // Ubah label menjadi Aktif
    } else {
        // Jika checkbox tidak dicentang, nilai checkbox menjadi 0 (Tidak Aktif)
        checkbox.value = 0;
        document.getElementById('switchLabel').textContent = 'Tidak Aktif'; // Ubah label menjadi Tidak Aktif
    }
}

// Script untuk menampilkan produk di keranjang
const keranjangList = document.getElementById('keranjang-list');
const totalHargaElem = document.getElementById('total-harga');
const invoiceIdElem = document.getElementById('invoice-id');

const cart = {};
let invoiceId = "";

// Fungsi untuk membuat kode invoice: AA999070525
function generateInvoiceCode() {
    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const randomLetters = letters.charAt(Math.floor(Math.random() * 26)) +
                          letters.charAt(Math.floor(Math.random() * 26));

    const randomNumber = Math.floor(Math.random() * 1000).toString().padStart(3, '0');

    const today = new Date();
    const date = today.getDate().toString().padStart(2, '0');
    const month = (today.getMonth() + 1).toString().padStart(2, '0');
    const year = today.getFullYear().toString().slice(2);

    return randomLetters + randomNumber + date + month + year;
}

// Event listener tombol tambah ke keranjang
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        const nama = this.dataset.nama;
        const harga = parseInt(this.dataset.harga);
        const img = this.dataset.img;

        if (cart[nama]) {
            cart[nama].qty += 1;
        } else {
            cart[nama] = {
                nama: nama,
                harga: harga,
                img: img,
                qty: 1
            };
        }

        updateKeranjang();
    });
});

// Update tampilan keranjang & invoice
function updateKeranjang() {
    keranjangList.innerHTML = '';
    let totalHarga = 0;
    let totalItem = 0;

    for (const key in cart) {
        const item = cart[key];
        totalHarga += item.harga * item.qty;
        totalItem += item.qty;

        keranjangList.innerHTML += `
            <li class="list-group-item d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img src="${item.img}" style="width: 60px; height: 60px;" alt="${item.nama}">
                    <div class="mx-3">
                        <h6 class="mb-0">${item.nama}</h6>
                        <small class="text-muted">Rp. ${item.harga.toLocaleString()}</small>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-warning btn-sm" style="color: white" onclick="kurangiQty('${key}')">-</button>
                    <span class="badge bg-primary mx-2">${item.qty}</span>
                    <button class="btn btn-success btn-sm" style="color: white" onclick="tambahQty('${key}')">+</button>
                </div>
            </li>
        `;
    }

    totalHargaElem.innerText = `Rp. ${totalHarga.toLocaleString()}`;

    // Tampilkan Invoice ID jika belum ada
    if (!invoiceId) {
        invoiceId = generateInvoiceCode();
        invoiceIdElem.innerText = invoiceId;
    }
    const checkoutButton = document.getElementById('checkout-button');
    checkoutButton.disabled = Object.keys(cart).length === 0;

}

// Kurangi item
function kurangiQty(key) {
    if (cart[key].qty > 1) {
        cart[key].qty -= 1;
    } else {
        delete cart[key];
    }
    updateKeranjang();
}

// Tambah item
function tambahQty(key) {
    cart[key].qty += 1;
    updateKeranjang();
}
//metode pemvbayaran
  const input = document.getElementById('pilihanPembayaran');

  document.getElementById('qrisOptions').addEventListener('click', function(e) {
    e.preventDefault();
    input.type = 'file';
    input.placeholder = 'Pilih Gambar';
     input.disabled = false;
      // Aktifkan input nama pemilik
    const namaPemilik = document.getElementById('namaPemilik');
    namaPemilik.disabled = false;
     namaPemilik.placeholder = 'Nama Pemilik QRIS';
  });
  function angka(input) {
    input.value = input.value.replace(/[^0-9]/g, ''); // Hanya izinkan angka
  }

  document.getElementById('cashOption').addEventListener('click', function(e) {
    e.preventDefault();
     input.type = 'text';
    input.placeholder = 'Masukkan Nomor Rekening';
     input.disabled = false;
      // Aktifkan input nama pemilik
    const namaPemilik = document.getElementById('namaPemilik');
    namaPemilik.disabled = false;
    namaPemilik.placeholder = 'Nama Pemilik Rekening';
  });
  document.getElementById('transfer').addEventListener('click', function(e) {
    e.preventDefault();
     input.type = 'text';
    input.placeholder = 'Masukkan Nomor Rekening';
     input.disabled = false;
      // Aktifkan input nama pemilik
    const namaPemilik = document.getElementById('namaPemilik');
    namaPemilik.disabled = false;
    namaPemilik.placeholder = 'Nama Pemilik Rekening';
     
  });
  


 const items = document.querySelectorAll('.dropdown-item');
    const inputHidden = document.getElementById('namePembayaran');

    items.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            const selectedValue = this.textContent.trim();
            inputHidden.value = selectedValue;

            });
    });

    const  dropdownItems = document.querySelectorAll('.dropdown-item');
    const button = document.getElementById('basic-addon1');
    const hiddenInput = document.getElementById('namePembayaran');

    dropdownItems.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const pilihan= this.textContent.trim();

            button.textContent = pilihan; //untukUbah teks tombol sesuai pilihan
            hiddenInput.value = pilihan; //untuk Simpan pilihan di input tersembunyi
        });
    });