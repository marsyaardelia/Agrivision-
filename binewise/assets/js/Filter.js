function toggleFilterMenu() {
    const menu = document.getElementById('filterMenu');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}

// Tutup menu kalau klik di luar
document.addEventListener('click', function(e) {
    const menu = document.getElementById('filterMenu');
    const btn = document.querySelector('.filter-btn');
    if (!btn.contains(e.target) && !menu.contains(e.target)) {
        menu.style.display = 'none';
    }
});
