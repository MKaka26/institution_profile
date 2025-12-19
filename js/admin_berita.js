/* =============================
   ADMIN BERITA JS
   Front-End Only
   ============================= */

document.addEventListener('DOMContentLoaded', () => {

    /* =============================
       ELEMENTS
       ============================= */
    const radios = document.querySelectorAll('input[name="image_type"]');
    const uploadGroup = document.getElementById('uploadGroup');
    const linkGroup = document.getElementById('linkGroup');
    const imageUpload = document.getElementById('imageUpload');
    const imageLink = document.getElementById('imageLink');
    const uploadInfo = document.getElementById('uploadInfo');
    const submitBtn = document.querySelector('.btn-primary');

    /* =============================
       TOGGLE IMAGE SOURCE
       ============================= */
    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'upload') {
                uploadGroup.style.display = 'block';
                linkGroup.style.display = 'none';

                imageLink.value = '';
            } else {
                uploadGroup.style.display = 'none';
                linkGroup.style.display = 'block';

                imageUpload.value = '';
                uploadInfo.textContent = 'Belum ada file dipilih';
            }
        });
    });

    /* =============================
       SHOW FILE NAME
       ============================= */
    imageUpload.addEventListener('change', () => {
        uploadInfo.textContent = imageUpload.files.length
            ? 'File dipilih: ' + imageUpload.files[0].name
            : 'Belum ada file dipilih';
    });

    /* =============================
       FORM VALIDATION (UI ONLY)
       ============================= */
    submitBtn.addEventListener('click', (e) => {
        const selectedType = document.querySelector('input[name="image_type"]:checked').value;

        if (selectedType === 'upload' && !imageUpload.files.length) {
            e.preventDefault();
            alert('Silakan upload gambar atau pilih link gambar.');
            return;
        }

        if (selectedType === 'link' && imageLink.value.trim() === '') {
            e.preventDefault();
            alert('Silakan masukkan link gambar.');
            return;
        }
    });

    console.info('Admin Berita JS loaded (Front-end only)');
});
