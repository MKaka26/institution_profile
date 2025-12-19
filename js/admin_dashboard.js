document.addEventListener('DOMContentLoaded', () => {
    const menuLinks = document.querySelectorAll('.sidebar-menu a');

    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            menuLinks.forEach(item => item.classList.remove('active'));
            link.classList.add('active');
        });
    });

    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.createElement('button');
    toggleBtn.innerHTML = '☰';
    toggleBtn.className = 'sidebar-toggle';

    document.querySelector('.topbar').prepend(toggleBtn);

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
    });

    const statCards = document.querySelectorAll('.stat-card');

    statCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-4px)';
            card.style.boxShadow = '0 10px 24px rgba(0,0,0,0.12)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = '0 6px 18px rgba(0,0,0,0.05)';
        });
    });

    console.info('Admin Dashboard loaded (Front-end only mode)');
});
