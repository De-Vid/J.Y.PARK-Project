// ===== LANGUAGE DATA =====
const langData = {
    en: {
        favorites: "Favorites",
        vendor: "Vendor Application",
        login: "Login",
        signup: "Sign Up",
        service: "Customer Service",
        seller: "Seller Registration",
        user: "User",
        cart: "Cart",
        nationality: "Nationality",

        play: "Coupang Play",
        rocket_delivery: "Rocket Delivery",
        rocket_fresh: "Rocket Fresh",
        family_month: "Family Month",
        buy_again: "Buy Again",

        menu_item_1: "Sweet Spring<br>Temptation",
        menu_item_2: "Gold Box",
        menu_item_3: "Neo Gold Box<br>+All Items Sale",
        menu_item_4: "Check Coupons",
        menu_item_5: "Food Family Month"
    },

    km: {
        favorites: "ចំណូលចិត្ត",
        vendor: "ដាក់ពាក្យអ្នកលក់",
        login: "ចូលគណនី",
        signup: "ចុះឈ្មោះ",
        service: "សេវាកម្មអតិថិជន",
        seller: "ចុះអ្នកលក់",
        user: "អ្នកប្រើ",
        cart: "កន្ត្រក",
        nationality: "សញ្ជាតិ",

        play: "កូប៉ាងផ្លេ",
        rocket_delivery: "ដឹកជញ្ជូនលឿន",
        rocket_fresh: "អាហារស្រស់",
        family_month: "ខែគ្រួសារ",
        buy_again: "ទិញម្ដងទៀត",

        menu_item_1: "ការច្រៀង​ផ្អង់ផ្អែម<br>នៃបspring",
        menu_item_2: "ប្រអប់ទង់ដែង",
        menu_item_3: "ប្រអប់ទង់ដែងថ្មី<br>+លក់ទាំងលេខ",
        menu_item_4: "ពិនិត្យលេខកូដប្រាក់ពិសេស",
        menu_item_5: "ខែគ្រួសារម្ហូប"
    },

    ko: {
        favorites: "즐겨찾기",
        vendor: "판매자 신청",
        login: "로그인",
        signup: "회원가입",
        service: "고객센터",
        seller: "판매자 등록",
        user: "사용자",
        cart: "장바구니",
        nationality: "국적",

        play: "쿠팡 플레이",
        rocket_delivery: "로켓 배송",
        rocket_fresh: "로켓 프레시",
        family_month: "패밀리 먼스",
        buy_again: "재구매",

        menu_item_1: "쫀득 촉촉한<br>봄의 유혹",
        menu_item_2: "골드박스",
        menu_item_3: "네오 골드박스<br>+전품목 특가",
        menu_item_4: "쿠폰 확인하기",
        menu_item_5: "식품 가정의 달"
    }
};

// ===== SET LANGUAGE FUNCTION =====
function setLang(lang) {
    document.querySelectorAll("[data-lang]").forEach(el => {
        const key = el.getAttribute("data-lang");
        if (langData[lang] && langData[lang][key]) {
            el.innerHTML = langData[lang][key];
        }
    });

    // change flag
    const flag = document.getElementById("mainFlag");
    if (lang === "en") flag.src = "/flag/flag_english.png";
    if (lang === "km") flag.src = "/flag/flag_khmer.jpg";
    if (lang === "ko") flag.src = "/flag/flag_korean.jpg";

    const flagBox = document.getElementById("flagBox");
    if (flagBox) {
        flagBox.classList.remove("open");
    }
}

// ===== MENU TOGGLE FUNCTION =====
function toggleMenu() {
    const menu = document.getElementById("menuDropdown");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

// ===== CLICK OUTSIDE TO CLOSE =====
const closeOnClickOutside = (event) => {
    const menu = document.getElementById("menuDropdown");
    const button = document.querySelector(".category-btn");
    const flagBox = document.getElementById("flagBox");

    if (button && !button.contains(event.target)) {
        menu.style.display = "none";
    }

    if (flagBox && !flagBox.contains(event.target)) {
        flagBox.classList.remove("open");
    }
};

document.addEventListener("click", closeOnClickOutside);

// ===== FLAG BOX EVENT =====
const flagBoxEl = document.getElementById("flagBox");
if (flagBoxEl) {
    flagBoxEl.addEventListener("click", function(event) {
        if (!event.target.closest(".flag-dropdown img")) {
            event.preventDefault();
            this.classList.toggle("open");
        }
    });
}

// ===== CAROUSEL AND MENU NAVIGATION =====
document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.getElementById('mainCarousel');
    const menuItems = document.querySelectorAll('.banner-side-menu .side-menu-item');

    if (carousel && menuItems.length > 0) {
        let carouselInstance = new bootstrap.Carousel(carousel, {
            interval: 1500
        });

        // Click on menu items to navigate carousel
        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const slideIndex = parseInt(this.getAttribute('data-slide'));
                carouselInstance.to(slideIndex);
            });
        });

        // Update active menu item when carousel slides
        carousel.addEventListener('slid.bs.carousel', function(event) {
            menuItems.forEach(item => item.classList.remove('active-menu-item'));
            if (menuItems[event.to]) {
                menuItems[event.to].classList.add('active-menu-item');
            }
        });
    }
});