/* BERITA & PENGUMUMAN */

document.addEventListener('DOMContentLoaded', () => {

    /* SEARCH BERITA */
    const searchInput = document.querySelector('#search-berita');
    const beritaCards = document.querySelectorAll('.berita-card');

    if (searchInput) {
        searchInput.addEventListener('keyup', () => {
            const keyword = searchInput.value.toLowerCase();

            beritaCards.forEach(card => {
                const title = card.querySelector('h3').innerText.toLowerCase();
                const content = card.querySelector('p').innerText.toLowerCase();

                if (title.includes(keyword) || content.includes(keyword)) {
                    card.style.display = 'grid';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    /* FILTER KATEGORI */
    const filterButtons = document.querySelectorAll('[data-filter]');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-filter');

            // active state
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            beritaCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');

                if (category === 'all' || cardCategory === category) {
                    card.style.display = 'grid';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    /* SCROLL REVEAL ANIMATION */
    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        const revealPoint = 100;

        beritaCards.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;

            if (cardTop < windowHeight - revealPoint) {
                card.classList.add('revealed');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();

    /* HIGHLIGHT PENCARIAN (OPSIONAL) */
    const highlightText = (element, keyword) => {
        if (!keyword) return;

        const regex = new RegExp(`(${keyword})`, 'gi');
        element.innerHTML = element.textContent.replace(regex, '<mark>$1</mark>');
    };

    if (searchInput) {
        searchInput.addEventListener('input', () => {
            const keyword = searchInput.value.trim();

            beritaCards.forEach(card => {
                const title = card.querySelector('h3');
                const text = card.querySelector('p');

                // reset
                title.innerHTML = title.textContent;
                text.innerHTML = text.textContent;

                if (keyword.length > 2) {
                    highlightText(title, keyword);
                    highlightText(text, keyword);
                }
            });
        });
    }

});
