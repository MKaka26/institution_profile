// Navbar shadow on scroll
const navbar = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Set active menu based on current page
const setActiveMenu = () => {
    const currentPage = window.location.pathname.split('/').pop();
    const menuLinks = document.querySelectorAll('.nav-link');
    
    menuLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === currentPage) {
            link.classList.add('active');
        }
    });
};

// =====================================
// 2. SMOOTH SCROLL WITH OFFSET
// =====================================

// Smooth scroll untuk anchor links (dengan offset untuk navbar)
const smoothScrollToAnchor = (targetId) => {
    const target = document.querySelector(targetId);
    if (target) {
        const navbarHeight = navbar.offsetHeight;
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight - 20;
        
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    }
};

// Handle anchor links di halaman yang sama
document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        
        // Jangan proses jika href hanya "#"
        if (href === '#') {
            e.preventDefault();
            return;
        }
        
        // Smooth scroll ke target
        e.preventDefault();
        smoothScrollToAnchor(href);
        
        // Update URL tanpa jump
        history.pushState(null, null, href);
    });
});

// Auto scroll saat halaman dimuat dengan anchor di URL
window.addEventListener('load', () => {
    setActiveMenu();
    
    const hash = window.location.hash;
    if (hash) {
        // Delay untuk memastikan page sudah fully loaded
        setTimeout(() => {
            smoothScrollToAnchor(hash);
        }, 100);
    }
});

// =====================================
// 3. HERO SLIDESHOW
// =====================================

const initSlideshow = () => {
    const slides = document.querySelectorAll('.slide');
    if (slides.length === 0) return;
    
    let currentIndex = 0;
    
    const showSlide = (index) => {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    };
    
    const nextSlide = () => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    };
    
    // Auto advance setiap 5 detik
    setInterval(nextSlide, 5000);
    
    // Pastikan slide pertama aktif
    showSlide(0);
};

// =====================================
// 4. SEARCH FUNCTIONALITY
// =====================================

const initSearch = () => {
    const searchBtn = document.querySelector('.search-box button');
    const searchInput = document.querySelector('.search-box input');
    
    if (!searchBtn || !searchInput) return;
    
    const performSearch = () => {
        const keyword = searchInput.value.trim();
        
        if (keyword === '') {
            alert('Silakan masukkan kata kunci pencarian');
            return;
        }
        
        // Redirect ke halaman pencarian (ganti dengan URL yang sesuai)
        window.location.href = `pages/search.php?q=${encodeURIComponent(keyword)}`;
    };
    
    searchBtn.addEventListener('click', performSearch);
    
    // Enter key untuk search
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
};

// =====================================
// 5. SCROLL REVEAL ANIMATION
// =====================================

const initScrollReveal = () => {
    const revealElements = document.querySelectorAll('.card, .news-card, .stat-box, .vision-box, .mission-box');
    
    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        const revealPoint = 100;
        
        revealElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            
            if (elementTop < windowHeight - revealPoint) {
                element.classList.add('revealed');
            }
        });
    };
    
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Initial check
};

// =====================================
// 6. MOBILE MENU TOGGLE
// =====================================

const initMobileMenu = () => {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (!menuToggle || !navMenu) return;
    
    menuToggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        menuToggle.classList.toggle('active');
        document.body.classList.toggle('menu-open');
    });
    
    // Close menu saat link diklik
    document.querySelectorAll('.nav-menu a').forEach(link => {
        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
            menuToggle.classList.remove('active');
            document.body.classList.remove('menu-open');
        });
    });
};

// 
// =====================================
// 7. CLICK-BASED DROPDOWN MENU
// =====================================

const initClickDropdown = () => {
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        const trigger = item.querySelector('a');
        const dropdown = item.querySelector('.dropdown');

        if (!dropdown) return;

        trigger.addEventListener('click', (e) => {
            e.preventDefault();

            // Tutup dropdown lain
            navItems.forEach(other => {
                if (other !== item) {
                    other.classList.remove('open');
                }
            });

            // Toggle dropdown ini
            item.classList.toggle('open');
        });
    });

    // Klik di luar navbar → tutup semua
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.navbar')) {
            navItems.forEach(item => item.classList.remove('open'));
        }
    });
};


// =====================================
// 8. INITIALIZE ALL
// =====================================

document.addEventListener('DOMContentLoaded', () => {
    initSlideshow();
    initSearch();
    initScrollReveal();
    initMobileMenu();
    initClickDropdown();
});


// =====================================
// 9. UTILITY FUNCTIONS
// =====================================

// Lazy loading untuk gambar
const lazyLoadImages = () => {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
};

// Debounce function untuk optimize scroll event
const debounce = (func, wait = 20) => {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
};