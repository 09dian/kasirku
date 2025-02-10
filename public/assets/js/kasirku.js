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
function updateSwitch(switchElem) {
    let label = document.getElementById('switchLabel');
    if (switchElem.checked) {
        switchElem.value = 1;
        label.textContent = 'Aktif';
    } else {
        switchElem.value = 0;
        label.textContent = 'Tidak Aktif';
    }
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
