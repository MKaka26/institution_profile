document.querySelectorAll('[data-modal]').forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        const modal = document.getElementById('edit-admin-modal');
        document.getElementById('edit-frame').src = btn.href;
        modal.style.display = 'flex';
    });
});

document.querySelector('.modal-close').onclick = () => {
    document.getElementById('edit-admin-modal').style.display = 'none';
};
