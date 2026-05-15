document.addEventListener('DOMContentLoaded', () => {

    const radioUpload = document.querySelector('input[name="gambar_tipe"][value="upload"]');
    const radioLink   = document.querySelector('input[name="gambar_tipe"][value="link"]');

    const inputFile   = document.querySelector('input[name="gambar_file"]');
    const inputLink   = document.querySelector('input[name="gambar_link"]');
    const previewImg  = document.getElementById('preview-gambar');

    // Jika elemen tidak lengkap, hentikan
    if (!radioUpload || !radioLink || !inputFile || !inputLink || !previewImg) return;

    /* ================= TOGGLE INPUT ================= */
    const toggleInput = () => {
        if (radioUpload.checked) {
            inputFile.style.display = 'block';
            inputLink.style.display = 'none';
            inputLink.value = '';
        } else {
            inputFile.style.display = 'none';
            inputLink.style.display = 'block';
            inputFile.value = '';
        }
    };

    /* ================= PREVIEW FILE ================= */
    inputFile.addEventListener('change', () => {
        if (inputFile.files && inputFile.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    });

    /* ================= PREVIEW LINK ================= */
    inputLink.addEventListener('input', () => {
        if (inputLink.value.trim() !== '') {
            previewImg.src = inputLink.value;
            previewImg.style.display = 'block';
        } else {
            previewImg.src = '';
            previewImg.style.display = 'none';
        }
    });

    /* ================= RADIO CHANGE ================= */
    [radioUpload, radioLink].forEach(radio => {
        radio.addEventListener('change', () => {
            previewImg.src = '';
            previewImg.style.display = 'none';
            toggleInput();
        });
    });

    /* ================= INIT ================= */
    toggleInput();

});
