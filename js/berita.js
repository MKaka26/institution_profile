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

    document.getElementById("imageUpload").addEventListener("change", function () {
    const allowedTypes = ["image/jpeg", "image/png", "image/webp"];
    const file = this.files[0];

    if (file && !allowedTypes.includes(file.type)) {
        alert("Format gambar harus JPG, PNG, atau WEBP");
        this.value = "";
        document.getElementById("fileInfo").textContent = "Belum ada file dipilih";
    }
});

document.getElementById("imageUpload").addEventListener("change", function () {
    const file = this.files[0];
    const info = document.getElementById("fileInfo");

    if (!file) return;

    const allowedTypes = ["image/jpeg", "image/png", "image/webp"];
    const maxSize = 2 * 1024 * 1024; // 2MB

    if (!allowedTypes.includes(file.type)) {
        alert("Format gambar harus JPG, PNG, atau WEBP");
        this.value = "";
        info.textContent = "Belum ada file dipilih";
        return;
    }

    if (file.size > maxSize) {
        alert("Ukuran gambar maksimal 2 MB");
        this.value = "";
        info.textContent = "Belum ada file dipilih";
        return;
    }

    // cek rasio
    const img = new Image();
    img.onload = function () {
        const ratio = this.width / this.height;
        const ideal = 16 / 9;

        if (Math.abs(ratio - ideal) > 0.05) {
            alert("Rasio gambar harus 16:9 (contoh 1200x630)");
            document.getElementById("imageUpload").value = "";
            info.textContent = "Belum ada file dipilih";
        } else {
            info.textContent = "File dipilih: " + file.name;
        }
    };

    img.src = URL.createObjectURL(file);
});

});
