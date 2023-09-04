<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('links')
    <title>Polovni Telefoni</title>
    <link href="{{ asset('css/my-account-style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    @include('header')

    <div class="site-content">
        <div class="shop-content" style="margin-top: 60px">
            <div class="container">
                <div>
                    <div class="content-wrapper sidebar-right">
                        <div class="col-12 content-primary">
                            <div class="my-account-wrapper row">
                                <div class="my-account-navigation col-xl-3 col-lg-3 col-md-12 d-inline-block">
                                    <nav class="my-account-navigation-nav">
                                        <ul class="list-unstyled">
                                            <li class="is-active">
                                                <a href="#" id="dashboard">Kontrolna tabla</a>
                                            </li>
                                            <li>
                                                <a href="#" id="my-ads">Moji Oglasi</a>
                                            </li>
                                            <li>
                                                <a href="#" id="new-ads">Dodaj Novi Oglas</a>
                                            </li>
                                            <li>
                                                <a href="#" id="downloads">Preuzimanja</a>
                                            </li>
                                            <li>
                                                <a href="#" id="addresses">Adrese</a>
                                            </li>
                                            <li>
                                                <a href="#" id="my-data">Podaci o nalogu</a>
                                            </li>
                                            <li>
                                                <a href="#" id="compare">Uporedi</a>
                                            </li>
                                            <li>
                                            <form action="/user/signOut" method="POST" id="signOutForm">
                                                @csrf
                                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                                                <a href="#" id='signOutLink'>Odjavi se</a>
                                            </form>
                                                <!-- <a href="#">Odjavi se</a> -->
                                            </li>
                                            <li>
                                                <a href="#" id="wish-list">Lista zelja</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="my-account-content col-xl-9 col-lg-9 col-md-12 d-inline-block">
                                    <p style="padding: 5px 0;">
                                        Zdravo
                                        <strong>{{ Session::get('user')->getUsername() }}</strong>
                                    </p>
                                    <p>
                                        Na kotrolnoj tabli svog naloga mozete pregledati svoje
                                        <a href="#">nedavne narudzbine</a>, upravljati
                                        <a href="#">adresama za isporuku i fakturisanje</a> kao i
                                        <a href="#">izmeniti lozinku i detalje naloga</a>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/account-redirect.js') }}"></script>
</body>
</html>