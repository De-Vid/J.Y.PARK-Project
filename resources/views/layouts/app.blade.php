<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Premium Coupang Header')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Stack+Sans+Headline:wght@200..700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/header.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @yield('styles')

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

        /* ===== Global Product Styles ===== */
        .product-container {
            padding: 0 15px;
            color: #333;
        }

        body {
            background: #f8f9fb;
        }

        /* ===== Typography ===== */
        .price-large {
            font-size: 2.3rem;
            font-weight: bold;
            color: #111;
        }

        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1rem;
        }

        .discount-badge {
            background: #ff4d4f;
            color: white;
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 700;
        }

        .text-rocket {
            color: #0073e9;
            font-weight: 900;
            font-style: italic;
        }

        /* ===== Product Card ===== */
        .product-card {
            width: 100%;
            height: auto;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            padding: 25px;
        }

        /* ===== Gallery ===== */
        .gallery-container {
            position: sticky;
            top: 20px;
        }

        #image-zoom {
            width: 100%;
            position: relative;
            cursor: crosshair;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #eee;
        }

        #image-zoom img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
            transition: 0.3s;
        }

        #image-zoom::after {
            content: '';
            display: var(--display);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: var(--url);
            background-size: 250%;
            background-position: var(--zoom-x) var(--zoom-y);
            pointer-events: none;
        }

        .thumbs {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .thumb {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: 0.3s;
            background: #fff;
        }

        .thumb:hover {
            transform: translateY(-3px);
            border-color: #0073e9;
        }

        .thumb.active {
            border-color: #0073e9;
            box-shadow: 0 4px 12px rgba(0, 115, 233, 0.25);
        }

        /* ===== Quantity ===== */
        .qty-box {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            width: 140px;
            height: 55px;
            background: #fff;
        }

        .qty-btn {
            width: 45px;
            height: 55px;
            border: none;
            background: #f5f5f5;
            font-size: 20px;
            font-weight: bold;
            transition: 0.2s;
        }

        .qty-btn:hover {
            background: #0073e9;
            color: white;
        }

        .qty-input {
            width: 50px;
            border: none;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            background: transparent;
        }

        .qty-input:focus {
            outline: none;
        }

        /* ===== Buttons ===== */
        .btn-cart {
            border: 2px solid #0073e9;
            color: #0073e9;
            background: white;
            font-weight: 700;
            border-radius: 14px;
            transition: 0.3s;
        }

        .btn-cart:hover {
            background: #0073e9;
            color: white;
            transform: translateY(-2px);
        }

        .btn-buy {
            border: 2px solid green;
            color: green;
            background: white;
            font-weight: bold;
            border-radius: 14px;
            transition: 0.3s;
        }

        .btn-buy:hover {
            background: green;
            color: white;
            font-weight: bold;
            transform: translateY(-2px);
        }

        /* ===== Product Specs ===== */
        .spec-box {
            background: #f8f9fa;
            border-radius: 16px;
            padding: 20px;
        }

        .spec-box li {
            margin-bottom: 10px;
        }

        /* ===== Recommendation ===== */
        .recommendation-card {
            border-radius: 16px;
            border: 1px solid #eee;
            padding: 15px;
            transition: 0.3s;
            background: white;
        }

        .recommendation-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        hr {
            border-top: 1px solid #eee;
            margin: 1.5rem 0;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="py-3">
        @include('components.header')
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <div class="container-fluid">
        @include('components.footer')
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="/js/script.js"></script>
    <script src="/js/swiper.js"></script>

    @yield('scripts')

</body>
<script>
    let imageZoom = document.getElementById('image-zoom');
    let mainImage = document.getElementById('main-image');
    let thumbs = document.querySelectorAll('.thumb');

    /* ===== Zoom Effect ===== */
    imageZoom.addEventListener('mousemove', (event) => {

        imageZoom.style.setProperty('--display', 'block');

        let pointer = {
            x: (event.offsetX * 100) / imageZoom.offsetWidth,
            y: (event.offsetY * 100) / imageZoom.offsetHeight,
        };

        imageZoom.style.setProperty('--zoom-x', pointer.x + '%');
        imageZoom.style.setProperty('--zoom-y', pointer.y + '%');

    });

    imageZoom.addEventListener('mouseout', () => {
        imageZoom.style.setProperty('--display', 'none');
    });

    /* ===== Change Image ===== */
    thumbs.forEach((thumb) => {

        thumb.addEventListener('click', () => {

            let imageSrc = thumb.getAttribute('src');

            mainImage.src = imageSrc;

            imageZoom.style.setProperty('--url', `url('${imageSrc}')`);

            thumbs.forEach(img => img.classList.remove('active'));

            thumb.classList.add('active');

        });

    });

    /* ===== Quantity ===== */
    function increaseQty() {

        let qty = document.getElementById('qty');

        let value = parseInt(qty.value);

        qty.value = value + 1;

        syncQty();
    }

    function decreaseQty() {

        let qty = document.getElementById('qty');

        let value = parseInt(qty.value);

        if (value > 1) {
            qty.value = value - 1;
        }

        syncQty();
    }

    function syncQty() {

        let qty = document.getElementById('qty').value;

        document.getElementById('cart_qty').value = qty;

        document.getElementById('checkout_qty').value = qty;
    }

</script>

</html> 