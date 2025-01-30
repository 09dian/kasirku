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

function updateSwitchLabel(element) {

    element.value = element.checked ? "1" : "0";

    // Perbarui teks label sesuai status
    const label = document.getElementById("switchLabel");
    label.textContent = element.checked ? "Active" : "Tidak Active";
}
