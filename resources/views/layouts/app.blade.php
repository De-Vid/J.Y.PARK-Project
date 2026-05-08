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
    #image-zoom {
        width: 550px;
        height: 450px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow: hidden;
        cursor: zoom-in;
        border-radius: 10px;
        background: #fff;
    }

    #image-zoom img {
        width: 100%;
        height: 100%;
        cursor: pointer;
        object-position: 0 0;
    }

    #image-zoom::after {
        display: var(--display);
        content: '';
        width: 100%;
        height: 100%;
        background-image: var(--url);
        background-size: 200%;
        background-position: var(--zoom-x) var(--zoom-y);
        position: absolute;
        left: 0;
        top: 0;
        pointer-events: none;
    }

    /* Thumbnail Images */
    .thumbs {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .thumbs img {
        width: 100px;
        height: 90px;
        border-radius: 8px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: 0.3s;
    }

    .thumbs img:hover {
        transform: scale(1.05);
    }

    .thumbs img.active {
        border-color: #0d6efd;
    }

            .product-container { max-width: 800px; margin: 20px auto; padding: 20px; border: 1px solid #eee; }
        .price-large { font-size: 1.75rem; font-weight: 700; color: #111; }
        .text-rocket { color: #0073e9; font-style: italic; font-weight: bold; }
        .badge-tomorrow { color: #008a00; border: 1px solid #008a00; padding: 2px 4px; border-radius: 3px; font-size: 0.75rem; }
        .selection-box { border: 1px solid #ddd; padding: 10px; background-color: #f9f9f9; display: flex; justify-content: space-between; align-items: center; }
        .btn-cart { border: 1px solid #0073e9; color: #0073e9; background: white; font-weight: bold; padding: 12px; }
        .btn-buy { background-color: #0073e9; color: white; font-weight: bold; padding: 12px; }
        .btn-buy:hover { background-color: #005bb5; color: white; }
        .recommendation-card { border: 1px solid #eee; border-radius: 4px; padding: 10px; font-size: 0.9rem; }
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

    <div class="container">
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-12 mt-3">
                    @yield('section')
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