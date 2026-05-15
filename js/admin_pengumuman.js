const uploadBox = document.getElementById('upload-box');
const linkBox   = document.getElementById('link-box');
const preview   = document.getElementById('preview-gambar');

function toggleBox() {
    const tipe = document.querySelector('input[name="tipe_gambar"]:checked').value;
    uploadBox.style.display = tipe === 'upload' ? 'block' : 'none';
    linkBox.style.display   = tipe === 'link' ? 'block' : 'none';
}

document.querySelectorAll('input[name="tipe_gambar"]').forEach(r => {
    r.addEventListener('change', toggleBox);
});

toggleBox();

function previewUpload(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewLink(input) {
    if (input.value) {
        preview.src = input.value;
        preview.style.display = 'block';
    }
}