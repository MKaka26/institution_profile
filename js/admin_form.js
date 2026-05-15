// ================================
// TOGGLE PASSWORD
// ================================
document.addEventListener('click', function(e){
    if(e.target.classList.contains('toggle-password')){
        const id = e.target.dataset.target;
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
});

// ================================
// AJAX SUBMIT EDIT ADMIN
// ================================
document.getElementById('editAdminForm').addEventListener('submit', function(e){
    e.preventDefault();

    const form = this;
    const btn  = document.getElementById('btnSave');
    const alertBox = document.getElementById('formAlert');

    const password = form.password.value;
    const confirm  = form.confirm_password.value;

    if(password && password !== confirm){
        document.getElementById('passError').style.display = 'block';
        return;
    } else {
        document.getElementById('passError').style.display = 'none';
    }

    btn.disabled = true;
    btn.innerText = 'Menyimpan...';

    fetch('admin_user_edit.php?id=' + form.id.value, {
        method: 'POST',
        body: new FormData(form)
    })
    .then(res => res.json())
    .then(res => {

        if(res.status === 'success'){
            showToast('Admin berhasil diperbarui');
            setTimeout(() => {
                closeModal();
            }, 800);
        }

    })
    .catch(() => {
        showToast(res.message, 'error');
    })
    .finally(() => {
        btn.disabled = false;
        btn.innerText = 'Simpan';
    });
});

// ================================
// TOAST FUNCTION
// ================================
function showToast(message, type = 'success') {
    let toast = document.getElementById('toast');

    toast.className = `toast ${type}`;
    toast.innerText = message;

    setTimeout(() => toast.classList.add('show'), 50);

    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}
