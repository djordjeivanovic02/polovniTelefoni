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
                                            <li>
                                                <a href="#" id="dashboard">Kontrolna tabla</a>
                                            </li>
                                            <li>
                                                <a href="#" id="my-ads">Moji Oglasi</a>
                                            </li>
                                            <li class="is-active">
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
                                        Postovani
                                        <strong>{{ Session::get('user')->getUsername() }}</strong>
                                    </p>
                                    <p>
                                        Da biste mogli da postavite novi oglas, potrebno je da azurirate svoje ime i prezime u svom korisničkom profilu. Ovo je vazno kako bismo obezbedili tacne informacije o vama i olaksali komunikaciju sa drugim korisnicima.
                                        <br><br>
                                        Molimo vas da sledite sledece korake kako biste azurirali svoje ime i prezime:<br>
                                        1. Prijavite se na svoj korisnički nalog.<br>
                                        2. Idite na opciju "<a href='' id="mydata">Podaci o nalogu</a>".<br>
                                        3. Pronađite polje za unos "Ime" i "Prezime" i unesite vase podatke.<br>
                                        4. Sacuvajte promene.<br><br>

                                        Nakon sto azurirate svoje ime i prezime, bicete spremni da postavite svoj oglas i podelite svoje ponude sa zajednicom.<br><br>

                                        Ako imate bilo kakvih pitanja ili problema, slobodno nas kontaktirajte putem naše podrške.<br><br>

                                        Hvala na razumevanju i saradnji!<br><br>

                                        Srdacno,<br>
                                        <strong>PolovniTelefoni team</strong>
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
    <script>
        const myData = document.querySelector('#mydata');
        myData.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href ='/my-account/edit-account';
        });
    </script>
</body>
</html>