//elmen fhoto
const imageUpload = document.getElementById('imageUpload');
const previewImage = document.getElementById('previewImage');

// script mengubah gambar saat dipilih file
imageUpload.addEventListener('change', function(event){
    const file = event.target.files[0]; //ambil file yang diunggah
    if(file){
        const reader = new FileReader(); //membaca file secara lokal
        reader.onload = function(e){
            previewImage.src=e.target.result;
        }
        reader.readAsDataURL(file); //membaaca file sebagai URL
    }
});