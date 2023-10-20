<!DOCTYPE html>
<html lang="en">
<head>
    @include('links')
    <link href="{{ asset('css/quick-preview-style.css') }}" rel="stylesheet">
    <!-- Uključivanje Swiper.js biblioteke -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>
<body>
    <div class="mfp-bg mfp-ready"></div>
    <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;">
        <div class="mfp-container mfp-s-ready mfp-inline-holder">
            <div class="mfp-content">
                <div class="quickview-product single-product-wrapper product white-popup">
                    <div class="quick-product-wrapper single-product-container">
                        <button title="Close (Esc)" type="button" class="mfp-close">x</button>
                        <div class="row">
                            <div class="col col-12 col-lg-6">
                                <div class="single-thumbnails default">
                                    <div class="woocommerce-product-gallery">
                                        <div class="image-wrapper">
                                            <div id="product-images" class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-autoheight slider-loaded"
                                            data-effect="slide" data-direction="horizontal" data-loop="false" data-speed="1000d"
                                            data-spacebetween="0" data-autoplay="false" data-autospeed="300" data-items="1" data-mobileItems="1" data-tabletItems="1">
                                                <div class="swiper-wrapper" style="height:455px; transform: translate3d(0px, 0px, 0px)" id="swiper-wrapper-1" aria-live="polite">
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="1 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="2 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones2.jpg') }}">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="3 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones4.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="4 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="5 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="6 / 8">
                                                    <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-active" style="width: 100%; height: 100%" role="group" aria-label="7 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-2" aria-disabled="true"></div>
                                                <div class="swiper-button-next" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-1" aria-disabled="false"></div>
                                            </div>
                                        </div>
                                        <div class="thumbnails-wrapper">
                                            <div id="product-thumbnails" class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs slider-loaded" data-efect="slide"
                                                data-effect="slide" data-direction="horizontal" data-loop="false" data-speed="1000d"
                                                data-spacebetween="0" data-autoplay="false" data-autospeed="300" data-items="1" data-mobileItems="1" data-tabletItems="1">
                                                <div class="swiper-wrapper swiper-wrapper2">
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="1 / 8">
                                                        <a href="#">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="2 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones2.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="3 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones4.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="4 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="5 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="6 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                                        style="width: 85.5px; margin-right: 7px;" role="group" aria-label="7 / 8">
                                                        <a href="">
                                                            <img src="{{ asset('images/phones3.jpg') }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-lg-6">
                                <a href="#" style="text-decoration: none; color: var(--font-color)">
                                    <h1 class="product-title entry-title">Luksuz za Vašu Tehnologiju - Apple iPhone 14 Pro Max</h1>
                                </a>
                                <div class="product-meta">
                                    <div class="product-model">
                                        <span>Brend: <b>APPLE</b> </span>
                                    </div>
                                    <div class="sku-wrapper">
                                        <span>Model: </span>
                                        <b>IPHONE 14 PRO MAX</b>
                                    </div>
                                </div>
                                <div class="product-ratings">
                                    <div class="product-rating">
                                        <div class="star-rating" role="img" aria-label="Ocenjeno 5.00 od 5">
                                            <span style="width: 100%"></span>
                                        </div>
                                        <div class="count-rating">
                                            <a href="#reviews" rels="nofollow">
                                                <span class="count">1 Pregled</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="klb-single-stock">
                                    <div class="product-stock in-stock">
                                        Dostupno
                                    </div>
                                </div>
                                <div class="product-price">
                                    <span class="price">
                                        <del>
                                            <span>
                                                <bdi>
                                                    <span>
                                                        €699.55
                                                    </span>
                                                </bdi>
                                            </span>
                                        </del>
                                        <ins>
                                            <span>
                                                <bdi>
                                                    <span>
                                                        €622.99
                                                    </span>
                                                </bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-top">
                                        <form action="" method="post" class="cart single-ajax">
                                            <div class="quantity">
                                                <div class="quantity-bottom minus"></div>
                                                <input type="text" class="input-text qty text" name="quantity" id="quantity" size="4" min="1" max="5" step="1" inputmode="numeric" autocomplete="off" value="1">
                                                <div class="quantity-bottom plus"></div>
                                            </div>
                                            <button type="submit" name="add-to-cart" class="button button-primary add-to-cart-button single-add-to-cart-button alt">
                                                <span>Dodaj u korpu</span>
                                            </button>
                                        </form>
                                        <div class="product-actions">
                                            <a href="#" class="widslist klbwl-btn klbwl-product-in-list">
                                                Dodaj u listu zelja
                                            </a>
                                            <a href="#" class="klbcp-btn" style="margin-left: 20px;">
                                                Uporedi
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info-bottom">
                                        <div class="info-message">
                                            <i class="fa-solid fa-truck"></i>
                                            <strong>Nacin isporuke i dogovoru sa prodavcem</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="people-have product-message warning">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <strong>Drugi ljudi zele ovaj proizvod</strong>
                                    25 ljudi ima ovaj proizvod u svojoj listi zelja.
                                </div>
                                <div class="product-meta product-categories">
                                    <span class="posted-in">
                                        Kategorije:
                                        <a href="#">Mobilni Telefoni</a>,
                                        <a href="#">Apple</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="ad-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos qui laudantium ab, quibusdam unde similique. Omnis possimus nam ipsum magni molestias animi, eius doloribus temporibus nobis, inventore tenetur. Vero, illum...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
