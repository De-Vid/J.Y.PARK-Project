<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Coupang Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Stack+Sans+Headline:wght@200..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/swiper.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
    .swiper {
        width: 100%;
        height: 100px;
        border-radius: 15px;
        /* ធ្វើឱ្យជ្រុងមូល */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        /* ដាក់ស្រមោលតិចៗ */
    }


    /* រចនា Slide នីមួយៗ */

    .swiper-slide {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        /* បន្ថែម Background color ឬ Gradient */
        /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
        color: white;
        font-family: 'Inter', sans-serif;
    }


    /* រចនាប៊ូតុង Navigation (ឆ្វេង-ស្តាំ) */

    .swiper-button-next,
    .swiper-button-prev {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        color: #090909db !important;
        backdrop-filter: blur(5px);
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px;
        /* បន្ថយទំហំ Icon ព្រួញ */
    }


    /* រចនាចំណុច Pagination (មូលៗខាងក្រោម) */

    .swiper-pagination-bullet {
        width: 0px;
        height: 0px;
        background: #fff;
        opacity: 0.5;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
        width: 30px;
        /* ធ្វើឱ្យចំណុចដែលកំពុង Active រាងវែង (Modern Look) */
        border-radius: 5px;
        background: #fff;
        transition: all 0.3s ease;
    }

    .footer-top-nav {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding: 10px 0;
    }

    .footer-top-nav a {
        text-decoration: none;
        color: #555;
        margin-right: 15px;
    }

    .company-info-section {
        padding: 40px 0;
    }

    .footer-bottom-dark {
        background-color: #333;
        color: #999;
        padding: 20px 0;
        font-size: 11px;
    }

    .social-icons a {
        color: white;
        font-size: 20px;
        margin-left: 10px;
        opacity: 0.8;
    }

    .social-icons a:hover {
        opacity: 1;
    }

    .contact-number {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }


</style>

<body>

    <div class="top-utility py-2">
        @include('components.header-utility')
    </div>

    <header class="py-3">
        @include('components.header')
    </header>

    <nav class="sub-nav">
        @include('components.navbar')
    </nav>

    <section class="hero-banner">
        @include('components.carousel')
    </section>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-11 mt-3">
                    <h2 class="fw-bold glow-text">
                        Products <span class="text-light">List</span>
                    </h2>
                    <div class="col-md d-flex">
                        @include('blog.swiper-slide')
                    </div>
                    <br>
                    <div class="swiper">
                        @include('slide.blog_buttom')
                    </div>
                    <br>
                    <h2 class="fw-bold glow-text">
                        Best <span class="text-light-2">Seller</span>
                    </h2>
                    <div class="div d-flex flex-wrap">

                        @include('blog.swiper-text')
                    </div>
                </div>
                <div class="col-md-1">
                    @include('box.image-right')
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>
    <script>
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

    </script>