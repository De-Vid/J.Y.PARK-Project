<div class="container d-flex align-items-center justify-content-between flex-wrap">

    <div class="d-flex align-items-center">
        <div class="category-btn text-white me-3 shadow-sm position-relative" onclick="toggleMenu()">
            <i class="bi bi-list fs-2"></i>
            <div id="menuDropdown" class="menu-dropdown shadow">
                <a href="#sticky-marker">
                    <i class="bi bi-box-seam text-info"></i>
                    <span class="fw-bold">Products List</span>
                </a>
                <a href="#best-seller-section">
                    <i class="bi bi-fire text-danger"></i>
                    <span class="fw-bold">Best Sellers</span>
                </a>
                <a href="#">
                    <i class="bi bi-lightning-charge text-warning"></i>
                    <span class="fw-bold">New Arrivals</span>
                </a>
                <a href="#">
                    <i class="bi bi-grid text-primary"></i>
                    <span class="fw-bold">Categories</span>
                </a>
            </div>
        </div>

        <div class="logo">
            <h2 class="fw-bold mb-0" data-lang="company">J.Y.PARK CO.,LTD</h2>
        </div>
    </div>

    <div class="search-container d-flex flex-grow-1 mx-2">
        <input type="text" class="form-control fw-bold" placeholder="Search Products...">
        <div class="d-flex align-items-center">
            <button class="btn-search">
                <i class="bi bi-search text-primary fs-5"></i>
            </button>
        </div>
    </div>

    <div class="d-flex ms-3 gap-3">

        <a href="#" class="user-nav-item text-center">
            <i class="bi bi-person"></i>
            <div class="fw-bold" data-lang="user">User</div>
        </a>

        <a href="#" class="user-nav-item text-center position-relative">
            <i class="bi bi-cart3"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                style="font-size: 9px;">0</span>
            <div class="fw-bold" data-lang="cart">Cart</div>
        </a>

        <div id="flagBox" class="user-nav-item text-center position-relative flag-box mt-3">
            <img src="/flag/flag_english.png" alt="Khmer" class="main-flag" id="mainFlag">

            <div class="flag-dropdown">
                <img src="/flag/flag_english.png" onclick="setLang('en')">
                <img src="/flag/flag_korean.jpg" onclick="setLang('ko')">
                <img src="/flag/flag_khmer.jpg" onclick="setLang('km')">
            </div>

            <div style="margin-top: 6px; font-weight: bold;" data-lang="nationality">Nationality</div>
        </div>

    </div>

</div>