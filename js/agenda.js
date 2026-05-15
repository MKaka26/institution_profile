document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('search-agenda');
    const items = document.querySelectorAll('.agenda-link');

    if (!input) return;

    input.addEventListener('keyup', () => {
        const keyword = input.value.toLowerCase();

        items.forEach(item => {
            const title = item.querySelector('h3').innerText.toLowerCase();
            item.style.display = title.includes(keyword) ? 'block' : 'none';
        });
    });
});

