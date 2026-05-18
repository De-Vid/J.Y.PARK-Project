<div class="swiper-slide d-flex flex-wrap">

    @foreach($products as $product)
    <div class="col-md-3 mb-4 shadow-lg product-card">
        <div class="card h-100">

            <div class="card-img-wrapper">
                <div class="stock-label">In Stock</div>
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                </a>
                <div class="social-overlay">
                    <a href="#"><i class="bi bi-telegram"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>

                <p class="card-text">
                    Price:
                    <span class="text-danger fw-bold price">
                        {{ number_format($product->price, 0) }} $
                    </span>
                </p>

                <div class="product-rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <span class="text-muted small">(5.0)</span>
                </div>
            </div>

        </div>
    </div>
    @endforeach

</div>