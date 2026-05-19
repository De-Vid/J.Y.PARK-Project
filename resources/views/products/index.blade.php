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
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<style>
    .swiper-slide {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

</style>

<body>


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
                    <h2 id="sticky-marker" class="fw-bold glow-text">
                        Products <span class="text-light">List</span>
                    </h2>
                    <div id="scroll-header" class="sticky-nav-hidden">
                        @include('components.left-menu')
                    </div>
                    <div class="col-md d-flex">
                        @include('blog.swiper-slide')
                    </div>
                    <br>
                    <div class="swiper">
                        @include('slide.blog_buttom')
                    </div>
                    <br>
                    <h2 id="best-seller-section" class="fw-bold glow-text">
                        Best <span class="text-light">List</span>
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
    <div class="animated-hr-container">
        <hr class="running-hr">
    </div>
    <div class="container-fluid">
        @include('components.footer')
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/swiper.js"></script>
</body>