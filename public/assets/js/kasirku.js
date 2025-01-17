// Ambil elemen foto
const imageUpload = document.getElementById('imageUpload');
const previewImage = document.getElementById('previewImage');

// Ambil elemen dropdown dan div id_pegawai
const userTypeSelect = document.getElementById('user-type');
const idPegawaiField = document.getElementById('id-pegawai-field');

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

// Event listener untuk perubahan pada dropdown
if (userTypeSelect && idPegawaiField) {
    userTypeSelect.addEventListener('change', function() {
        // Dapatkan nilai yang dipilih di dropdown
        const selectedValue = userTypeSelect.value;

        // Jika "Pegawai" dipilih (value = "2"), tampilkan input Id Pegawai
        if (selectedValue === '2') {
            idPegawaiField.style.display = 'block'; // Menampilkan field Id Pegawai
        } else {
            idPegawaiField.style.display = 'none'; // Menyembunyikan field Id Pegawai
        }
    });
}
