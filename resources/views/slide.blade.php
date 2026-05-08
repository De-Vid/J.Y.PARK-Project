@extends('layouts.app')

@section('name', 'content')

@section('section')
<style>
    /* Global Product Styles */
    .product-container {
        padding: 0 15px;
        color: #333;
    }

    /* Typography & Price */
    .price-large {
        font-size: 2rem;
        font-weight: 800;
        color: #111;
    }
    .text-rocket {
        color: #0073e9;
        font-weight: 900;
        font-style: italic;
    }
    
    /* Image Gallery Styles */
    .gallery-container {
        position: sticky;
        top: 20px;
    }
    #image-zoom {
        width: 100%;
        position: relative;
        cursor: crosshair;
        border: 1px solid #f0f0f0;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 15px;
    }
    #image-zoom img {
        width: 100%;
        display: block;
        object-fit: contain;
    }
    #image-zoom::after {
        content: '';
        display: var(--display);
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-color: black;
        background-image: var(--url);
        background-size: 250%;
        background-position: var(--zoom-x) var(--zoom-y);
        pointer-events: none;
    }
    .thumbs {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
    .thumb {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 2px solid transparent;
        border-radius: 4px;
        cursor: pointer;
        transition: 0.2s;
    }
    .thumb:hover { border-color: #ddd; }
    .thumb.active { border-color: #0073e9; }

    /* UI Components */
    .selection-box {
        border: 1px solid #ced4da;
        border-radius: 6px;
        padding: 12px 15px;
        background-color: #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }
    .btn-cart {
        border: 1.5px solid #0073e9;
        color: #0073e9;
        background: white;
        font-weight: bold;
        transition: 0.2s;
    }
    .btn-cart:hover { background: #f0f7ff; }
    .btn-buy {
        background-color: #0073e9;
        color: white;
        font-weight: bold;
    }
    .btn-buy:hover { background-color: #005bb5; color: white; }
    
    .recommendation-card {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 15px;
        background: #fff;
        transition: box-shadow 0.3s;
    }
    .recommendation-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.05); }

    hr { border-top: 1px solid #eee; margin: 1.5rem 0; }
</style>

<div class="col-md-12 py-4">
    <div class="row g-4 d-flex">
        <!-- Left: Gallery -->
        <div class="col-md-5">
            <div class="gallery-container">
                <div id="image-zoom"
                    style="--url: url('image/3c9b44ea-e769-4778-951e-9ab470f4323d_fixing_v2.png'); --display: none; --zoom-x: 0%; --zoom-y: 0%;">
                    <img id="main-image" src="image/3c9b44ea-e769-4778-951e-9ab470f4323d_fixing_v2.png" alt="Main Product">
                </div>
                <div class="thumbs">
                    <img class="thumb active" src="image/3c9b44ea-e769-4778-951e-9ab470f4323d_fixing_v2.png" alt="">
                    <img class="thumb" src="image/4de2c980-b4e8-4b29-94d3-9fefd7c34fd6.jpg" alt="">
                    <img class="thumb" src="image/7db83cbc-cab2-47f5-b665-ffcbf6a582ba.jpg" alt="">
                    <img class="thumb" src="image/955f8908377ba74cce951e642c7de39233c1de38edfaef7897571f4ae148.jpg" alt="">
                </div>
            </div>
        </div>

        <!-- Right: Info -->
        <div class="col-md-7">
            <div class="product-container">
                <!-- Title and Icons -->
                <div class="d-flex justify-content-between align-items-start">
                    <h3 class="fw-bold mb-1">Angmet Waterproof Non-Slip Table Mat</h3>
                    <div class="d-flex">
                        <button class="btn btn-outline-secondary btn-sm rounded-circle me-2" title="Wishlist"><i class="bi bi-heart"></i></button>
                        <button class="btn btn-outline-secondary btn-sm rounded-circle" title="Share"><i class="bi bi-share"></i></button>
                    </div>
                </div>

                <!-- Rating -->
                <div class="mb-2">
                    <span class="text-warning">★★★★☆</span>
                    <a href="#" class="text-decoration-none small ms-1">(19 reviews)</a>
                </div>

                <!-- Price -->
                <div class="mb-3 d-flex align-items-baseline">
                    <span class="price-large">9,730 $</span>
                    <span class="text-muted small ms-2">(2,433 won per item)</span>
                    <span class="text-rocket ms-3"><i class="bi bi-rocket-takeoff-fill"></i> Rocket</span>
                </div>

                <hr>

                <!-- Shipping Info -->
                <div class="mb-4 small">
                    <div class="text-success fw-bold mb-3" style="font-size: 1rem;">
                        <i class="bi bi-truck me-1"></i> Guaranteed arrival <span class="border-bottom border-success">tomorrow (Tue) 5/5</span>
                    </div>
                    
                    <div class="form-check custom-radio mb-2">
                        <input class="form-check-input" type="radio" name="shipping" id="ship1" checked>
                        <label class="form-check-label fw-bold" for="ship1">Free shipping on Rocket Delivery items over 19,800 won</label>
                    </div>
                    <div class="form-check custom-radio mb-3">
                        <input class="form-check-input" type="radio" name="shipping" id="ship2">
                        <label class="form-check-label" for="ship2">
                            Free shipping + free returns 
                            <span class="text-muted ms-1">| When applying for Rocket Wow</span> 
                            <i class="bi bi-info-circle text-muted ms-1"></i>
                        </label>
                    </div>
                </div>

                <!-- Selection Dropdown -->
                <div class="selection-box mb-4">
                    <div>
                        <div class="text-muted small mb-1">Color x Size x Quantity</div>
                        <div class="fw-bold">White x 45 x 30 cm x 4 pieces</div>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/40" alt="thumb" class="rounded border me-2">
                        <i class="bi bi-chevron-down text-muted"></i>
                    </div>
                </div>

                <!-- Points Info -->
                <div class="d-flex justify-content-between mb-2 small bg-light p-2 rounded">
                    <span><i class="bi bi-coin text-warning me-1"></i> <strong>Earn points</strong> Up to 486 won <a href="#" class="text-decoration-underline text-dark ms-1">Earn Coupang Cash</a></span>
                    <a href="#" class="text-primary text-decoration-none fw-bold">View Benefits <i class="bi bi-chevron-right"></i></a>
                </div>

                <hr>

                <!-- Purchase Actions -->
                <div class="row g-2 mb-4">
                    <div class="col-2">
                        <input type="number" class="form-control form-control-lg text-center fw-bold" value="1" min="1">
                    </div>
                    <div class="col-5">
                        <button class="btn btn-cart w-100 h-100 py-3 shadow-sm">Put in a shopping cart</button>
                    </div>
                    <div class="col-5">
                        <button class="btn btn-buy w-100 h-100 py-3 shadow-sm">Buy Now <i class="bi bi-chevron-right ms-1"></i></button>
                    </div>
                </div>

                <!-- Product Details List -->
                <div class="bg-light p-3 rounded mb-4">
                    <h6 class="fw-bold mb-3">Product Specifications</h6>
                    <ul class="list-unstyled small mb-0 row">
                        <li class="col-6 mb-2">• Material: PVC/Vinyl</li>
                        <li class="col-6 mb-2">• Total quantity: 4</li>
                        <li class="col-6 mb-2">• Pattern/Print: Flower</li>
                        <li class="col-6 mb-2">• Waterproof: Waterproof</li>
                        <li class="col-6 mb-2">• Shape: Rectangular</li>
                        <li class="col-12 text-muted mt-1" style="font-size: 0.75rem;">• Product ID: 8846270119 - 25612152884</li>
                    </ul>
                </div>

                <!-- Recommendation Footer -->
                <div class="recommendation-card d-flex align-items-center">
                    <img src="https://via.placeholder.com/60" class="rounded border me-3" alt="rec">
                    <div class="flex-grow-1">
                        <div class="small"><strong>How about a recommendation</strong> like this?</div>
                        <div class="small mb-1"><span class="badge bg-danger">64% OFF</span> Cozys Reversible Placemat Nordic Leather...</div>
                        <div class="text-warning small">★★★★☆ <span class="text-muted ms-1">(368)</span></div>
                    </div>
                    <i class="bi bi-chevron-right text-muted fs-5"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let imageZoom = document.getElementById('image-zoom');
    let mainImage = document.getElementById('main-image');
    let thumbs = document.querySelectorAll('.thumb');

    /* Zoom Effect */
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

    /* Change Main Image */
    thumbs.forEach((thumb) => {
        thumb.addEventListener('click', () => {
            let imageSrc = thumb.getAttribute('src');
            mainImage.src = imageSrc;
            imageZoom.style.setProperty('--url', `url('${imageSrc}')`);
            thumbs.forEach(img => img.classList.remove('active'));
            thumb.classList.add('active');
        });
    });
</script>
@endsection