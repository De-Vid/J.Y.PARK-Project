@extends('layouts.main')

@section('name', 'content')

@section('content')
<style>
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
    font-weight: 800;
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

  /* ===== Selection Box ===== */
  .selection-box {
    border: 1px solid #dee2e6;
    border-radius: 14px;
    padding: 15px;
    background: #f8f9fa;
    transition: 0.3s;
  }

  .selection-box:hover {
    border-color: #0073e9;
    background: #fff;
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

<div class="container-fluid py-4">

  <div class="product-card">

    <div class="row g-5">

      <!-- ===== LEFT GALLERY ===== -->
      <div class="col-lg-5">

        <div class="gallery-container">

          <div id="image-zoom"
            style="--url: url('{{ $product->image }}'); --display:none; --zoom-x:0%; --zoom-y:0%;">

            <img id="main-image"
              src="{{ $product->image }}"
              alt="{{ $product->name }}">
          </div>

          <div class="thumbs">
            <img class="thumb active"
              src="{{ $product->image }}"
              alt="">

            <img class="thumb"
              src="image/4de2c980-b4e8-4b29-94d3-9fefd7c34fd6.jpg"
              alt="">

            <img class="thumb"
              src="image/7db83cbc-cab2-47f5-b665-ffcbf6a582ba.jpg"
              alt="">

            <img class="thumb"
              src="image/955f8908377ba74cce951e642c7de39233c1de38edfaef7897571f4ae148.jpg"
              alt="">
          </div>

        </div>

      </div>

      <!-- ===== RIGHT INFO ===== -->
      <div class="col-lg-7">

        <div class="product-container">

          <!-- Title -->
          <div class="d-flex justify-content-between align-items-start mb-2">

            <div>
              <h2 class="fw-bold mb-2">
                {{ $product->name }}
              </h2>

              <div class="text-warning">
                ★★★★☆
                <span class="text-muted small">(19 Reviews)</span>
              </div>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-light rounded-circle shadow-sm">
                <i class="bi bi-heart"></i>
              </button>

              <button class="btn btn-light rounded-circle shadow-sm">
                <i class="bi bi-share"></i>
              </button>
            </div>

          </div>

          <!-- Price -->
          <div class="mb-4">

            <div class="d-flex align-items-center gap-2 mb-2">
              <span class="discount-badge">64% OFF</span>
              <span class="old-price">$250</span>
            </div>

            <div class="d-flex align-items-center">

              <span class="price-large">
                {{ number_format($product->price, 0) }} $
              </span>

              <span class="text-rocket ms-3">
                <i class="bi bi-rocket-takeoff-fill"></i>
                Rocket Delivery
              </span>

            </div>

          </div>

          <!-- Shipping -->
          <div class="bg-light rounded-4 p-3 mb-4">

            <div class="text-success fw-bold mb-2">
              <i class="bi bi-truck"></i>
              Guaranteed arrival tomorrow
            </div>

            <div class="small text-muted">
              Free shipping for orders over $30
            </div>

          </div>

          <!-- Selection -->
          <div class="selection-box mb-4">

            <div>
              <div class="text-muted small mb-1">
                Color x Size
              </div>

              <div class="fw-bold">
                White x Large
              </div>
            </div>

            <i class="bi bi-chevron-down"></i>

          </div>

          <!-- Quantity + Actions -->
          <div class="row g-3 align-items-center mb-4">

            <div class="col-md-auto">

              <div class="qty-box">

                <button class="qty-btn" onclick="decreaseQty()">
                  -
                </button>

                <input type="text"
                  id="qty"
                  class="qty-input"
                  value="1"
                  readonly>

                <button class="qty-btn" onclick="increaseQty()">
                  +
                </button>

              </div>

            </div>

            <!-- Add To Cart -->
            <div class="col">

              <form action=""
                method="POST">

                @csrf

                <input type="hidden"
                  name="qty"
                  id="cart_qty"
                  value="1">

                <button class="btn btn-cart w-100 py-2">
                  <i class="bi bi-cart-plus me-1"></i>
                  Add To Cart
                </button>

              </form>

            </div>

            <!-- Buy -->
            <div class="col">

              <form action="{{ route('checkout', $product->id) }}"
                method="POST">

                @csrf

                <input type="hidden"
                  name="qty"
                  id="checkout_qty"
                  value="1">

                <button class="btn btn-buy w-100 py-2">
                  Buy Now
                  <i class="bi bi-lightning-charge-fill ms-1"></i>
                </button>

              </form>

            </div>

          </div>

          <!-- Description -->
          <div class="mb-4">

            <h5 class="fw-bold mb-3">
              Product Description
            </h5>

            <p class="text-muted">
              {{ $product->description }}
            </p>

          </div>

          <!-- Specifications -->
          <div class="spec-box mb-4">

            <h5 class="fw-bold mb-3">
              Product Specifications
            </h5>

            <ul class="list-unstyled mb-0 row">

              <li class="col-md-6">
                • Material: Premium Quality
              </li>

              <li class="col-md-6">
                • Waterproof: Yes
              </li>

              <li class="col-md-6">
                • Shape: Rectangle
              </li>

              <li class="col-md-6">
                • Warranty: 1 Year
              </li>

            </ul>

          </div>

          <!-- Recommendation -->
          <div class="recommendation-card d-flex align-items-center">

            <img src="{{ $product->image }}"
              class="rounded me-3"
              width="70"
              height="70"
              style="object-fit:cover;"
              alt="">

            <div class="flex-grow-1">

              <div class="fw-bold small">
                Recommended Product
              </div>

              <div class="small text-muted">
                Similar items customers also bought
              </div>

              <div class="text-warning small">
                ★★★★☆
              </div>

            </div>

            <i class="bi bi-chevron-right"></i>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

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
@endsection