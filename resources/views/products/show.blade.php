@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div class="container-fluid">
  <div class="col-md-12">
    <div class="row">
      <div class="product-card">
        <div class="row g-5">

          <!-- LEFT IMAGE -->
          <div class="col-lg-5">
            @include('components_product.zomm-img')
          </div>

          <!-- RIGHT INFO -->
          <div class="col-lg-7">
            <div class="product-container">

              <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                  <h2 class="fw-bold mt-3">
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

              <!-- PRICE -->
              <div class="mb-4">
                <div class="d-flex align-items-center">
                  <span class="price-large text-danger">
                    {{ number_format($product->price, 0) }} $
                  </span>
                </div>
              </div>

              <!-- DELIVERY -->
              <div class="bg-light rounded-4 p-3 mb-4">
                <div class="text-success fw-bold mb-2">
                  <i class="bi bi-truck"></i>
                  Guaranteed 1 or 2-hour delivery in Phnom Penh
                </div>

                <div class="small text-muted">
                  Guaranteed 1 or 2 day delivery in the provinces
                </div>
              </div>

              <!-- QTY -->
              <div class="row g-3 align-items-center mb-4">

                <div class="col-md-auto">
                  <div class="qty-box">
                    <button class="qty-btn" onclick="decreaseQty()">-</button>

                    <input type="text"
                      id="qty"
                      class="qty-input"
                      value="1"
                      readonly>

                    <button class="qty-btn" onclick="increaseQty()">+</button>
                  </div>
                </div>

                <!-- ADD TO CART -->
                <div class="col">

                  @auth

                  <form action="{{ route('cart.add', $product->id) }}"
                    method="POST">

                    @csrf

                    <input type="hidden"
                      name="qty"
                      id="cart_qty"
                      value="1">

                    <button type="submit"
                      class="btn btn-cart w-100 py-2">

                      <i class="bi bi-cart-plus me-1"></i>
                      Add To Cart

                    </button>

                  </form>

                  @else

                  <a href="{{ route('login') }}"
                    class="btn btn-cart w-100 py-2">

                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login To Add Cart

                  </a>

                  @endauth

                </div>

                <!-- BUY NOW -->
                <div class="col">

                  @auth

                  <form action="{{ route('checkout', $product->id) }}"
                    method="POST">

                    @csrf

                    <input type="hidden"
                      name="qty"
                      id="checkout_qty"
                      value="1">

                    <button type="submit"
                      class="btn btn-buy w-100 py-2">

                      Buy Now
                      <i class="bi bi-lightning-charge-fill ms-1"></i>

                    </button>

                  </form>

                  @else

                  <a href="{{ route('login') }}"
                    class="btn btn-buy w-100 py-2">

                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login To Buy

                  </a>

                  @endauth

                </div>

              </div>

              <!-- DESCRIPTION -->
              <div class="mb-4">
                <h5 class="fw-bold mb-3">
                  Product Description
                </h5>

                <p class="text-muted">
                  {{ $product->description }}
                </p>
              </div>

              <!-- SPEC -->
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

              <!-- RECOMMEND -->
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
  </div>
</div>

<div class="animated-hr-container">
  <hr class="running-hr">
</div>

<!-- QTY SCRIPT -->
<script>
  function increaseQty() {

    let qty = document.getElementById('qty');
    let cartQty = document.getElementById('cart_qty');
    let checkoutQty = document.getElementById('checkout_qty');

    let value = parseInt(qty.value);

    value++;

    qty.value = value;

    if (cartQty) {
      cartQty.value = value;
    }

    if (checkoutQty) {
      checkoutQty.value = value;
    }
  }

  function decreaseQty() {

    let qty = document.getElementById('qty');
    let cartQty = document.getElementById('cart_qty');
    let checkoutQty = document.getElementById('checkout_qty');

    let value = parseInt(qty.value);

    if (value > 1) {

      value--;

      qty.value = value;

      if (cartQty) {
        cartQty.value = value;
      }

      if (checkoutQty) {
        checkoutQty.value = value;
      }
    }
  }
</script>

@endsection