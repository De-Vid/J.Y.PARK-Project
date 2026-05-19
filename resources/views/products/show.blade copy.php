@extends('layouts.main')

@section('name', 'content')

@section('content')
<style>

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