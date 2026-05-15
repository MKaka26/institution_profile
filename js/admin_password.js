document.addEventListener('DOMContentLoaded', () => {

    // TOGGLE PASSWORD VISIBILITY
    document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.addEventListener('click', () => {
            const input = document.getElementById(icon.dataset.target);
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });

    // VALIDASI PASSWORD MATCH
    const pass = document.getElementById('password');
    const confirm = document.getElementById('password_confirm');
    const error = document.getElementById('password-error');

    function checkPassword() {
        if (pass.value !== '' && confirm.value !== '' && pass.value !== confirm.value) {
            error.style.display = 'block';
            return false;
        } else {
            error.style.display = 'none';
            return true;
        }
    }

    pass.addEventListener('input', checkPassword);
    confirm.addEventListener('input', checkPassword);

});
