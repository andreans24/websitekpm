document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Isotope
    var iso = new Isotope('.isotope-container', {
        itemSelector: '.isotope-item',
        layoutMode: 'masonry'
    });

    // Ketika filter di klik
    var filtersElem = document.querySelector('.portfolio-filters');
    filtersElem.addEventListener('click', function(event) {
        if (!matchesSelector(event.target, 'li')) {
            return;
        }
        var filterValue = event.target.getAttribute('data-filter');
        iso.arrange({
            filter: filterValue
        });

        // Tambahkan class aktif
        document.querySelectorAll('.portfolio-filters li').forEach(function(el) {
            el.classList.remove('filter-active');
        });
        event.target.classList.add('filter-active');
    });
});