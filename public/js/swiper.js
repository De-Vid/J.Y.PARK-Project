const swiper = new Swiper('.swiper', {
    direction: 'horizontal', // ប្តូរមកដេកវិញបើចង់បានស្ទីលពេញនិយម
    loop: true,
    speed: 800, // ល្បឿនរុញ slide (ms)

    // បន្ថែម Effect ស្អាតៗដូចជា 'fade', 'cube', 'coverflow', ឬ 'flip'
    effect: 'coverflow',
    coverflowEffect: {
        rotate: 30,
        slideShadows: false,
    },

    // Pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true, // ធ្វើឱ្យគ្រាប់ pagination រួញពង្រីកតាម slide
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // Autoplay (ឱ្យវាដើរខ្លួនឯង)
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
});

window.onscroll = function() {
    const marker = document.getElementById('sticky-marker');
    const stickyHeader = document.getElementById('scroll-header');


    const markerOffset = marker.offsetTop;

    if (window.scrollY >= markerOffset) {
        // បើ Scroll ដល់ ឬលើស ចំណុច Marker ឱ្យវាបង្ហាញ និងជាប់នៅទីនោះ
        stickyHeader.classList.add('show');
    } else {
        // បើនៅខាងលើវិញ ឱ្យវាលាក់បាត់ទៅវិញ
        stickyHeader.classList.remove('show');
    }
};