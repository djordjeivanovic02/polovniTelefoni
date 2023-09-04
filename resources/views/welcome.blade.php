<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('links')
    <title>Polovni Telefoni</title>
    @include('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/loading-style.css') }}" rel="stylesheet">
</head>

<main id="main" class="site-primary">
    <div class="site-content">
        <div class="shop-content">
            <div class="container">
                <div class="row mt-20 d-mt-20 shop-banner-top">
                    <div class="col">
                        <div class="site-module module-banner-text">
                            <div class="banner-wrapper bg-light">
                                <div class="banner-inner d-flex flex-wrap align-items-center">
                                    <h4 class="entry-title" >
                                        Kupujte i
                                        <strong> ustedite na </strong>
                                        proizvodima
                                    </h4>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="banner-details text-xl-end text-lg-end text-md-start text-sm-start text-start">
                                            <div class="banner-price">
                                                pocev od
                                                <span>€45.00</span>
                                            </div>
                                            <p>Ne propustite ovu specijalnu ponudu danas.</p>
                                        </div>
                                        <div class="banner-button f-right">
                                            <a href="" class="btn small rounded link-color d-flex align-items-center">
                                                Kupi odmah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-0  shop-banner-bottom">
                    <div class="col col-12 col-lg-4 mt-10 d-mt-20">
                        <div class="site-module banner-module">
                            <div class="module-wrapper">
                                <div class="banner bg-light align-center price-banner">
                                    <div class="banner-content">
                                        <div class="banner-content-wrapper">
                                            <div class="entry-description">
                                                <p>Najbolja ponuda</p>
                                            </div>
                                            <h3 class="entry-title">Telefona</h3>
                                            <div class="banner-price-content">
                                                <p>Nedeljno Snizenje</p>
                                                <span class="price">
                                                    <ins>
                                                        <span>
                                                            <bdi>€299.99</bdi>
                                                        </span>
                                                    </ins>
                                                    <del aria-hidden="true">
                                                        <span>
                                                            <bdi>€399.99</bdi>
                                                        </span>
                                                    </del>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="{{ asset('images/banner-phone.jpg') }}" alt="" srcset="">
                                    </div>
                                    <a href="" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-lg-4 mt-10 d-mt-20">
                    <div class="site-module banner-module">
                            <div class="module-wrapper">
                                <div class="banner bg-light align-center price-banner">
                                    <div class="banner-content">
                                        <div class="banner-content-wrapper">
                                            <div class="entry-description">
                                                <p>Najbolja ponuda</p>
                                            </div>
                                            <h3 class="entry-title">Slusalica</h3>
                                            <div class="banner-price-content">
                                                <p>Nedeljno Snizenje</p>
                                                <span class="price">
                                                    <ins>
                                                        <span>
                                                            <bdi>€29.99</bdi>
                                                        </span>
                                                    </ins>
                                                    <del aria-hidden="true">
                                                        <span>
                                                            <bdi>€19.99</bdi>
                                                        </span>
                                                    </del>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="{{ asset('images/banner-headphones.jpg') }}" alt="" srcset="">
                                    </div>
                                    <a href="" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-lg-4 mt-10 d-mt-20">
                    <div class="site-module banner-module">
                            <div class="module-wrapper">
                                <div class="banner bg-light align-center price-banner">
                                    <div class="banner-content">
                                        <div class="banner-content-wrapper">
                                            <div class="entry-description">
                                                <p>Najbolja ponuda</p>
                                            </div>
                                            <h3 class="entry-title">Dodataka</h3>
                                            <div class="banner-price-content">
                                                <p>Nedeljno Snizenje</p>
                                                <span class="price">
                                                    <ins>
                                                        <span>
                                                            <bdi>€29.99</bdi>
                                                        </span>
                                                    </ins>
                                                    <del aria-hidden="true">
                                                        <span>
                                                            <bdi>€25.99</bdi>
                                                        </span>
                                                    </del>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-image">
                                        <img src="{{ asset('images/banner-addons.jpg') }}" alt="" srcset="">
                                    </div>
                                    <a href="" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-page-header d-flex flex-row align-items-end">
                    <nav class="breadcrumb">
                        <ul class="d-flex align-items-center flex-row flex-wrap m-0 p-0 list-unstyled">
                            <li>
                                <a href="">Pocetna</a>
                            </li>
                            <li>
                                Sop
                            </li>
                        </ul>
                    </nav>
                </div>
                <header class="products-header"></header>
                <div class="before-shop-loop">
                    <div class="row d-flex flex-row-reverse sidebar-left">
                        <div class="col col-9 d-flex align-items-center justify-content-end content-column">
                            <div class="filter-wrapper d-inline-flex align-items-center ml-auto">
                                <div class="sorting-product d-inline-flex align-items-center">
                                    <form action="" method="GET">
                                        <select name="orderby" id="" class="orderby filterSelect" aria-label="Shop order" data-class="select-filter-orderby" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="popularnost" data-select2-id="17">Sortiraj po popularnosti</option>
                                            <option value="ocena">Sortiraj po prosecnoj oceni</option>
                                            <option value="datum" selected="selected" data-select2-id="3">Sortiraj po datumu (prvo najnovije)</option>
                                            <option value="cena">Sortiraj po ceni (rastuce)</option>
                                            <option value="cena_opadajuce">Sortiraj po ceni (opadajuce)</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="sorting-product hide-mobile d-xl-inline-flex d-lg-inline-flex d-md-inline-flex d-sm-none d-none align-items-center">
                                    <span>Prikazi:</span>
                                    <form action="" method="GET">
                                        <select name="perpage" id="" class="perpage showing filterSelect select2-hidden-accessible" data-class="select-filter-perpage" data-select2-id="63" tabInde="-1" aria-hidden="true">
                                            <option value="16" data-select2-id="65">16 oglasa</option>
                                            <option value="32">32 oglasa</option>
                                            <option value="48">48 oglasa</option>
                                            <option value="60">60 oglasa</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="product-views-buttons hide-mobile d-xl-inline-flex d-lg-inline-flex d-md-inline-flex d-sm-none d-none align-items-center">
                                    <a href="" class="grid-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="Resetka">
                                        <i class="fa-solid fa-table-cells-large"></i>
                                    </a>
                                    <a href="" class="lsit-view" data-bs-toggle="tooltip" data-bs-placement="top" title="Lista">
                                        <i class="fa-solid fa-list-ul"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12 col-lg-3 sidebar-column hide-mobile d-xl-flex align-items-center justify-content-start d-lg-none d-md-none d-sm-none d-none">
                            <p class="m-0">Prikazuje se 1-16 od ukupno 18 proizvoda</p>
                        </div>
                        <div class="col col-3 sidebar-column hide-mobile d-xl-none d-lg-flex d-md-flex d-sm-flex d-flex align-items-center justify-content-start d-xl-flex">
                            <i class="fa-solid fa-filter"></i>
                        </div>
                    </div>
                </div>
                <div class="row d-flex flex-row-reverse content-wrapper sidebar-left">
                    <!-- Prikaz oglasa! -->
                    <div class="col col-12 col-lg-9 content-primary"> 
                        <div id="loading-form-screen" style="display: flex;" class="h-100 position-relative align-items-start justify-content-center">
                            <div class="custom-loader"></div>
                        </div>
                        <div class="products column-4 mobile-2 m-0 p-0 list-unstyled">
                            
                        </div>
                    </div>
                    <div id="sidebar" class="col col-12 col-lg-3 content-secondary site-sidebar filtered-sidebar">
                        <div class="site-scroll ps overflow-hidden">
                            <div class="sidebar-inner">
                                <div class="widget widget-product-categories">
                                    <h4 class="widget-title">Kategorije Proizvoda</h4>
                                    <div class="widget-checkbox-list">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li class="d-flex flex-column align-items-start">
                                                <a href="?orderby=price&category=mobile-phones" class="product-cat w-100">
                                                    <input type="checkbox" id="apple" name='category' class="d-none category-checkbox" value="1">
                                                    <label class="d-flex align-items-center mb-0 w-100">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                        Apple
                                                    </label>
                                                </a>
                                            </li>
                                            <li class="d-flex flex-column align-items-start cat-parent">
                                                <a href="?orderby=price&category=mobile-phones" class="product-cat w-100">
                                                    <input type="checkbox" id="mobile-phone" name='category' class="d-none  category-checkbox" value="2">
                                                    <label class="d-flex align-items-center mb-0 w-100">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                        Mobilni Telefoni
                                                    </label>
                                                </a>
                                                <ul class="children list-unstyled w-100 align-items-center">
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="accessories" id="accessories" value="31" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Dodaci za Telefon
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="mask" id="mask" value="32" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Maske za Telefon
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="dual-sim" id="dual-sim" value="33" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Dual Sim
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="sim-freee" id="sim-free" value="34" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Sim Free
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="new-phones" id="new-phones" value="35" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Novi Telefoni
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="old-phones" id="old-phones" value="36" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Polovni Telefoni
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="parts" id="parts" value="37" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Delovi za Telefon
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="locked" id="locked" value="38" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Zakljucani Telefoni
                                                            </label>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span class="subDropdown plus"></span>
                                                <!-- <span class="subDropdown minus"></span> -->
                                            </li>
                                            <li class="d-flex flex-column align-items-start cat-parent">
                                                <a href="?orderby=price&category=mobile-phones" class="product-cat w-100">
                                                    <input type="checkbox" id="mobile-phone" name='category' class="d-none  category-checkbox" value="39">
                                                    <label class="d-flex align-items-center mb-0 w-100">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                        Slusalice
                                                    </label>
                                                </a>
                                                <ul class="children list-unstyled w-100 align-items-center">
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="noise-canceling" id="noise-canceling" value="40" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Noise Canceling
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="over-ear" id="over-ear" value="41" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Over-EAR
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="premium" id="premium" value="42" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Premium Slusalice
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="sport&fitness" id="sport&fitness" value="43" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Sport & Fitnes
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="bluetooth" id="bluetooth" value="44" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Bluetooth Slusalice
                                                            </label>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span class="subDropdown plus"></span>
                                                <!-- <span class="subDropdown minus"></span> -->
                                            </li>
                                            <li class="d-flex flex-column align-items-start cat-parent">
                                                <a href="?orderby=price&category=mobile-phones" class="product-cat w-100">
                                                    <input type="checkbox" id="smart-watches" name='smart-watches' class="d-none  category-checkbox" value="45">
                                                    <label class="d-flex align-items-center mb-0 w-100">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                        Pametni Satovi
                                                    </label>
                                                </a>
                                                <ul class="children list-unstyled w-100 align-items-center">
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="sport-watches" id="sport-watches" value="46" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Sportski Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="timex-watches" id="timex-watches" value="47" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Timex Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="male-watches" id="male-watches" value="48" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Muski Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="female-watches" id="female-watches" value="49" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Zenski Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="casio-watches" id="casio-watches" value="50" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Casio Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="chronograph-watch" id="chronograph-watch" value="51" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Hronografski Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                    <li class="d-flex flex-column align-items-start cat-parent">
                                                        <a href="#" class="product-cat w-100">
                                                            <input type="checkbox" name="kids-watch" id="kids-watch" value="52" class="d-none">
                                                            <label class="d-flex align-items-center mb-0 w-100">
                                                                <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                                Deciji Satovi
                                                            </label>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <span class="subDropdown plus"></span>
                                                <!-- <span class="subDropdown minus"></span> -->
                                            </li>
                                            <li class="d-flex flex-column align-items-start">
                                                <a href="?orderby=price&category=mobile-phones" class="product-cat w-100">
                                                    <input type="checkbox" id="sport&outdoors" name='sport&outdoors' class="d-none category-checkbox" value="53">
                                                    <label class="d-flex align-items-center mb-0 w-100">
                                                        <span class="d-inline-flex align-items-center justify-content-center w-100"></span>
                                                        Sport & Na Otvorenom
                                                    </label>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget widget-price-filter">
                                    <h4 class="widget-title">Filtriraj prema ceni</h4>
                                    <form action="" method="GET">
                                        <div class="price-slider-wrapper d-flex flex-column-reverse">
                                            <div class="price-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                                <span class="ui-slider-handle ui-corner-all ui-state-default min-range" tabindex="0"></span>
                                                <span class="ui-slider-handle ui-corner-all ui-state-default max-range" tabindex="0" style="left: 100%"></span>
                                            </div>
                                            <div class="price-slider-amount d-flex align-items-center flex-row-reverse" data-step="10">
                                                <button class="button" type="submit">Filter</button>
                                                <div class="price-label">
                                                    Cena:
                                                    <span class="from">€150</span>
                                                    -
                                                    <span class="to">€300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="widget widget-product-categories mobile-phones-brands">
                                    <h4 class="widget-title">Brend</h4>
                                    <div class="widget-checkbox-list">
                                        @include('mobile-phones-brands')
                                    </div>
                                </div>
                                <div class="widget widget-product-categories mobile-phones-brands">
                                    <h4 class="widget-title">Boja</h4>
                                    <ul class="widgey-layered-nav-list list-unstyled pl-0">
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: black"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Crna</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: white; border: 1px solid var(--placeholder-color);"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Bela</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: grey"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Siva</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: red"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Crvena</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: green"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Zelena</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: blue"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Plava</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: orange"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Narandzasta</a>
                                            <span class="count">(5)</span>
                                        </li>
                                        <li class="type-color-container">
                                            <div class="type-color">
                                                <span class="color-box" style="background-color: yellow"></span>
                                            </div>
                                            <a rel="nofollow" href="#">Zuta</a>
                                            <span class="count">(5)</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget widget-media-image">
                                    <img src="{{ asset('images/widget-banner.jpg') }}" 
                                        alt="" 
                                        class="image wp-image-2119 attachment-full size-full"
                                        loading="lazy"
                                        decoding="async">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    <div class="quick-view2" style="display: none;">
        <link id="link1" rel="stylesheet">
        <link href='https://unpkg.com/swiper/swiper-bundle.min.css' rel="stylesheet">
        <script src='https://unpkg.com/swiper/swiper-bundle.min.js'></script>
        <div class="mfp-bg mfp-ready"></div>
        <div class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow: hidden auto;">
            <div class="mfp-container mfp-s-ready mfp-inline-holder">
                <div class="mfp-content">
                    <div class="quickview-product single-product-wrapper product white-popup">
                        <div class="quick-product-wrapper single-product-container">
                            <button title="Close (Esc)" type="button" class="mfp-close" onclick="closeQuickView()">x</button>
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
                                            <form action="" methid="post" class="cart single-ajax">
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
                            <!-- <div class="ad-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos qui laudantium ab, quibusdam unde similique. Omnis possimus nam ipsum magni molestias animi, eius doloribus temporibus nobis, inventore tenetur. Vero, illum...</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>;
        <script>
            var swiper = new Swiper('#product-images', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
            var thumbnailSwiper = new Swiper('#product-thumbnails', {
                slidesPerView: 'auto',
                spaceBetween: 5, 
                freeMode: true, 
                loop: false
            });
            var thumbnailSlides = document.querySelectorAll('.swiper-slide');
            
            thumbnailSlides.forEach(function (slide, index) {
                var image = slide.querySelector('a img');
                slide.addEventListener('click', function () {
                    thumbnailSlides.forEach(function (slide, index){
                        var img = slide.querySelector('a img');
                        img.style.filter = 'brightness(1)';
                    });
                    image.style.filter = 'brightness(0.3)';
                    swiper.slideTo(index - 7); 
                });
            });
        </script>
    </div>

</main>
</html>

<script src="{{ asset('js/ads-widget.js') }}"></script>
<script>
    function showQuickView(){
        document.getElementById('link1').href = "{{ asset('css/quick-preview-style.css') }}";
        document.getElementsByClassName('quick-view2')[0].style.display = 'block';
    }
    function closeQuickView(){
        document.getElementById('link1').href = "";
        document.getElementsByClassName('quick-view2')[0].style.display = 'none';
    }
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
    $.ajax({
        method: 'POST',
        url: "{{ route('get-ads') }}",
        data:{
            'page': 1
        },
        success: function(response){
            if(response != null){
                document.querySelector('#loading-form-screen').style.display = 'none';
                var mainDiv = document.querySelector('.products');
                if(response !== null && response.length > 1){
                    for(var i = 1; i < response.length; i++){
                        var temp = document.createElement('div');
                        temp.classList.add('product', 'status-publish', 'first', 'instock', 'product-cat-apple', 'product-cat-cell-phones', 'has-post-thumbnail', 'sale', 'feautured', 'shipping-taxable', 'purchasable', 'product-type-simple', 'custom-hover');
                        temp.innerHTML = createWidget(response[i], i);
                        mainDiv.appendChild(temp);

                        $(".hover-slider-toggle-panel").hover(
                            function() {
                                var imageUrl = $(this).attr("data-hover-slider-image");
                                var productCard = $(this).closest(".product-card");
                                var mainImage = productCard.find(".main-image");
                                
                                mainImage.attr("src", 'data:image/jpeg;base64,' + imageUrl);
        
                                var i = $(this).attr('data-hover-slider-i');
        
                                productCard.find(".hover-slider-indicator-dot").removeClass("active");
                                productCard.find(".hover-slider-indicator-dot[data-hover-slider-i='" + i + "']").addClass("active");
                                
                            },
                        );
                    }
                }
            }
        }
    });
</script>

<script>
    const categories = document.querySelectorAll('.product-cat');
    const mobilePhonesBrands = document.querySelectorAll('.mobile-phones-brands');

    categories.forEach(categorie => {
        categorie.addEventListener('click', async function(event) {
            event.preventDefault();
            const checkbox = this.querySelector('input[type="checkbox"]');
            if(checkbox){
                setTimeout(() => {
                    checkbox.checked = !checkbox.checked;
                    this.classList.toggle('active', checkbox.checked);
                    //console.log(typeof(checkbox.value));
                    switch(checkbox.value){
                        case '2':
                            mobilePhonesBrands[0].classList.toggle('visible');
                            mobilePhonesBrands[1].classList.toggle('visible');
                            break;
                    }
                }, 100);
            }
        });
    });

    const phonePluses = document.querySelectorAll('.subDropdown');
    phonePluses.forEach(phonePlus =>{
        phonePlus.addEventListener('click', function(event){
            $(this).toggleClass('plus');
            $(this).toggleClass('minus');
            $(this).parent().find("> ul").slideToggle();
        });
    });

    const slider = document.getElementsByClassName("price-slider")[0];
    const range = document.getElementsByClassName("ui-slider-range")[0];
    const minHandle = document.getElementsByClassName("min-range")[0];
    const maxHandle = document.getElementsByClassName("max-range")[0];

    const minValue = 0;
    const maxValue = 1200;

    const minPrice = document.querySelector(".price-label .from");
    const maxPrice = document.querySelector(".price-label .to");

    const rangeWidth = slider.offsetWidth;
    const handleWidth = minHandle.offsetWidth;

    minHandle.style.left = "0";
    maxHandle.style.left = rangeWidth - handleWidth + "px";
    range.style.left = "0";
    range.style.width = rangeWidth + "px";

    let isDragging = false;
    let activeHandle = null;

    minHandle.addEventListener("mousedown", handleMouseDown);
    maxHandle.addEventListener("mousedown", handleMouseDown);
    document.addEventListener("mousemove", handleMouseMove);
    document.addEventListener("mouseup", handleMouseUp);

    function handleMouseDown(event) {
        isDragging = true;
        activeHandle = event.target;
    }

    function handleMouseMove(event) {
        if (!isDragging) return;

        const sliderRect = slider.getBoundingClientRect();
        const mouseX = event.clientX - sliderRect.left;
        let positionX = Math.min(
            Math.max(mouseX - handleWidth / 2, 0),
            rangeWidth - handleWidth
        );

        if (activeHandle === minHandle) {
            const maxHandlePosition = maxHandle.offsetLeft - handleWidth;
            positionX = Math.min(positionX, maxHandlePosition);
        } else if (activeHandle === maxHandle) {
            const minHandlePosition = minHandle.offsetLeft + handleWidth;
            positionX = Math.max(positionX, minHandlePosition);
        }

        if (activeHandle === minHandle && positionX >= maxHandle.offsetLeft) {
            positionX = maxHandle.offsetLeft;
        } else if (activeHandle === maxHandle && positionX <= minHandle.offsetLeft) {
            positionX = minHandle.offsetLeft;
        }

        activeHandle.style.left = positionX + "px";
        range.style.left = minHandle.offsetLeft + "px";
        range.style.width = maxHandle.offsetLeft - minHandle.offsetLeft + handleWidth + "px";

        
        // console.log("Min value: "  + minHandle.offsetLeft  * maxValue / rangeWidth);
        // console.log("Max value: "  + (maxHandle.offsetLeft + maxHandle.offsetWidth) * maxValue / rangeWidth);
        minPrice.innerHTML = '€' + Math.round(minHandle.offsetLeft  * maxValue / rangeWidth);
        maxPrice.innerHTML = '€' + Math.round((maxHandle.offsetLeft + maxHandle.offsetWidth) * maxValue / rangeWidth);

    }
    function handleMouseUp() {
        isDragging = false;
        activeHandle = null;
    }
</script>


<script>
    $(document).ready(function() {
        $(".hover-slider-toggle-panel").hover(
            function() {
                var imageUrl = $(this).attr("data-hover-slider-image");
                var productCard = $(this).closest(".product-card");
                var mainImage = productCard.find(".main-image");
                
                mainImage.attr("src", imageUrl);

                var i = $(this).attr('data-hover-slider-i');

                productCard.find(".hover-slider-indicator-dot").removeClass("active");
                productCard.find(".hover-slider-indicator-dot[data-hover-slider-i='" + i + "']").addClass("active");
                
            },
            function() {
                var defaultImageUrl = "{{ asset('images/iPhone 14 Pro Max.png') }}";
                var productCard = $(this).closest(".product-card");
                var mainImage = productCard.find(".main-image");
                mainImage.attr("src", defaultImageUrl);
            }
        );
    });
</script>