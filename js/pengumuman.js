/* ===============================
   PENGUMUMAN.JS
=============================== */

document.addEventListener('DOMContentLoaded', () => {

    /* ---------------------------------
       1. SEARCH BAR (JUDUL SAJA)
    ---------------------------------- */

    // const searchInput = document.querySelector('#search-pengumuman-sidebar');
    // const items = document.querySelectorAll('.pengumuman-card');

    // if (searchInput) {
    //     searchInput.addEventListener('input', () => {
    //         const keyword = searchInput.value.toLowerCase().trim();

    //         items.forEach(item => {
    //             const title = item.dataset.title || '';

    //             if (title.includes(keyword)) {
    //                 item.style.display = '';
    //                 item.classList.add('show');
    //             } else {
    //                 item.style.display = 'none';
    //                 item.classList.remove('show');
    //             }
    //         });
    //     });
    // }


    /* ---------------------------------
       2. HIGHLIGHT SEARCH WORD (JUDUL)
    ---------------------------------- */

    // const highlightText = (element, keyword) => {
    //     if (!keyword) return;

    //     const regex = new RegExp(`(${keyword})`, 'gi');
    //     element.innerHTML = element.textContent.replace(regex, '<mark>$1</mark>');
    // };

    // if (searchInput) {
    //     searchInput.addEventListener('input', () => {
    //         const keyword = searchInput.value.trim();
            
    //         items.forEach(item => {
    //             const title = item.querySelector('h3');

    //             // reset highlight
    //             title.innerHTML = title.textContent;

    //             if (keyword.length > 1) {
    //                 highlightText(title, keyword);
    //             }
    //         });
    //     });
    // }


    /* ---------------------------------
       3. FILTER KATEGORI (Optional)
    ---------------------------------- */

    const filterButtons = document.querySelectorAll('[data-filter]');

    if (filterButtons.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.dataset.filter;

                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                items.forEach(item => {
                    const cat = item.dataset.category;

                    if (filter === 'all' || filter === cat) {
                        item.style.display = '';
                        item.classList.add('show');
                    } else {
                        item.style.display = 'none';
                        item.classList.remove('show');
                    }
                });
            });
        });
    }


    /* ---------------------------------
       4. SCROLL REVEAL ANIMATION
    ---------------------------------- */

    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        const revealPoint = 100;

        items.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;

            if (cardTop < windowHeight - revealPoint) {
                card.classList.add('revealed');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();


    /* ---------------------------------
       5. RESPONSIVE GRID FIX
    ---------------------------------- */

    const fixGrid = () => {
        items.forEach(item => {
            if (item.style.display === "none") {
                item.classList.remove("show");
            }
        });
    };

    window.addEventListener('resize', fixGrid);

});
